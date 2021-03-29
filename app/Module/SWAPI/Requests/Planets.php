<?php


namespace App\Module\SWAPI\Requests;


class Planets
{

    /**
     * Get planets from swapi.net
     *
     * @return mixed
     */
    public static function getPlanetsDataCURL()
    {
        /** @var  $keepGetting Flat to keep getting data*/
        $keepGetting = true;

        /** @var  $planetsReturn Array to return */
        $planetsReturn = [];

        /** @var  $page Page number to get data*/
        $page = 1;

        /**
         * Keep getting data until 'next' element return false
         */
        while($keepGetting == true) {
            $getPlanets = curl_init();

            curl_setopt_array($getPlanets, [
                CURLOPT_URL => "https://swapi.dev/api/planets/?page={$page}",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ]);

            $planets = curl_exec($getPlanets);
            $planets = json_decode($planets, true);

            curl_close($getPlanets);

            /** if 'next' element is empty alter the $keetGetting value for stop the while and return */
            if(!$planets['next']) $keepGetting = false;

            /** Update the $page value to alter the page */
            $page++;

            /** @var  $eachPlanet Get only the planets result to add on return array*/
            foreach($planets['results'] as $eachPlanet) array_push($planetsReturn, $eachPlanet);

        }

        return $planetsReturn;
    }
}
