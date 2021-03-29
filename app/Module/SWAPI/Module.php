<?php


namespace App\Module\SWAPI;


use App\Module\SWAPI\Requests\Planets;

class Module
{

    /**
     * Call the method to get all planets data from SWAPI and send to create method on model
     *
     * @return array
     */
    public static function migratingSWAPIPlanetsData(): array
    {
        $getPlanets = Planets::getPlanetsDataCURL();

        if(!is_array($getPlanets)) return ['status' => 400, 'message' => 'Error to get planets in SWAPI.'];

        foreach($getPlanets as $planet)
            $insertPlanets = (new \App\Models\Planets())->newPlanet($planet);

        return $insertPlanets;
    }
}
