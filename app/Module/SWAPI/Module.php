<?php


namespace App\Module\SWAPI;


class Module
{

    /**
     * Get all data from swapi.net
     *
     * @return mixed
     */
    public static function getAllDataFromSWAPI()
    {
        $response = new \stdClass();
        $response->success = ['status' => 200, 'message' => 'All entities was created successfully'];
        $response->error = ['status' => 400, 'message' => 'Erro to create a entity'];

        /** @var  $keepGetting Flag to keep getting data*/
        $keepGetting = true;

        /** @var  $dataReturn Array to return */
        $dataReturn = [];

        /** @var  $page Page number to get data*/
        $page = 1;

        $entities = ['planets', 'starships', 'vehicles', 'people', 'species'];

        /**
         * Run all $entities array to get request all resources from swapi.net
         */
        foreach($entities as $entity) {
            /**
             * Reset this values to run again the while
             */
            $keepGetting = true;
            $page = 1;
            /**
             * Keep getting data until 'next' element return false
             */
            while ($keepGetting == true) {

                $getData = curl_init();

                curl_setopt_array($getData, [
                    CURLOPT_URL => "https://swapi.dev/api/$entity/?page={$page}",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                ]);

                $curlData = curl_exec($getData);
                $curlData = json_decode($curlData, true);

                curl_close($getData);

                /** if 'next' element is empty alter the $keetGetting value for stop the while and return */
                if (!$curlData['next']) $keepGetting = false;

                /** Update the $page value to alter the page */
                $page++;

                /** @var  $eachPlanet Get only the planets result to add on return array */
                foreach ($curlData['results'] as $eachElement) array_push($dataReturn, $eachElement);
            }

            /**
             * Each entity call their classes
             */
            if($entity == 'planets'){
                foreach($dataReturn as $planet)
                    $data = (new \App\Models\Planets())->newPlanet($planet);
            }

            if($entity == 'starships'){
                foreach($dataReturn as $starship)
                    $data = (new \App\Models\Starship())->newStarship($starship);
            }

            if($entity == 'vehicles'){
                foreach($dataReturn as $vehicle)
                    $data = (new \App\Models\Vehicle())->newVehicle($vehicle);
            }

            if($entity == 'people'){
                foreach($dataReturn as $person)
                    $data = (new \App\Models\People())->newPeople($person);
            }

            if($entity == 'species'){
                foreach($dataReturn as $specie)
                    $data = (new \App\Models\Species())->newSpecie($specie);
            }

            if($data['status'] == 400) return $response->error;

            $dataReturn = [];

        }

        return $response->success;
    }
}
