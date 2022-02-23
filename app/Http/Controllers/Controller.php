<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function resSuc($payload)
    {
        return response()->json([
            'status' => 'success',
            'payload' => $payload,
        ]);
    }

    public function resFail($payload)
    {
        return response()->json([
            'status' => 'failed',
            'payload' => $payload,
        ]);
    }
}
