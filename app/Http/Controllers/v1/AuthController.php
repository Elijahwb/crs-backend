<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:api", ["except" => ["login"]]);
    }


    public function login()
    {
        try
        {
            $credentials = request(["email", "password"]);

            $token = Auth::attempt($credentials);

            if(!$token)
            {
                return $this->failRes("Unauthorized");
            }

            return $this->resSuc([
                "token_type" => "bearer",
                "token" => $token,
                "user" =>User::where('id', Auth::user()->id)->first(),
            ]);
        }
        catch(Exception $e)
        {
            return $this->resFail($e);
        }
    }


    public function show()
    {
        return $this->resSuc(Auth::user());
    }


    public function refresh()
    {
        $token = Auth::refresh();

        return $this->resSuc([
            "token_type" => "bearer",
            "token" => $token,
            "user" => Auth::user(),
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return $this->resSuc("Logged out successfully");
    }
}
