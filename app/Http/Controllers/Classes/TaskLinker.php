<?php


namespace App\Http\Controllers\Classes;


use App\Project;
use App\Task;
use Illuminate\Database\Eloquent\Model;
use Modules\Valuation\Entities\ValuationBaseModel;
use Modules\Valuation\Entities\ValuationProperty;
use Modules\Valuation\Entities\ValuationPropertyWeightageCategory;

class TaskLinker
{

    public $returnValues = array();
    public static $subTaskFormElement = [
        'noOfBedrooms' => 'No. of Bedroom',
        'noOfBathrooms' => 'No. of Bathrooms',
        'finishingQuality' => 'Finishing Quality',
        'landClassification' => 'Land Classification',
        'accessibility' => 'Accessibility',
        'accessibilityType' => 'Accessibility Type',
        'noOfAccessRoads' => 'No. of Access Roads',
        'accessRoadType' => 'Access Road Type',
        'recencyOfTransaction' => 'Recency of Transaction',
        'landShape' => 'Land shape',
        'locationClassification' => 'Location Classification',
        'maintenance' => 'Maintenance',
        'floorLevel' => 'Floor level',
        'view' => 'View',
        'amenities' => 'Amenities',
    ];


    public function index($subTasks,$taskID)
    {
        if(isset($subTasks[0])){
            $modelTask = new Task();
            $task = $modelTask->find($taskID);
            $modelProject = new Project();
            $project = $modelProject->find($task->project_id);
            $propertyObj = new ValuationProperty();
            $propertyData = $propertyObj->find($project->property_id);
        foreach ($subTasks as $subTask) {
            switch ($subTask['formFieldKey']) {
                case 'noOfBedrooms':
                    $this->returnValues[] = $this->noOfBedroomsTypeArray($subTask,$propertyData);
                    break;
                case  'noOfBathrooms' :
                    $this->returnValues[] = $this->noOfBathroomsTypeArray($subTask,$propertyData);
                    break;
                case 'finishingQuality':
                    $this->returnValues[] = $this->finishingQualityTypeArray($subTask,$propertyData);
                    break;
                case 'landClassification':
                    $this->returnValues[] = $this->landClassificationTypeArray($subTask,$propertyData);
                    break;
                case   'accessibility':
                    $this->returnValues[] = $this->accessibilityArray($subTask,$propertyData);
                    break;
                case 'accessibilityType':
                    $this->returnValues[] = $this->accessibilityTypeArray($subTask,$propertyData);
                    break;
                case 'noOfAccessRoads':
                    $this->returnValues[] = $this->noOfAccessRoadsTypeArray($subTask,$propertyData);
                    break;
                case    'accessRoadType':
                    $this->returnValues[] = $this->accessRoadTypeArray($subTask,$propertyData);
                    break;
                case  'recencyOfTransaction':
                    $this->returnValues[] = $this->recencyOfTransactionTypeArray($subTask,$propertyData);
                    break;
                case  'landShape':
                    $this->returnValues[] = $this->landShapeTypeArray($subTask,$propertyData);
                    break;
                case 'locationClassification':
                    $this->returnValues[] = $this->locationClassificationTypeArray($subTask,$propertyData);
                    break;
                case  'maintenance':
                    $this->returnValues[] = $this->maintenanceTypeArray($subTask,$propertyData);
                    break;
                case  'floorLevel':
                    $this->returnValues[] = $this->floorLevelTypeArray($subTask,$propertyData);
                    break;
                case 'view':
                    $this->returnValues[] = $this->viewTypeArray($subTask,$propertyData);
                    break;
                case 'amenities':
                    $this->returnValues[] = $this->amenitiesTypeArray($subTask,$propertyData);
                    break;
                default:
                    break;
            }
        }
        return $this->returnValues;
        }else{
            return 'No data found';
        }
    }

    private function noOfBedroomsTypeArray($subTask,$propertyData): array
    {
        $categoryObj = new ValuationPropertyWeightageCategory();
        $this->BedRooms = (object)$categoryObj->where('conditional_text', '=', ValuationPropertyWeightageCategory::NoOfBedroomText)->get();
        $this->NoOfBedroomWeightage = ($propertyData != null) ? optional($propertyData->getMeta(ValuationProperty::NoOfBedroomText, array()))->toArray() : array();

        return [
            'id'=>$subTask['id'],
            'taskId'=>$subTask['task_id'],
            'title'=>$subTask['title'],
            'fieldType'=>'select',
            'isRequired'=>'true',
            'fieldProperties'=>[
                'value'=> $this->NoOfBedroomWeightage,
                'link_field_with'=>[
                    'table'=>'valuation_property_meta',
                    'field'=>'NoOfBedroom'
                ],
                'option'=>$this->BedRooms
            ],
            'dueDate'=>$subTask['due_date'],
            'startDate'=>$subTask['start_date'],
            'status'=>$subTask['status']
        ];
    }

    private function noOfBathroomsTypeArray($subTask,$propertyData): array
    {
                $categoryObj = new ValuationPropertyWeightageCategory();
        $this->BathRoom = (object)$categoryObj->where('conditional_text', '=', ValuationPropertyWeightageCategory::NoOfBathoomsText)->get();
        $this->NoOfBathoomsWeightage = ($propertyData != null) ? optional($propertyData->getMeta(ValuationProperty::NoOfBathoomsText, array()))->toArray() : array();

        return [
            'id'=>$subTask['id'],
            'taskId'=>$subTask['task_id'],
            'title'=>$subTask['title'],
            'fieldType'=>'select',
            'isRequired'=>'true',
            'fieldProperties'=>[
                'value'=>  $this->NoOfBathoomsWeightage,
                'link_field_with'=>[
                    'table'=>'valuation_property_meta',
                    'field'=>'NoOfBathooms'
                ],
                'option'=>$this->BathRoom
            ],
            'dueDate'=>$subTask['due_date'],
            'startDate'=>$subTask['start_date'],
            'status'=>$subTask['status']
        ];
    }

    private function finishingQualityTypeArray($subTask,$propertyData): array
    {
                $categoryObj = new ValuationPropertyWeightageCategory();
        $this->FinishingQuality = (object)$categoryObj->where('conditional_text', '=', ValuationPropertyWeightageCategory::FinishingQualityText)->get();
        $this->FinishingQualityWeightage = ($propertyData != null) ? optional($propertyData->getMeta(ValuationProperty::FinishingQualityText, array()))->toArray() : array();

        return [
            'id'=>$subTask['id'],
            'taskId'=>$subTask['task_id'],
            'title'=>$subTask['title'],
            'fieldType'=>'select',
            'isRequired'=>'true',
            'fieldProperties'=>[
                'value'=>$this->FinishingQualityWeightage,
                'link_field_with'=>[
                    'table'=>'valuation_property_meta',
                    'field'=>'FinishingQuality'
                ],
                'option'=>$this->FinishingQuality
            ],
            'dueDate'=>$subTask['due_date'],
            'startDate'=>$subTask['start_date'],
            'status'=>$subTask['status']
        ];
    }

    private function landClassificationTypeArray($subTask,$propertyData): array
    {
                $categoryObj = new ValuationPropertyWeightageCategory();
        $this->LandClassification = (object)$categoryObj->where('conditional_text', '=', ValuationPropertyWeightageCategory::LandClassificationTypeText)->get();
        $this->landClassficationMeta = ($propertyData != null) ? optional($propertyData->getMeta(ValuationProperty::LandClassificationTypeText, array()))->toArray() : array();

        return [
            'id'=>$subTask['id'],
            'taskId'=>$subTask['task_id'],
            'title'=>$subTask['title'],
            'fieldType'=>'select',
            'isRequired'=>'true',
            'fieldProperties'=>[
                'value'=> $this->landClassficationMeta,
                'link_field_with'=>[
                    'table'=>'valuation_property_meta',
                    'field'=>'LandClassification'
                ],
                'option'=>$this->LandClassification

            ],
            'dueDate'=>$subTask['due_date'],
            'startDate'=>$subTask['start_date'],
            'status'=>$subTask['status']
        ];
    }

    private function accessibilityArray($subTask,$propertyData): array
    {
                $categoryObj = new ValuationPropertyWeightageCategory();
        $this->Accessibility = (object)$categoryObj->where('conditional_text', '=', ValuationPropertyWeightageCategory::AccessibilityText)->get();
        $this->AccessibilityMeta = ($propertyData != null) ? optional($propertyData->getMeta(ValuationProperty::AccessibilityText, array()))->toArray() : array();

        return [
             'id'=>$subTask['id'],
             'taskId'=>$subTask['task_id'],
             'title'=>$subTask['title'],
             'fieldType'=>'select',
             'isRequired'=>'true',
             'fieldProperties'=>[
                 'value'=> $this->AccessibilityMeta,
                 'link_field_with'=>[
                     'table'=>'valuation_property_meta',
                     'field'=>'Accessibility'
                 ],
                 'option'=>$this->Accessibility
             ],
             'dueDate'=>$subTask['due_date'],
             'startDate'=>$subTask['start_date'],
             'status'=>$subTask['status']
         ];
    }

    private function accessibilityTypeArray($subTask,$propertyData): array
    {
                $categoryObj = new ValuationPropertyWeightageCategory();
        $this->AccessibilityType = (object)$categoryObj->where('conditional_text', '=', ValuationPropertyWeightageCategory::AccessibilityTypeText)->get();
        $this->AccessibilityTypeMeta = ($propertyData != null) ? optional($propertyData->getMeta(ValuationProperty::AccessibilityTypeText, array()))->toArray() : array();

        return [
             'id'=>$subTask['id'],
             'taskId'=>$subTask['task_id'],
             'title'=>$subTask['title'],
             'fieldType'=>'select',
             'isRequired'=>'true',
             'fieldProperties'=>[
                 'value'=>$this->AccessibilityTypeMeta,
                 'link_field_with'=>[
                     'table'=>'valuation_property_meta',
                     'field'=>'AccessibilityType'
                 ],
                 'option'=> $this->AccessibilityType
             ],
             'dueDate'=>$subTask['due_date'],
             'startDate'=>$subTask['start_date'],
             'status'=>$subTask['status']
         ];
    }

    private function noOfAccessRoadsTypeArray($subTask,$propertyData): array
    {
                $categoryObj = new ValuationPropertyWeightageCategory();
        $this->RoadAccessNo = (object)$categoryObj->where('conditional_text', '=', ValuationPropertyWeightageCategory::NoOfAccessRoadsText)->get();
        $this->NoOfAccessRoadMeta = ($propertyData != null) ? optional($propertyData->getMeta(ValuationProperty::NoOfAccessRoadsText, array()))->toArray() : array();

        return [
             'id'=>$subTask['id'],
             'taskId'=>$subTask['task_id'],
             'title'=>$subTask['title'],
             'fieldType'=>'select',
             'isRequired'=>'true',
             'fieldProperties'=>[
                 'value'=>$this->NoOfAccessRoadMeta,
                 'link_field_with'=>[
                     'table'=>'valuation_property_meta',
                     'field'=>'NoOfAccessRoads'
                 ],
                 'option'=> $this->RoadAccessNo
             ],
             'dueDate'=>$subTask['due_date'],
             'startDate'=>$subTask['start_date'],
             'status'=>$subTask['status']
         ];
    }

    private function accessRoadTypeArray($subTask,$propertyData): array
    {
                $categoryObj = new ValuationPropertyWeightageCategory();
        $this->RoadAccessType = (object)$categoryObj->where('conditional_text', '=', ValuationPropertyWeightageCategory::AccessRoadTypeText)->get();
        $this->AccessRoadTypeMeta = ($propertyData != null) ? optional($propertyData->getMeta(ValuationProperty::AccessRoadTypeText, array()))->toArray() : array();

        return [
             'id'=>$subTask['id'],
             'taskId'=>$subTask['task_id'],
             'title'=>$subTask['title'],
             'fieldType'=>'select',
             'isRequired'=>'true',
             'fieldProperties'=>[
                 'value'=>$this->AccessRoadTypeMeta,
                 'link_field_with'=>[
                     'table'=>'valuation_property_meta',
                     'field'=>'AccessRoadType'
                 ],
                 'option'=> $this->RoadAccessType
             ],
             'dueDate'=>$subTask['due_date'],
             'startDate'=>$subTask['start_date'],
             'status'=>$subTask['status']
         ];
    }

    private function recencyOfTransactionTypeArray($subTask,$propertyData): array
    {
                $categoryObj = new ValuationPropertyWeightageCategory();
        $this->RecencyTransection = (object)$categoryObj->where('conditional_text', '=', ValuationPropertyWeightageCategory::RecencyTransectionText)->get();
        $this->RecencyTransectionMeta = ($propertyData != null) ? optional($propertyData->getMeta(ValuationProperty::RecencyTransectionText, array()))->toArray() : array();

        return [
             'id'=>$subTask['id'],
             'taskId'=>$subTask['task_id'],
             'title'=>$subTask['title'],
             'fieldType'=>'select',
             'isRequired'=>'true',
             'fieldProperties'=>[
                 'value'=>$this->RecencyTransectionMeta,
                 'link_field_with'=>[
                     'table'=>'valuation_property_meta',
                     'field'=>'RecencyTransection'
                 ],
                 'option'=>$this->RecencyTransection
             ],
             'dueDate'=>$subTask['due_date'],
             'startDate'=>$subTask['start_date'],
             'status'=>$subTask['status']
         ];
    }

    private function landShapeTypeArray($subTask,$propertyData): array
    {
                $categoryObj = new ValuationPropertyWeightageCategory();
        $this->LandShape = (object)$categoryObj->where('conditional_text', '=', ValuationPropertyWeightageCategory::LandshapeText)->get();
        $this->landShapeMeta = ($propertyData != null) ? optional($propertyData->getMeta(ValuationProperty::LandshapeText, array()))->toArray() : array();

        return [
             'id'=>$subTask['id'],
             'taskId'=>$subTask['task_id'],
             'title'=>$subTask['title'],
             'fieldType'=>'select',
             'isRequired'=>'true',
             'fieldProperties'=>[
                 'value'=> $this->landShapeMeta ,
                 'link_field_with'=>[
                     'table'=>'valuation_property_meta',
                     'field'=>'Landshape'
                 ],
                 'option'=> $this->LandShape
             ],
             'dueDate'=>$subTask['due_date'],
             'startDate'=>$subTask['start_date'],
             'status'=>$subTask['status']
         ];
    }

    private function locationClassificationTypeArray($subTask,$propertyData): array
    {
                $categoryObj = new ValuationPropertyWeightageCategory();
        $this->LocationClassification = (object)$categoryObj->where('conditional_text', '=', ValuationPropertyWeightageCategory::LocationClassificationText)->get();
        $this->LocationClassificationMeta = ($propertyData != null) ? optional($propertyData->getMeta(ValuationProperty::LocationClassificationText, array()))->toArray() : array();

        return [
             'id'=>$subTask['id'],
             'taskId'=>$subTask['task_id'],
             'title'=>$subTask['title'],
             'fieldType'=>'select',
             'isRequired'=>'true',
             'fieldProperties'=>[
                 'value'=> $this->LocationClassificationMeta,
                 'link_field_with'=>[
                     'table'=>'valuation_property_meta',
                     'field'=>'LocationClassification'
                 ],
                 'option'=>$this->LocationClassification
             ],
             'dueDate'=>$subTask['due_date'],
             'startDate'=>$subTask['start_date'],
             'status'=>$subTask['status']
         ];
    }

    private function maintenanceTypeArray($subTask,$propertyData): array
    {
                $categoryObj = new ValuationPropertyWeightageCategory();
        $this->Maintenance = (object)$categoryObj->where('conditional_text', '=', ValuationPropertyWeightageCategory::MaintenanceText)->get();
        $this->MaintenanceWeightage = ($propertyData != null) ? optional($propertyData->getMeta(ValuationProperty::MaintenanceText, array()))->toArray() : array();

        return [
             'id'=>$subTask['id'],
             'taskId'=>$subTask['task_id'],
             'title'=>$subTask['title'],
             'fieldType'=>'select',
             'isRequired'=>'true',
             'fieldProperties'=>[
                 'value'=> $this->MaintenanceWeightage,
                 'link_field_with'=>[
                     'table'=>'valuation_property_meta',
                     'field'=>'Maintenance'
                 ],
                 'option'=>$this->Maintenance
             ],
             'dueDate'=>$subTask['due_date'],
             'startDate'=>$subTask['start_date'],
             'status'=>$subTask['status']
         ];
    }

    private function floorLevelTypeArray($subTask,$propertyData): array
    {
                $categoryObj = new ValuationPropertyWeightageCategory();
        $this->Floorlevel = (object)$categoryObj->where('conditional_text', '=', ValuationPropertyWeightageCategory::FloorlevelText)->get();
        $this->FloorlevelWeightage = ($propertyData != null) ? optional($propertyData->getMeta(ValuationProperty::FloorlevelText, array()))->toArray() : array();

        return [
             'id'=>$subTask['id'],
             'taskId'=>$subTask['task_id'],
             'title'=>$subTask['title'],
             'fieldType'=>'select',
             'isRequired'=>'true',
             'fieldProperties'=>[
                 'value'=> $this->FloorlevelWeightage,
                 'link_field_with'=>[
                     'table'=>'valuation_property_meta',
                     'field'=>'Floorlevel'
                 ],
                 'option'=>$this->Floorlevel
             ],
             'dueDate'=>$subTask['due_date'],
             'startDate'=>$subTask['start_date'],
             'status'=>$subTask['status']
         ];
    }

    private function viewTypeArray($subTask,$propertyData): array
    {
                $categoryObj = new ValuationPropertyWeightageCategory();
        $this->WeitageView = (object)$categoryObj->where('conditional_text', '=', ValuationPropertyWeightageCategory::ViewText)->get();
        $this->ViewCategoryWeightage = ($propertyData != null) ? optional($propertyData->getMeta(ValuationProperty::ViewText, array()))->toArray() : array();

        return [
             'id'=>$subTask['id'],
             'taskId'=>$subTask['task_id'],
             'title'=>$subTask['title'],
             'fieldType'=>'select',
             'isRequired'=>'true',
             'fieldProperties'=>[
                 'value'=>$this->ViewCategoryWeightage,
                 'link_field_with'=>[
                     'table'=>'valuation_property_meta',
                     'field'=>'View'
                 ],
                 'option'=> $this->WeitageView
             ],
             'dueDate'=>$subTask['due_date'],
             'startDate'=>$subTask['start_date'],
             'status'=>$subTask['status']
         ];
    }

    private function amenitiesTypeArray($subTask,$propertyData): array
    {
                $categoryObj = new ValuationPropertyWeightageCategory();
        $this->Amenities = (object)$categoryObj->where('conditional_text', '=', ValuationPropertyWeightageCategory::AmenitiesText)->get();
        $this->AmenitiesWeightage = ($propertyData != null) ? optional($propertyData->getMeta(ValuationProperty::AmenitiesText, array()))->toArray() : array();

        return [
             'id'=>$subTask['id'],
             'taskId'=>$subTask['task_id'],
             'title'=>$subTask['title'],
             'fieldType'=>'select',
             'isRequired'=>'true',
             'fieldProperties'=>[
                 'value'=> $this->AmenitiesWeightage,
                 'link_field_with'=>[
                     'table'=>'valuation_property_meta',
                     'field'=>'Amenities'
                 ],
                 'option'=> $this->Amenities
             ],
             'dueDate'=>$subTask['due_date'],
             'startDate'=>$subTask['start_date'],
             'status'=>$subTask['status']
         ];
    }
}