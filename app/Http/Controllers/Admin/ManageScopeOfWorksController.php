<?php

namespace App\Http\Controllers\Admin;

use App\ClientDetails;
use App\Currency;
use App\DataTables\Admin\EstimatesDataTable;
use App\DataTables\Admin\ScopeOfWorkDataTable;
use App\DataTables\BaseDataTable;
use App\Estimate;
use App\EstimateItem;
use App\Helper\Reply;
use App\Http\Requests\StoreEstimate;
use App\InvoiceSetting;
use App\Notifications\NewEstimate;
use App\Project;
use App\ScopeOfWork;
use Carbon\Carbon;
use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Tax;
use App\Product;

class ManageScopeOfWorksController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'app.menu.scopeOfWork';
        $this->pageIcon = 'ti-file';
        $this->middleware(function ($request, $next) {
            if (!in_array('estimates', $this->user->modules)) {
                abort(403);
            }
            return $next($request);
        });
    }

    public function index(ScopeOfWorkDataTable $dataTable)
    {

        return $dataTable->render('admin.scopeOfWork.index', $this->data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        DB::beginTransaction();

        $scopeOfWork = new ScopeOfWork();
        $scopeOfWork->project_id = $id;
        $scopeOfWork->estimate_number = ScopeOfWork::lastEstimateNumber() + 1;
        $scopeOfWork->valid_till =  date('Y-m-d', strtotime("+20 days"));
        $scopeOfWork->status = 'waiting';
        /*dd($estimate->estimate_number);*/

        $scopeOfWork->save();
        $this->logSearchEntry($scopeOfWork->id, 'Estimate #' . $scopeOfWork->id, 'admin.estimates.edit', 'estimate');
//        dd($scopeOfWork);
        DB::commit();
//        return Reply::success(__('messages.estimateSend'));
//        return Reply::redirect(route('admin.milestones.show',$id), __('messages.estimateCreated'));
        return redirect()->back()->with('messages', 'IT WORKS!');
//        return Reply::success('messages');
//        return Reply::redirect(route('admin.milestones.show',$id) , __('messages.estimateCreated'));
    }

    public function create($id)
    {
        dd();
        dd($_GET);
        $this->clients = ClientDetails::all();
        $this->currencies = Currency::all();
        $this->lastEstimate = ScopeOfWork::lastEstimateNumber() + 1;
        $this->invoiceSetting = InvoiceSetting::first();
        $this->zero = '';
        if (strlen($this->lastEstimate) < $this->invoiceSetting->estimate_digit) {
            for ($i = 0; $i < $this->invoiceSetting->estimate_digit - strlen($this->lastEstimate); $i++) {
                $this->zero = '0' . $this->zero;
            }
        }
        $this->taxes = Tax::all();
        $this->products = Product::select('id', 'name as title', 'name as text')->get();


        $scopeOfWork = new ScopeOfWork();
        $this->fields = $scopeOfWork->getCustomFieldGroupsWithFields()->fields;
        return view('admin.scopeOfWork.create', $this->data);
    }

    public function duplicateEstimate($id)
    {
        $this->clients = ClientDetails::all();
        $this->currencies = Currency::all();
        $this->lastEstimate = ScopeOfWork::lastEstimateNumber() + 1;
        $this->invoiceSetting = InvoiceSetting::first();
        $this->zero = '';
        $this->estimate = ScopeOfWork::findOrFail($id);
        if (strlen($this->lastEstimate) < $this->invoiceSetting->estimate_digit) {
            for ($i = 0; $i < $this->invoiceSetting->estimate_digit - strlen($this->lastEstimate); $i++) {
                $this->zero = '0' . $this->zero;
            }
        }
        $this->taxes = Tax::all();
        $this->products = Product::select('id', 'name as title', 'name as text')->get();


        return view('admin.estimates.duplicate-estimate', $this->data);
    }

    public function store(StoreEstimate $request)
    {
        DB::beginTransaction();
        $items = $request->input('item_name');
        $itemsSummary = $request->input('item_summary');
        $cost_per_item = $request->input('cost_per_item');
        $quantity = $request->input('quantity');
        $amount = $request->input('amount');
        $tax = $request->input('taxes');

        if (trim($items[0]) == '' || trim($items[0]) == '' || trim($cost_per_item[0]) == '') {
            return Reply::error(__('messages.addItem'));
        }

        foreach ($quantity as $qty) {
            if (!is_numeric($qty) && (intval($qty) < 1)) {
                return Reply::error(__('messages.quantityNumber'));
            }
        }

        foreach ($cost_per_item as $rate) {
            if (!is_numeric($rate)) {
                return Reply::error(__('messages.unitPriceNumber'));
            }
        }

        foreach ($amount as $amt) {
            if (!is_numeric($amt)) {
                return Reply::error(__('messages.amountNumber'));
            }
        }

        foreach ($items as $itm) {
            if (is_null($itm)) {
                return Reply::error(__('messages.itemBlank'));
            }
        }

        $scopeOfWork = new ScopeOfWork();
        $scopeOfWork->client_id = $request->client_id;
        $scopeOfWork->estimate_number = ScopeOfWork::lastEstimateNumber() + 1;
        $scopeOfWork->valid_till = Carbon::createFromFormat($this->global->date_format, $request->valid_till)->format('Y-m-d');
        $scopeOfWork->sub_total = round($request->sub_total, 2);
        $scopeOfWork->total = round($request->total, 2);
        $scopeOfWork->currency_id = $request->currency_id;
        $scopeOfWork->note = $request->note;
        $scopeOfWork->discount = round($request->discount_value, 2);
        $scopeOfWork->discount_type = $request->discount_type;
        $scopeOfWork->status = 'waiting';
        /*dd($estimate->estimate_number);*/
        dd($scopeOfWork);
        $scopeOfWork->save();

        // To add custom fields data
        if ($request->get('custom_fields_data')) {
            $scopeOfWork->updateCustomFieldData($request->get('custom_fields_data'));
        }

        foreach ($items as $key => $item) :
            if (!is_null($item)) {
                EstimateItem::create(
                    [
                        'estimate_id' => $scopeOfWork->id,
                        'item_name' => $item,
                        'item_summary' => $itemsSummary[$key],
                        'type' => 'item',
                        'quantity' => $quantity[$key],
                        'unit_price' => round($cost_per_item[$key], 2),
                        'amount' => round($amount[$key], 2),
                        'taxes' => $tax ? array_key_exists($key, $tax) ? json_encode($tax[$key]) : null : null
                    ]
                );
            }
        endforeach;

        $this->logSearchEntry($scopeOfWork->id, 'Estimate #' . $scopeOfWork->id, 'admin.estimates.edit', 'estimate');
        DB::commit();

        return Reply::redirect(route('admin.scopeOfWorks.index'), __('messages.estimateCreated'));
    }

    public function edit($id)
    {
        $this->scopeOfWork = ScopeOfWork::findOrFail($id)->withCustomFields();
        $this->fields = $this->scopeOfWork->getCustomFieldGroupsWithFields()->fields;
        $this->clients = ClientDetails::all();
        $this->currencies = Currency::all();
        $this->taxes = Tax::all();
        $this->products = Product::select('id', 'name as title', 'name as text')->get();

        return view('admin.scopeOfWorks.edit', $this->data);
    }

    public function update(StoreEstimate $request, $id)
    {
        $items = $request->input('item_name');
        $itemsSummary = $request->input('item_summary');
        $cost_per_item = $request->input('cost_per_item');
        $quantity = $request->input('quantity');
        $amount = $request->input('amount');
        $tax = $request->input('taxes');


        if (trim($items[0]) == '' || trim($items[0]) == '' || trim($cost_per_item[0]) == '') {
            return Reply::error(__('messages.addItem'));
        }

        foreach ($quantity as $qty) {
            if (!is_numeric($qty) && $qty < 1) {
                return Reply::error(__('messages.quantityNumber'));
            }
        }

        foreach ($cost_per_item as $rate) {
            if (!is_numeric($rate)) {
                return Reply::error(__('messages.unitPriceNumber'));
            }
        }

        foreach ($amount as $amt) {
            if (!is_numeric($amt)) {
                return Reply::error(__('messages.amountNumber'));
            }
        }

        foreach ($items as $itm) {
            if (is_null($itm)) {
                return Reply::error(__('messages.itemBlank'));
            }
        }


        $scopeOfWork = ScopeOfWork::findOrFail($id);
        $scopeOfWork->client_id = $request->client_id;
        $scopeOfWork->valid_till = Carbon::createFromFormat($this->global->date_format, $request->valid_till)->format('Y-m-d');
        $scopeOfWork->sub_total = round($request->sub_total, 2);
        $scopeOfWork->total = round($request->total, 2);
        $scopeOfWork->currency_id = $request->currency_id;
        $scopeOfWork->status = $request->status;
        $scopeOfWork->discount = round($request->discount_value, 2);
        $scopeOfWork->discount_type = $request->discount_type;
        $scopeOfWork->note = $request->note;
        $scopeOfWork->save();

        // To add custom fields data
        if ($request->get('custom_fields_data')) {
            $scopeOfWork->updateCustomFieldData($request->get('custom_fields_data'));
        }

        // delete and create new
        EstimateItem::where('estimate_id', $scopeOfWork->id)->delete();

        foreach ($items as $key => $item) :
            EstimateItem::create(
                [
                    'estimate_id' => $scopeOfWork->id,
                    'item_name' => $item,
                    'item_summary' => $itemsSummary[$key],
                    'quantity' => $quantity[$key],
                    'unit_price' => round($cost_per_item[$key], 2),
                    'amount' => round($amount[$key], 2),
                    'taxes' => $tax ? array_key_exists($key, $tax) ? json_encode($tax[$key]) : null : null
                ]
            );
        endforeach;

        return Reply::redirect(route('admin.estimates.index'), __('messages.estimateUpdated'));
    }

    public function destroy($id)
    {
        $firstEstimate = ScopeOfWork::orderBy('id', 'desc')->first();
        if ($firstEstimate->id == $id) {
            ScopeOfWork::destroy($id);
            return Reply::success(__('messages.estimateDeleted'));
        } else {
            return Reply::error(__('messages.estimateCanNotDeleted'));
        }
    }

    public function domPdfObjectForDownload($id)
    {
        $this->scopeOfWork = ScopeOfWork::findOrFail($id);
        if ($this->scopeOfWork->discount > 0) {
            if ($this->scopeOfWork->discount_type == 'percent') {
                $this->discount = (($this->scopeOfWork->discount / 100) * $this->scopeOfWork->sub_total);
            } else {
                $this->discount = $this->scopeOfWork->discount;
            }
        } else {
            $this->discount = 0;
        }
        $taxList = array();

        $items = EstimateItem::whereNotNull('taxes')
            ->where('estimate_id', $this->scopeOfWork->id)
            ->get();
        $this->invoiceSetting = InvoiceSetting::first();
        foreach ($items as $item) {
            if ($this->scopeOfWork->discount > 0 && $this->scopeOfWork->discount_type == 'percent') {
                $item->amount = $item->amount - (($this->scopeOfWork->discount / 100) * $item->amount);
            }
            foreach (json_decode($item->taxes) as $tax) {
                $this->tax = EstimateItem::taxbyid($tax)->first();
                if ($this->tax) {
                    if (!isset($taxList[$this->tax->tax_name . ': ' . $this->tax->rate_percent . '%'])) {
                        $taxList[$this->tax->tax_name . ': ' . $this->tax->rate_percent . '%'] = ($this->tax->rate_percent / 100) * $item->amount;
                    } else {
                        $taxList[$this->tax->tax_name . ': ' . $this->tax->rate_percent . '%'] = $taxList[$this->tax->tax_name . ': ' . $this->tax->rate_percent . '%'] + (($this->tax->rate_percent / 100) * $item->amount);
                    }
                }
            }
        }

        $this->taxes = $taxList;

        $this->settings = $this->global;

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.estimates.estimate-pdf', $this->data);
        $filename = $this->scopeOfWork->estimate_number;

        return [
            'pdf' => $pdf,
            'fileName' => $filename
        ];
    }

    public function download($id)
    {
        $pdfOption = $this->domPdfObjectForDownload($id);
        $pdf = $pdfOption['pdf'];
        $filename = $pdfOption['fileName'];

        return $pdf->download($filename . '.pdf');
    }

    public function sendEstimate($id)
    {
        $scopeOfWork = ScopeOfWork::findOrFail($id);
        if(!is_null($scopeOfWork->client)){
            $scopeOfWork->client->notify(new NewEstimate($scopeOfWork));
        }

        $scopeOfWork->send_status = 1;
        if ($scopeOfWork->status == 'draft') {
            $scopeOfWork->status = 'waiting';
        }
        $scopeOfWork->save();
        return Reply::success(__('messages.estimateSend'));

    }

    public function changeStatus(Request $request, $id)
    {
        $scopeOfWork = ScopeOfWork::findOrFail($id);
        $scopeOfWork->status = 'canceled';
        $scopeOfWork->save();

        return Reply::success(__('messages.updateSuccess'));
    }
    
}
