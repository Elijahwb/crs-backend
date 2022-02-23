<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:api");
    }

    public function index()
    {
        $projects = Auth::user()->projects;

        $projects_arr = explode(',', $projects);

        $projects_arr = array_filter($projects_arr);

        $final_projects = [];

        foreach($projects_arr as $project_id)
        {
            array_push($final_projects, Project::find(intval($project_id)));
        }

        return $this->resSuc($final_projects);
    }

}
