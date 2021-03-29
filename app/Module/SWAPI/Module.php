<?php


namespace App\Module\SWAPI;


use App\Module\SWAPI\Requests\Planets;

class Module
{
    public static function migratingSWAPIPlanetsData()
    {
        $getPlanets = Planets::getPlanetsDataCURL();

        if(!is_array($getPlanets)) return ['status' => 400, 'message' => 'Error to get planets in SWAPI.'];

        foreach($getPlanets as $planet)
            $insertPlanets = (new \App\Models\Planets())->newPlanet($planet);

        return $insertPlanets;
    }
}
