<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:api");
    }

    
    public function index()
    {
        return $this->resSuc(User::all());
    }
}
