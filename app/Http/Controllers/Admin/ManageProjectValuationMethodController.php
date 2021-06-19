<?php

namespace App\Http\Controllers\Admin;

use App\EmployeeDetails;
use App\EmployeeTeam;
use App\Helper\Reply;
use App\Http\Requests\ProjectMembers\SaveGroupMembers;
use App\Http\Requests\ProjectMembers\StoreProjectMembers;
use App\Notifications\NewProjectMember;
use App\Project;
use App\ProjectMember;
use App\Team;
use App\User;
use Illuminate\Http\Request;
use Modules\Valuation\Entities\ValuationProperty;

class ManageProjectValuationMethodController extends AdminBaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->pageIcon = 'icon-layers';
        $this->pageTitle = 'app.menu.projects';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectMembers $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->projectId = $id;
        $project = Project::findOrFail($id);
        $this->project = $project;

        $propertyObj = new ValuationProperty();


        $this->baseproprety = null;
        $basePropertyId = isset($project->property_id)?$project->property_id:'0';
        $this->basePropertyId = $basePropertyId;

        if($basePropertyId > 0){
            $baseProperty = ValuationProperty::findOrFail($basePropertyId);
            $this->baseProperty = $baseProperty;
        }

        $allProperties = $propertyObj->getAllForCompany()->except($basePropertyId);
        $this->properties = $allProperties;

        return view('admin.projects.ValuationMethodology.ComparativeMethod', $this->data);
    }

    public function saveProjectBaseProperty(Request $request)
    {
        $projectId = isset($request->projectId)?$request->projectId:0;
        if($projectId <= 0){
            return Reply::error('Project id should be greater then 0');
        }

        $projectPropertyId = (isset($request->projectBaseProperty) && $request->projectBaseProperty > 0 ) ? $request->projectBaseProperty : 0;
        if($projectPropertyId <= 0){
            return Reply::error('Project property id should be greater then 0');
        }

        $project = Project::findOrFail($projectId);
        $project->property_id = (isset($request->projectBaseProperty) && $request->projectBaseProperty != '' )?$request->projectBaseProperty:'';
        $project->save();

        return Reply::redirect(route('admin.valuation-method.show', $project->id), 'Project base property saved');
    }

    public function processComparison(Request $request)
    {

        $propertyIdBase = isset($request->basePropertyId)?$request->basePropertyId:0;
        if($propertyIdBase <= 0){
            return Reply::error('Base property id should be greater then 0');
        }

        $propertyIdOne = isset($request->comparePropertyOne)?$request->comparePropertyOne:0;
        if($propertyIdOne <= 0){
            return Reply::error('comparable property 1 id should be greater then 0');
        }

        $propertyIdTwo = isset($request->comparePropertyTwo)?$request->comparePropertyTwo:0;
        if($propertyIdTwo <= 0){
            return Reply::error('comparable property 2 id should be greater then 0');
        }

        $propertyIdThree = isset($request->comparePropertyThree)?$request->comparePropertyThree:0;
        if($propertyIdThree <= 0){
            return Reply::error('comparable property 3 id should be greater then 0');
        }

        $propertyBaseInfo = ValuationProperty::findOrFail($propertyIdBase);

        /*$weightage = array();
        $weightage['bedrooms']['name'] = 'bedrooms';
        $weightage['bedrooms']['value'] = '2';
        $weightage['bedrooms']['percent'] = '20';
        $weightage['bedrooms']['maxValue'] = '8';

        $weightage['bathrooms']['name'] = 'bathroom';
        $weightage['bathrooms']['value'] = '3';
        $weightage['bathrooms']['percent'] = '10';
        $weightage['bathrooms']['maxValue'] = '8';

        $weightage['finishingQuality']['name'] = 'finishingQuality';
        $weightage['finishingQuality']['value'] = '3';
        $weightage['finishingQuality']['percent'] = '20';
        $weightage['finishingQuality']['maxValue'] = '8';

        $weightage['maintenance']['name'] = 'maintenance';
        $weightage['maintenance']['value'] = '3';
        $weightage['maintenance']['percent'] = '20';
        $weightage['maintenance']['maxValue'] = '8';

        $weightage['floorLevel']['name'] = 'floorLevel';
        $weightage['floorLevel']['value'] = '3';
        $weightage['floorLevel']['percent'] = '20';
        $weightage['floorLevel']['maxValue'] = '8';

        $weightage['amenities']['name'] = 'amenities';
        $weightage['amenities']['value'] = '3';
        $weightage['amenities']['percent'] = '20';
        $weightage['amenities']['maxValue'] = '8';

        $propertyBaseInfo->Weightage = $weightage;*/

        $propertyBaseInfo->bedrooms = 2;
        $propertyBaseInfo->bathrooms = 3;
        $propertyBaseInfo->finishingQuality = 6.25;
        $propertyBaseInfo->maintenance = 0;
        $propertyBaseInfo->floorLevel = 3;
        $propertyBaseInfo->amenities = 3;

        $propertyInfoOne = ValuationProperty::findOrFail($propertyIdOne);
        $propertyInfoOne->bedrooms = 2;
        $propertyInfoOne->bathrooms = 3;
        $propertyInfoOne->finishingQuality = 6.25;
        $propertyInfoOne->maintenance = 0;
        $propertyInfoOne->floorLevel = 3;
        $propertyInfoOne->amenities = 3;

        $propertyInfoTwo = ValuationProperty::findOrFail($propertyIdTwo);
        $propertyInfoTwo->bedrooms = 2;
        $propertyInfoTwo->bathrooms = 3;
        $propertyInfoTwo->finishingQuality = 6.25;
        $propertyInfoTwo->maintenance = 0;
        $propertyInfoTwo->floorLevel = 3;
        $propertyInfoTwo->amenities = 3;

        $propertyInfoThree = ValuationProperty::findOrFail($propertyIdThree);
        $propertyInfoThree->bedrooms = 3;
        $propertyInfoThree->bathrooms = 3;
        $propertyInfoThree->finishingQuality = 6.25;
        $propertyInfoThree->maintenance = -1.25;
        $propertyInfoThree->floorLevel = 3;
        $propertyInfoThree->amenities = 3;


        //compare Processing start
        //bedrooms comparison
        $baseBedrooms = $propertyBaseInfo->bedrooms;
        $bedroomsPropertyInfoOne = $propertyInfoOne->bedrooms;
        $bedroomsPropertyInfoTwo = $propertyInfoTwo->bedrooms;
        $bedroomsPropertyInfoThree = $propertyInfoThree->bedrooms;
        $maxBedrooms = '8';

        $baseMinusProOne = $baseBedrooms-$bedroomsPropertyInfoOne;
        $propertyInfoOne->baseMinusProOne = $baseMinusProOne;
        $propertyInfoOne->bedComparison = $baseMinusProOne/$maxBedrooms;

        $baseMinusProTwo = $baseBedrooms-$bedroomsPropertyInfoTwo;
        $propertyInfoTwo->baseMinusProTwo = $baseMinusProTwo;
        $propertyInfoTwo->bedComparison = $baseMinusProTwo/$maxBedrooms;

        $baseMinusProThree = $baseBedrooms-$bedroomsPropertyInfoThree;
        $propertyInfoThree->baseMinusProThree = $baseMinusProThree;
        $propertyInfoThree->bedComparison = ($baseMinusProThree/$maxBedrooms)*100;

        // bathroom comparison
        $baseBathroom = $propertyBaseInfo->bathrooms;
        $bathroomsPropertyInfoOne = $propertyInfoOne->bathrooms;
        $bathroomsPropertyInfoTwo = $propertyInfoTwo->bathrooms;
        $bathroomsPropertyInfoThree = $propertyInfoThree->bathrooms;
        $maxBathrooms = '8';

        $bathBaseMinusProOne = $baseBathroom-$bathroomsPropertyInfoOne;
        $propertyInfoOne->bathBaseMinusProOne = $bathBaseMinusProOne;
        $propertyInfoOne->bathComparison = $bathBaseMinusProOne/$maxBathrooms;

        $bathBaseMinusProTwo = $baseBathroom-$bathroomsPropertyInfoTwo;
        $propertyInfoTwo->bathBaseMinusProTwo = $bathBaseMinusProTwo;
        $propertyInfoTwo->bathComparison = $bathBaseMinusProTwo/$maxBathrooms;


        $bathBaseMinusProThree = $baseBathroom-$bathroomsPropertyInfoThree;
        $propertyInfoThree->bathBaseMinusProThree = $bathBaseMinusProThree;
        $propertyInfoThree->bathComparison = $bathBaseMinusProThree/$maxBathrooms;


        //Finishing Quality
        $finishingQualityBase = $propertyBaseInfo->finishingQuality;
        $maintenanceBase = $propertyBaseInfo->maintenance;
        $finishingQualityPropertyInfoOne = $propertyInfoOne->finishingQuality;
        $maintenancePropertyInfoOne = $propertyInfoOne->maintenance;
        $finishingQualityPropertyInfoTwo = $propertyInfoTwo->finishingQuality;
        $maintenancePropertyInfoTwo = $propertyInfoTwo->maintenance;
        $finishingQualityPropertyInfoThree = $propertyInfoThree->finishingQuality;
        $maintenancePropertyInfoThree = $propertyInfoThree->maintenance;


        $finishingQualityCalBase = $finishingQualityBase + $maintenanceBase;

        $finishingQualityCalProOne = $finishingQualityPropertyInfoOne+$maintenancePropertyInfoOne;
        $propertyInfoOne->finishingQualityCal = $finishingQualityCalProOne;
        $propertyInfoOne->finishingQualityComparison = ($finishingQualityCalBase-$finishingQualityCalProOne)/100;


        $finishingQualityCalProTwo = $finishingQualityPropertyInfoTwo+$maintenancePropertyInfoTwo;
        $propertyInfoTwo->finishingQualityCal = $finishingQualityCalProTwo;
        $propertyInfoTwo->finishingQualityComparison = ($finishingQualityCalBase-$finishingQualityCalProTwo)/100;

        $finishingQualityCalProThree = $finishingQualityPropertyInfoThree + $maintenancePropertyInfoThree;
        $propertyInfoThree->finishingQualityCal = $finishingQualityCalProThree;
        $propertyInfoThree->finishingQualityComparison = ($finishingQualityCalBase-$finishingQualityCalProThree)/100;





        $propertyInfo = array();
        $propertyInfo['propertyBaseInfo'] = $propertyBaseInfo;
        $propertyInfo['propertyInfoOne'] = $propertyInfoOne;
        $propertyInfo['propertyInfoTwo'] = $propertyInfoTwo;
        $propertyInfo['propertyInfoThree'] = $propertyInfoThree;

        echo "<pre>"; print_r($propertyInfo); exit;
        $returnArray['propertyInfo'] = $propertyInfo;
        $returnArray['status'] = 'success';
        echo json_encode($returnArray); exit;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->projectMember = ProjectMember::findOrFail($id);
        return view('admin.projects.project-member.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $member = ProjectMember::findOrFail($id);
        $member->hourly_rate = $request->hourly_rate;
        $member->save();
        return Reply::success(__('messages.updateSuccess'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projectMember = ProjectMember::findOrFail($id);

        $project = Project::findOrFail($projectMember->project_id);

        if ($project->project_admin == $projectMember->user_id) {
            $project->project_admin = null;
            $project->save();
        }
        $projectMember->delete();

        return Reply::success(__('messages.memberRemovedFromProject'));
    }

    public function storeGroup(SaveGroupMembers $request)
    {
        $groups = $request->group_id;
        $project = Project::find($request->project_id);

        foreach ($groups as $group) {

            $members = EmployeeDetails::join('users', 'users.id', '=', 'employee_details.user_id')
                ->where('employee_details.department_id', $group)
                ->where('users.status', 'active')
                ->select('employee_details.*')
                ->get();

            foreach ($members as $user) {
                $check = ProjectMember::where('user_id', $user->user_id)->where('project_id', $request->project_id)->first();

                if (is_null($check)) {
                    $member = new ProjectMember();
                    $member->user_id = $user->user_id;
                    $member->project_id = $request->project_id;
                    $member->save();

                    if ($project->publish_status == 'published') {
                        $this->logProjectActivity($request->project_id, ucwords($member->user->name) . __('messages.isAddedAsProjectMember'));
                    }
                }
            }
        }

        return Reply::success(__('messages.membersAddedSuccessfully'));
    }
}
