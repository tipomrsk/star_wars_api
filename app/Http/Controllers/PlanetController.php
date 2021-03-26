<?php

namespace App\Http\Controllers;

use App\Models\Planets;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class PlanetController extends Controller
{
    /**
     * Listagem de planetas
     *
     * @param int|null $planetID opcional, se for passado retorna apenas os dados daquele planeta
     * @return JsonResponse
     */
    public function getPlanet(int $planetID = null): JsonResponse
    {
        if(!$planetID) return response()->json(Planets::all(), 200) ;

        $response = Planets::getAPlanet($planetID);

        return response()->json($response, 200);
    }

    /**
     * Cria novo planeta
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function newPlanet(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),[
           'name'=> 'required|string',
           'rotation_period'=> 'required|int',
           'orbital_period'=> 'required|int',
           'diameter'=> 'required|int',
           'climate'=> 'required|string',
           'gravity'=> 'required|string',
           'terrain'=> 'required|string',
           'surface_water'=> 'required|string',
           'population'=> 'required|int',
        ]);

        if($validator->fails()) return response()->json($validator->errors()->first(), 400);

        $response = (new Planets())->newPlanet($request->toArray());

        return response()->json($response['message'], $response['status']);

    }

    /**
     * Atualização dos planetas
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function updatePlanet(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'name'=> 'string|nullable',
            'rotation_period'=> 'int|nullable',
            'orbital_period'=> 'int|nullable',
            'diameter'=> 'int|nullable',
            'climate'=> 'string|nullable',
            'gravity'=> 'string|nullable',
            'terrain'=> 'string|nullable',
            'surface_water'=> 'string|nullable',
            'population'=> 'int|nullable',
            'id' => 'int',
        ]);

        if($validator->fails()) return response()->json($validator->errors()->first(), 400);

        $response = (new Planets())->updatePlanet($request->toArray());

        return response()->json($response['message'], $response['status']);

    }
}
