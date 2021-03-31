<?php

namespace App\Http\Controllers;

use App\Models\Starship;
use App\Module\SWAPI\Module;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;



class StarshipController extends Controller
{

    public function getStarship($starship = null): JsonResponse
    {
        if(!$starship) return response()->json(Starship::all(),200);

        return response()->json(Starship::getStarship($starship),200);
    }

}
