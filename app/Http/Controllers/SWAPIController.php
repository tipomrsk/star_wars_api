<?php

namespace App\Http\Controllers;

use App\Module\SWAPI\Module;
use Illuminate\Http\JsonResponse;

class SWAPIController extends Controller
{

    public function getAllData(): JsonResponse
    {
        $response = Module::getAllDataFromSWAPI();

        return response()->json($response['message'], $response['status']);

    }

}
