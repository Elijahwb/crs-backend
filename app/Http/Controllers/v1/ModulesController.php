<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Request as ModelsRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ModulesController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:api");
    }

    public function index()
    {
        request()->validate(['projectId' => 'required']);

        $allProjectModules = Module::where('project_id', request()->projectId)->orderBy('name', 'asc')->get();

        $finalModules = [];

        foreach($allProjectModules as $module)
        {
            $developers_arr = explode(',', $module->developers);

            $developers_arr = array_filter($developers_arr);

            $developers = [];

            foreach($developers_arr as $developer)
            {
                array_push($developers, User::find(intval($developer)));
            }

            $module->moduleDevelopers = $developers;

            $requests = count(ModelsRequest::where('module_id', $module->id)->get());

            $module->requests = $requests;

            array_push($finalModules, $module);
        }

        return $this->resSuc($finalModules);
    }
}
