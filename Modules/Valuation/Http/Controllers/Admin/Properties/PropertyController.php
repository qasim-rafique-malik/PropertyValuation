<?php

namespace Modules\Valuation\Http\Controllers\Admin\Properties;

use App\Country;
use App\Helper\Files;
use App\Helper\Reply;
use Illuminate\Http\Request;
use Modules\Valuation\Entities\ValuationBlock;
use Modules\Valuation\Entities\ValuationGovernorate;
use Modules\Valuation\Entities\ValuationPropertyClass;
use Modules\Valuation\Entities\ValuationPropertyMedia;
use Modules\Valuation\Http\Controllers\Admin\Properties\CategorizationController;
use Modules\Valuation\Http\Controllers\Admin\Settings\BlockController;
use Modules\Valuation\Http\Controllers\Admin\ValuationAdminBaseController;
use Modules\Valuation\Entities\ValuationProperty;
use Modules\Valuation\Entities\ValuationCity;
use Modules\Valuation\Entities\ValuationPropertyType;
use Modules\Valuation\Entities\ValuationPropertyCategorization;
use Modules\Valuation\Entities\ValuationPropertyClassification;
use Yajra\DataTables\Facades\DataTables;
use Modules\Valuation\Http\Controllers\Admin\Settings\CityController;
use Modules\Valuation\Http\Controllers\Admin\Properties\ClassController;
use Modules\Valuation\Http\Controllers\Admin\Properties\ClassificationController;
use Modules\Valuation\Http\Controllers\Admin\Properties\TypeController;
use App\Currency;
use Modules\Valuation\Entities\ValuationMeasurementUnit;
class PropertyController extends ValuationAdminBaseController
{

    private $viewFolderPath = 'valuation::Admin.Property.';

    private $listingPageRoute = 'valuation.admin.property';
    private $dataRoute = 'valuation.admin.property.data';
    private $saveUpdateDataRoute = 'valuation.admin.property.saveUpdateData';
    private $addEditViewRoute = 'valuation.admin.property.addEditView';
    private $destroyRoute = 'valuation.admin.property.destroy';
    private $propertyDetailRoute='valuation.admin.property.property-detail';

    public function __construct()
    {
        parent::__construct();

        $this->pageTitle = 'valuation::valuation.property.title';

        $this->pageIcon = 'icon-speedometer';

    }

    public function __customConstruct(&$data)
    {
        //assign routes for views
        $data['listingPageRoute'] = $this->listingPageRoute;
        $data['dataRoute'] = $this->dataRoute;
        $data['saveUpdateDataRoute'] = $this->saveUpdateDataRoute;
        $data['addEditViewRoute'] = $this->addEditViewRoute;
        $data['destroyRoute'] = $this->destroyRoute;

        $data['cityViewFolderPath'] = CityController::viewFolderPath;
        $data['citySaveUpdateDataRoute'] = CityController::saveUpdateDataRoute;
        $data['getAjaxCityDataRoute'] = CityController::getAjaxDataRoute;

        $data['blockViewFolderPath'] = BlockController::viewFolderPath;
        $data['blockSaveUpdateDataRoute'] = BlockController::saveUpdateDataRoute;
        $data['getAjaxBlockDataRoute'] = BlockController::getAjaxDataRoute;

        $data['propertyClassViewFolderPath'] = ClassController::viewFolderPath;
        $data['propertyClassSaveUpdateDataRoute'] = ClassController::saveUpdateDataRoute;
        $data['getAjaxPropertyClassDataRoute'] = ClassController::getAjaxDataRoute;

        $data['propertyCategorizationViewFolderPath'] = CategorizationController::viewFolderPath;
        $data['propertyCategorizationSaveUpdateDataRoute'] = CategorizationController::saveUpdateDataRoute;
        $data['getAjaxPropertyCategorizationDataRoute'] = CategorizationController::getAjaxDataRoute;

        $data['propertyClassificationViewFolderPath'] = ClassificationController::viewFolderPath;
        $data['propertyClassificationSaveUpdateDataRoute'] = ClassificationController::saveUpdateDataRoute;
        $data['getAjaxPropertyClassificationDataRoute'] = ClassificationController::getAjaxDataRoute;

        $data['propertyTypeViewFolderPath'] = TypeController::viewFolderPath;
        $data['propertyTypeSaveUpdateDataRoute'] = TypeController::saveUpdateDataRoute;
        $data['getAjaxPropertyTypeDataRoute'] = TypeController::getAjaxDataRoute;

        $data['companyId'] = isset(company()->id)?company()->id:0;
        $currencyId = isset(company()->currency_id)?company()->currency_id:0;
       $currencyDetails= Currency::withoutGlobalScope('enable')->findOrFail($currencyId);
       $data['currencyCode']=isset($currencyDetails->currency_code)?$currencyDetails->currency_code:'';
       
        $data['adminCountryId'] = (isset(user()->country_id) && user()->country_id != '')?user()->country_id:0;
        $unitObj = new ValuationMeasurementUnit;
           
        $units=  $unitObj->getCompanyUnitSetting(isset(company()->id)?company()->id:0);
        $unit=isset($units)? $units[0]:'';
        $data['measurementUnit']=$unit->measure_unit;
    }

    public function newCreateView()
    {

        $this->__customConstruct($this->data);

        $properties = new ValuationProperty();

        $this->propertiesCount = $properties->count();
        $this->valuationMethods = array();
        $this->propertyCategories = array();

        $countryObj = new Country();
        $this->countries = $countryObj->get();

        $governorateObj = new ValuationGovernorate();
        $this->governorates = $governorateObj->getAllForCompany();

        $cityObj = new ValuationCity();
        $this->cities = $cityObj->getAllForCompany();

        $blockObj = new ValuationBlock();
        $this->blocks = $blockObj->getAllForCompany();


        return view($this->viewFolderPath . 'newCreateView', $this->data);
    }

    public function index()
    {
        $this->__customConstruct($this->data);

        $properties = new ValuationProperty();

        $this->propertiesCount = $properties->countForCompany();

        return view($this->viewFolderPath . 'Index', $this->data);
    }

    public function addEditView($id = 0)
    {
        $this->__customConstruct($this->data);

        $this->title = 'valuation::valuation.property.createProperty';
        $this->id = $id;

        $properties = new ValuationProperty();

        $this->propertiesCount = $properties->countForCompany();

        $countryObj = new Country();
        $this->countries = $countryObj->get();

        $governorateObj = new ValuationGovernorate();
        $this->governorates = $governorateObj->getAllForCompany();

        $cityObj = new ValuationCity();
        $this->cities = $cityObj->getAllForCompany();

        $blockObj = new ValuationBlock();
        $this->blocks = $blockObj->getAllForCompany();

        $typeObj = new ValuationPropertyType();
        $this->types = $typeObj->getAllForCompany();

        $propertyClassificationObj = new ValuationPropertyClassification();
        $this->classifications = $propertyClassificationObj->getAllForCompany();

        $propertyCategorizationObj = new ValuationPropertyCategorization();
        $this->categorizations = $propertyCategorizationObj->getAllForCompany();

        $propertyClassObj = new ValuationPropertyClass();
        $this->classes = $propertyClassObj->getAllForCompany();

        $propertyData = null;
        if ($id > 0) {
            $propertyObj = new ValuationProperty();
            $propertyData = $propertyObj->find($id);
        }

        $this->adminCountryId = isset($propertyData->country_id) ? $propertyData->country_id : $this->data['adminCountryId'];
        $this->governorateId = isset($propertyData->governorate_id) ? $propertyData->governorate_id : 0;
        $this->cityId = isset($propertyData->city_id) ? $propertyData->city_id : 0;
        $this->blockId = isset($propertyData->block_id) ? $propertyData->block_id : 0;
        $this->classId = isset($propertyData->class_id) ? $propertyData->class_id : 0;
        $this->categorizationId = isset($propertyData->classification_id) ? $propertyData->classification_id : 0;
        $this->classificationId = isset($propertyData->categorization_id) ? $propertyData->categorization_id : 0;
        $this->typeId = isset($propertyData->type_id) ? $propertyData->type_id : 0;
        $this->processStatusId = isset($propertyData->process_status_id) ? $propertyData->process_status_id : 0;
        $this->propertyTitle = isset($propertyData->title) ? $propertyData->title : '';
        $this->locality = isset($propertyData->locality) ? $propertyData->locality : '';
        $this->road = isset($propertyData->road) ? $propertyData->road : '';
        $this->coordinates = isset($propertyData->coordinates) ? $propertyData->coordinates : '';
        $this->plotNum = isset($propertyData->plot_num) ? $propertyData->plot_num : 0;
        $this->landSize = isset($propertyData->land_size) ? $propertyData->land_size : 0;
        $this->sizeMeterSQ = isset($propertyData->sizes_in_meter_sq) ? $propertyData->sizes_in_meter_sq : 0;
        $this->sizeSQFeet = isset($propertyData->sizes_in_sq_feet) ? $propertyData->sizes_in_sq_feet : 0;
        $this->buildupSizes = isset($propertyData->buildup_sizes) ? $propertyData->buildup_sizes : 0;
        $this->frontElivation = isset($propertyData->front_elivation) ? $propertyData->front_elivation : 0;
        $this->commonArea = isset($propertyData->common_area) ? $propertyData->common_area : 0;
        $this->entranceNum = isset($propertyData->entrance_num) ? $propertyData->entrance_num : 0;
        $this->BLDGNum = isset($propertyData->bldg_num) ? $propertyData->bldg_num : 0;
        $this->unitNum = isset($propertyData->unit_num) ? $propertyData->unit_num : 0;
        $this->age = isset($propertyData->age) ? $propertyData->age : 0;
        $this->status = isset($propertyData->status) ? $propertyData->status : 0;
        $this->name = isset($propertyData->name) ? $propertyData->name : 0;
        $this->role = isset($propertyData->role) ? $propertyData->role : 0;
        $this->use = isset($propertyData->use) ? $propertyData->use : 0;
        $this->maintenance = isset($propertyData->maintenance) ? $propertyData->maintenance : 0;
        $this->noOfUnits = isset($propertyData->no_of_units) ? $propertyData->no_of_units : 0;
        $this->noOfRooms = isset($propertyData->no_of_rooms) ? $propertyData->no_of_rooms : 0;
        $this->noOfRoads = isset($propertyData->no_of_roads) ? $propertyData->no_of_roads : 0;
        $this->purchasePrice = isset($propertyData->purchase_price) ? $propertyData->purchase_price : 0;
        $this->landPrice = isset($propertyData->land_price) ? $propertyData->land_price : 0;
        $this->constructionPrice = isset($propertyData->construction_price) ? $propertyData->construction_price : 0;
        $this->renovationPrice = isset($propertyData->renovation_price) ? $propertyData->renovation_price : 0;
        $this->rentalIncome = isset($propertyData->rental_income) ? $propertyData->rental_income : 0;
        $this->estimatedValue = isset($propertyData->estimated_value) ? $propertyData->estimated_value : 0;
        $this->status = isset($propertyData->status) ? $propertyData->status : 'Draft';
        $this->dimensions = ($propertyData != null)?optional($propertyData->getMeta(ValuationProperty::DimensionsMetaKey , array()))->toArray():array();
        $this->addOnCosts = ($propertyData != null)?optional($propertyData->getMeta(ValuationProperty::AddOnCostMetaKey , array()))->toArray():array();
        $this->financialAcquisitionCost = ($propertyData != null)?optional($propertyData->getMeta(ValuationProperty::FinancialAcquisitionCost , array()))->toArray():array();
        $this->financialBuildUpCost = ($propertyData != null)?optional($propertyData->getMeta(ValuationProperty::FinancialBuildUpCost , array()))->toArray():array();
        $this->financialAddonCost = ($propertyData != null)?optional($propertyData->getMeta(ValuationProperty::FinancialAddOnCost , array()))->toArray():array();
        $this->ref_id=isset($propertyData->ref_id)?$propertyData->ref_id:'';
        return view($this->viewFolderPath . 'AddEditView', $this->data);
    }

    public function saveUpdateData(Request $request)
    {

        //echo "<pre>"; print_r($_POST); exit;
        $data = array();
        $this->__customConstruct($data);

        if (ValuationProperty::find($request->id)) {
            $property = ValuationProperty::find($request->id);
        } else {
            $property = new ValuationProperty;
        }

        $property->company_id = isset($data['companyId']) ? $data['companyId'] : 0;
        $property->country_id = isset($request->country) ? $request->country : 0;
        $property->governorate_id = isset($request->governorate) ? $request->governorate : 0;
        $property->city_id = isset($request->city) ? $request->city : 0;
        $property->block_id = isset($request->block) ? $request->block : 0;
        $property->class_id = isset($request->propertyClass) ? $request->propertyClass : 0;
        $property->classification_id = isset($request->propertyClassification) ? $request->propertyClassification : 0;
        $property->categorization_id = isset($request->propertyCategorization) ? $request->propertyCategorization : 0;
        $property->type_id = isset($request->propertyType) ? $request->propertyType : 0;
        $property->process_status_id = isset($request->process_status_id) ? $request->process_status_id : 0;
        $property->title = isset($request->propertyTitle) ? $request->propertyTitle : '';
        $property->locality = isset($request->locality) ? $request->locality : '';
        $property->road = isset($request->road) ? $request->road : '';
        $property->coordinates = isset($request->coordinates) ? $request->coordinates : '';
        $property->plot_num = isset($request->plotNum) ? $request->plotNum : 0;
        $property->land_size = isset($request->landSize) ? $request->landSize : 0;
        if(isset($data['measurementUnit']))
        {
            if($data['measurementUnit']=='meter')
            {
                $property->sizes_in_meter_sq = isset($request->landSize) ? $request->landSize : 0;
                $property->sizes_in_sq_feet = isset($request->landSize) ? $request->landSize*3.28084 : 0;
            }
            else if($data['measurementUnit']=='feet')
            {
                $property->sizes_in_meter_sq = isset($request->landSize) ? $request->landSize/3.28084 : 0;
                $property->sizes_in_sq_feet = isset($request->landSize) ? $request->landSize : 0;
            }
        }
//        $property->sizes_in_meter_sq = isset($request->sizeMeterSQ) ? $request->sizeMeterSQ : 0;
//        $property->sizes_in_sq_feet = isset($request->sizeSQFeet) ? $request->sizeSQFeet : 0;
        $property->buildup_sizes = isset($request->buildupSizes) ? $request->buildupSizes : 0;
        $property->front_elivation = isset($request->frontElivation) ? $request->frontElivation : 0;
        $property->common_area = isset($request->commonArea) ? $request->commonArea : 0;
        $property->entrance_num = isset($request->entranceNum) ? $request->entranceNum : 0;
        $property->bldg_num = isset($request->BLDGNum) ? $request->BLDGNum : 0;
        $property->unit_num = isset($request->unitNum) ? $request->unitNum : 0;
        $property->age = isset($request->age) ? $request->age : 0;
        $property->status = isset($request->status) ? $request->status : 0;
        $property->name = isset($request->name) ? $request->name : 0;
        $property->role = isset($request->role) ? $request->role : 0;
        $property->use = isset($request->use) ? $request->use : 0;
        $property->maintenance = isset($request->maintenance) ? $request->maintenance : 0;
        $property->no_of_units = isset($request->noOfUnits) ? $request->noOfUnits : 0;
        $property->no_of_rooms = isset($request->noOfRooms) ? $request->noOfRooms : 0;
        $property->no_of_roads = isset($request->noOfRoads) ? $request->noOfRoads : 0;
        $property->purchase_price = isset($request->purchasePrice) ? $request->purchasePrice : 0;
        $property->land_price = isset($request->landPrice) ? $request->landPrice : 0;
        $property->construction_price = isset($request->constructionPrice) ? $request->constructionPrice : 0;
        $property->renovation_price = isset($request->renovationPrice) ? $request->renovationPrice : 0;
        $property->rental_income = isset($request->rentalIncome) ? $request->rentalIncome : 0;
        $property->estimated_value = isset($request->estimatedValue) ? $request->estimatedValue : 0;
        $property->status = isset($request->propertyStatus) ? $request->propertyStatus : 'Draft';
        $property->latitude=isset($request->latitude) ? $request->latitude : '0';
        $property->longitude=isset($request->longitude) ? $request->longitude : '0';
        $this->ref_id=isset($request->propertyRefId) ? $request->propertyRefId : '';
        $property->save();
        $propertyId=$property->id;

        if ($request->hasFile('image'))
        {
            foreach($request->image as $key=> $img)
            {
                $propertyImg=new ValuationPropertyMedia;
                $imgName=Files::upload($img, 'property-img',300);
                $propertyImg->property_id=$propertyId;
                $propertyImg->media_name=$imgName;
                $propertyImg->save();
            }

        }
        $dimensions = isset($request->dimensions)?$request->dimensions:array();
        $dimensionsEncode = json_encode($dimensions);
        $addOnCosts = isset($request->addOnCosts)?$request->addOnCosts:array();
        $addOnCostsEncode = json_encode($addOnCosts);
        //FinancialInfoAcquisitionCost
        $aqu_Date=  isset($request->aqu_Date)?$request->aqu_Date:array();
        $aqu_transection_type=  isset($request->aqu_transection_type)?$request->aqu_transection_type:array();
        $aqu_description=  isset($request->aqu_description)?$request->aqu_description:array();
        $acqlandPrice=  isset($request->acqlandPrice)?$request->acqlandPrice:array();
        $acqlandCurrencyCode=  isset($request->currencyCode)?$request->currencyCode:array();
        $acqDataArray=array();
        if(!empty($aqu_Date) && !empty($aqu_transection_type) && !empty($aqu_description) && !empty($acqlandPrice) )
        {
            foreach($aqu_Date as $key=>$obj)
            {
                if(!empty($aqu_Date[$key]) && !empty($aqu_transection_type[$key]) && !empty($aqu_description[$key]) && !empty($acqlandPrice[$key]))
                {
                 $acqDataArray[]=array('date'=>$aqu_Date[$key],'trnsectionType'=>$aqu_transection_type[$key],'description'=>$aqu_description[$key],'price'=>$acqlandPrice[$key],'currencyCode'=>$acqlandCurrencyCode[$key]);   
                }               
            } 
        }
        $acqtransectionData=  json_encode($acqDataArray);
        //Financial Build up cost
        $buildupcost_cost_Date=  isset($request->build_up_Date)?$request->build_up_Date:array();
        $buildupcost_transection_type=  isset($request->buildup_transection_type)?$request->buildup_transection_type:array();
        $buildupcost_description=  isset($request->buildup_description)?$request->buildup_description:array();
        $buildupcostPrice=  isset($request->buildupPrice)?$request->buildupPrice:array();
        $buildupCurrencyCode=  isset($request->buildupCurrencyCode)?$request->buildupCurrencyCode:array();
        $buildUpCostDataArray=array();
        if(!empty($buildupcost_cost_Date) && !empty($buildupcost_transection_type) && !empty($buildupcost_description) && !empty($buildupcostPrice))
        {
            foreach($buildupcost_cost_Date as $key=>$obj)
            {
                if(!empty($buildupcost_cost_Date[$key]) && !empty($buildupcost_transection_type[$key]) && !empty($buildupcost_description[$key]) && !empty($buildupcostPrice[$key]))
                {
                   $buildUpCostDataArray[]=array('date'=>$buildupcost_cost_Date[$key],'trnsectionType'=>$buildupcost_transection_type[$key],'description'=>$buildupcost_description[$key],'price'=>$buildupcostPrice[$key],'currencyCode'=>$buildupCurrencyCode[$key]); 
                }  
            } 
        }
        $buildUpTransectionData=  json_encode($buildUpCostDataArray);
        //Financial AddOn cost
        $addOn_cost_Date=  isset($request->addon_cost_Date)?$request->addon_cost_Date:array();
        $addoncost_transection_type=  isset($request->addon_transection_type)?$request->addon_transection_type:array();
        $addoncost_description=  isset($request->addon_description)?$request->addon_description:array();
        $addoncostPrice=  isset($request->addonPrice)?$request->addonPrice:array();
        $addonCurrencyCode=  isset($request->addonCurrencyCode)?$request->addonCurrencyCode:array();
        $addonCostDataArray=array();
        if(!empty($addOn_cost_Date) && !empty($addoncost_transection_type) && !empty($addoncost_description) && !empty($addoncostPrice))
        {
            foreach($addOn_cost_Date as $key=>$obj)
            {
                if(!empty($addOn_cost_Date[$key]) && !empty($addoncost_transection_type[$key]) && !empty($addoncost_description[$key]) && !empty($addoncostPrice[$key]))
                {
                   $addonCostDataArray[]=array('date'=>$addOn_cost_Date[$key],'trnsectionType'=>$addoncost_transection_type[$key],'description'=>$addoncost_description[$key],'price'=>$addoncostPrice[$key],'currencyCode'=>$addonCurrencyCode[$key]); 
                }
                
            } 
        }
        $addonTransectionData=  json_encode($addonCostDataArray);
        // add and update property Meta
        $updatePropertyMeta = array();
        $updatePropertyMeta[ValuationProperty::DimensionsMetaKey] = $dimensionsEncode;
        $updatePropertyMeta[ValuationProperty::AddOnCostMetaKey] = $addOnCostsEncode;
        $updatePropertyMeta[ValuationProperty::FinancialAcquisitionCost] = $acqtransectionData;
        $updatePropertyMeta[ValuationProperty::FinancialBuildUpCost] = $buildUpTransectionData;
        $updatePropertyMeta[ValuationProperty::FinancialAddOnCost] = $addonTransectionData;

        $property->setMeta($updatePropertyMeta);
        
       if($request->id)
       {
               return Reply::redirect(route($this->addEditViewRoute,$request->id), __('Updated Success'));
       }
       else
       {
           return Reply::redirect(route($this->listingPageRoute), __('Save Success'));
       }
//        return Reply::redirect(route($this->listingPageRoute), __('Save Success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $property = ValuationProperty::find($id);

        if (empty($property)) {
            return Reply::error(__('valuation::messages.dataNotFound'));
        }

        ValuationProperty::destroy($id);

        return Reply::success(__('valuation::messages.dataDeleted'));
    }

    public function data()
    {
        $propertyObj = new ValuationProperty();

        $properties = $propertyObj->getAllForCompany();

        return DataTables::of($properties)
            ->addColumn('action', function ($row) {

                $action = '<div class="btn-group dropdown m-r-10">
                <button aria-expanded="false" data-toggle="dropdown" class="btn dropdown-toggle waves-effect waves-light" type="button"><i class="ti-more"></i></button>
                <ul role="menu" class="dropdown-menu pull-right">
                  <li><a href="' . route($this->addEditViewRoute, $row->id) . '"><i class="fa fa-pencil" aria-hidden="true"></i> ' . trans('valuation::app.edit') . '</a></li>
                  <li><a href="javascript:void(0)" id="' . $row->id . '" class="sa-params"><i class="fa fa-times" aria-hidden="true"></i> ' . trans('valuation::app.delete') . '</a></li>
                      <li><a href="' . route($this->propertyDetailRoute, $row->id) . '"><i class="fa fa-eye" aria-hidden="true"></i> ' . trans('valuation::valuation.property.detailProperty') . '</a></li>
                 ';

                $action .= '</ul> </div>';

                return $action;

            })
            ->editColumn(
                'title',
                function ($row) {
                    return ucfirst($row->title);
                }
            )
            ->addIndexColumn()
            ->rawColumns(array('title', 'action'))
            ->make(true);
    }
    
    public function propertyDetail($id)
    {
        $this->__customConstruct($this->data);
        $properties = new ValuationProperty();
        
        $this->propertiesCount = $properties->countForCompany();
        return view($this->viewFolderPath . 'detail.Index', $this->data);
    }

}
