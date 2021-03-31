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

    /**
     * Update Controller
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function updateStarship(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=> 'string|nullable',
            'model'=> 'string|nullable',
            'manufacturer'=> 'string|nullable',
            'cost_in_credits'=> 'string|nullable',
            'length'=> 'string|nullable',
            'max_atmosphering_speed'=> 'string|nullable',
            'crew'=> 'string|nullable',
            'passengers'=> 'string|nullable',
            'cargo_capacity'=> 'string|nullable',
            'consumables'=> 'string|nullable',
            'hyperdrive_rating'=> 'string|nullable',
            'MGLT'=> 'string|nullable',
            'starship_class'=> 'string|nullable',
            'id' => 'int',
        ]);

        if($validator->fails()) return response()->json($validator->errors()->first(), 400);

        $response = (new Starship())->updateStarship($request->toArray());

        return response()->json($response['message'], $response['status']);

    }

}
