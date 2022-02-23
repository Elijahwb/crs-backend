<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Request as ModelsRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:api");
    }

    public function index()
    {
        request()->validate(['projectId' => 'required']);

        return $this->resSuc($this->all_requests(request()->projectId));
    }

    public function store()
    {
        request()->validate([
            'title',
            'description',
            'requested_by',
            'module_id',
            'developer_id',
            'approval_status_id',
            'work_status_id',
            'project_id',
        ]);


        try
        {
            $request = ModelsRequest::create([
                'title' => request()->title,
                'description' => request()->description,
                'requested_by' => request()->requestedBy,
                'module_id' => request()->moduleId,
                'developer_id' => request()->developerId,
                'approval_status_id' => 1,
                'approved_by' => null,
                'work_status_id' => 1,
                'project_id' => request()->projectId,
                'viewed_by' => Auth::user()->id . ',',
            ]);

            if($request)
            {
                return $this->resSuc($this->all_requests(request()->projectId));
            }

            return $this->resFail('Request has not been created');
        }
        catch(Exception $e)
        {
            return $this->resFail($e);
        }

    }

    public function approve_request()
    {
        request()->validate(['requestId', 'require']);

        if(Auth::user()->role_id === 1)
        {
            $request = ModelsRequest::find(request()->requestId);

            if($request)
            {
                $request->update(['approval_status_id' => 2,'work_status_id' => 2, 'approved_by' => Auth::user()->id]);

                return $this->resSuc($this->all_requests($request->project_id));
            }

            return $this->resFail('Request was not found in the system');
        }

        return $this->resFail('User not authorised to access this service');
    }

    public function decline_request()
    {
        request()->validate(['requestId', 'require']);

        if(Auth::user()->role_id === 1)
        {
            $request = ModelsRequest::find(request()->requestId);

            if($request)
            {
                $request->update(['approval_status_id' => 3, 'approved_by' => Auth::user()->id]);

                return $this->resSuc($this->all_requests($request->project_id));
            }

            return $this->resFail('Request was not found in the system');
        }

        return $this->resFail('User not authorised to access this service');
    }

    public function initiate_request()
    {
        request()->validate(['requestId', 'require']);

        if(Auth::user()->role_id === 1)
        {
            $request = ModelsRequest::find(request()->requestId);

            if($request)
            {
                $request->update(['work_status_id' => 2]);

                return $this->resSuc($this->all_requests($request->project_id));
            }

            return $this->resFail('Request was not found in the system');
        }

        return $this->resFail('User not authorised to access this service');
    }

    public function complete_request()
    {
        request()->validate(['requestId', 'require']);

        $request = ModelsRequest::find(request()->requestId);

        if($request)
        {
            $request->update(['work_status_id' => 3]);

            return $this->resSuc($this->all_requests($request->project_id));
        }

        return $this->resFail('Request was not found in the system');
    }

    public function close_request()
    {
        request()->validate(['requestId', 'require']);

        if(Auth::user()->role_id === 1)
        {
            $request = ModelsRequest::find(request()->requestId);

            if($request)
            {
                $request->update(['work_status_id' => 4]);

                return $this->resSuc($this->all_requests($request->project_id));
            }

            return $this->resFail('Request was not found in the system');
        }

        return $this->resFail('User not authorised to access this service');
    }

    public function view_request()
    {
        request()->validate(['requestId' => 'required']);

        $request = ModelsRequest::find(request()->requestId);

        if($request)
        {
            $already_viewed = $this->user_viewed_request($request->viewed_by);

            if(!$already_viewed)
            {
                $new_viewed_by = $request->viewed_by . Auth::user()->id . ',';

                $request->update(['viewed_by' => $new_viewed_by]);

                return $this->resSuc(null);
            }

            return $this->resFail('already viewed');
        }

        return $this->resFail('Request was not found in the system');
    }

    private function user_viewed_request($viewed_by)
    {
        $viewers_arr = explode(',', $viewed_by);

        $viewers_arr = array_filter($viewers_arr);

        $already_viewed = false;

        foreach($viewers_arr as $viewer_id)
        {
            if($viewer_id == Auth::user()->id)
            {
                $already_viewed = true;
                break;
            }
        }

        return $already_viewed;
    }

    private function all_requests($projectId)
    {
        $approvedRequests = 0;
        $declinedRequests = 0;
        $pendingRequests = 0;
        $closedRequests = 0;
        $completeRequests = 0;
        $inProgress = 0;

        $allRequests = ModelsRequest::where('project_id', $projectId)
        ->with([
            'requestor',
            'approval_status',
            'work_status',
            'developer',
            'module',
        ])->orderBy('created_at', 'desc')->get();

        foreach($allRequests as $request)
        {
            if($request->approval_status_id == 1)
            {
                $pendingRequests++;
            }

            if($request->approval_status_id == 2)
            {
                $approvedRequests++;
            }

            if($request->approval_status_id == 3)
            {
                $declinedRequests++;
            }

            if($request->work_status_id == 2)
            {
                $inProgress++;
            }

            if($request->work_status_id == 3)
            {
                $completeRequests++;
            }

            if($request->work_status_id == 4)
            {
                $closedRequests++;
            }

            $request->viewed = $this->user_viewed_request($request->viewed_by);

        }

        $returnObject = [
            'approvedRequests' => $approvedRequests,
            'declinedRequests' => $declinedRequests,
            'pendingRequests' => $pendingRequests,
            'closedRequests' => $closedRequests,
            'inProgressRequests' => $inProgress,
            'completeRequests' => $completeRequests,
            'allRequests' => $allRequests,
        ];

        return $returnObject;
    }
}
