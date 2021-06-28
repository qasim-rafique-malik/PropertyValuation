<?php

namespace App\Http\Controllers\Admin;

use App\Project;
use Illuminate\Http\Request;
use App\Currency;

class ManageProjectReportController extends AdminBaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'app.menu.projects';
        $this->pageIcon = 'icon-layers';
        $this->middleware(function ($request, $next) {
            if (!in_array('projects', $this->user->modules)) {
                abort(403);
            }
            return $next($request);
        });
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->generateProjectReportRoute = 'admin.report.generate';
        $this->id = $id;
        $this->currencies = Currency::all();
            $this->project = Project::findorFail($id);

        return view('admin.projects.report.show', $this->data);
    }



    public function generateProjectReportRoute($id)
    {

        $project = Project::findorFail($id);
        $viewData = array();

        $data = $this->scopeOfWorkGetData($estimate);
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.scopeOfWork.scopeOfWork-pdf', [
            'viewData' => $project,
            'project' => $project,
        ]);
        $filename = 'ValuationReport-' . $id;

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

}
