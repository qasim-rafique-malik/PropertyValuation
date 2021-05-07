<?php

namespace Modules\RestAPI\Http\Controllers;

use App\LeadStatus;
use Modules\RestAPI\Entities\Lead;
use Modules\RestAPI\Http\Requests\Lead\IndexRequest;
use Modules\RestAPI\Http\Requests\Lead\CreateRequest;
use Modules\RestAPI\Http\Requests\Lead\UpdateRequest;
use Modules\RestAPI\Http\Requests\Lead\ShowRequest;
use Modules\RestAPI\Http\Requests\Lead\DeleteRequest;

class LeadController extends ApiBaseController
{
    protected $model = Lead::class;

    protected $indexRequest = IndexRequest::class;
    protected $storeRequest = CreateRequest::class;
    protected $updateRequest = UpdateRequest::class;
    protected $showRequest = ShowRequest::class;
    protected $deleteRequest = DeleteRequest::class;

    public function modifyIndex($query)
    {
        return $query->visibility();
    }

    public function storing(Lead $lead)
    {
        $leadStatus = LeadStatus::where('default', '1')->first();
        $lead->status_id = $leadStatus->id;
        return $lead;
    }
}
