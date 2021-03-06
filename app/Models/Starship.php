<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Starship extends Model
{
    use HasFactory;

    protected $table = 'starship';
    protected $primaryKey = 'id';

    protected $fillable = [
            'name',
            'model',
            'manufacturer',
            'cost_in_credits',
            'length',
            'max_atmosphering_speed',
            'crew',
            'passengers',
            'cargo_capacity',
            'consumables',
            'hyperdrive_rating',
            'MGLT',
            'starship_class',
        ];


    /**
     * List starships for ID or for name searching with like
     *
     * @param $starship
     * @return string
     */
    public static function getStarship($starship)
    {
        if(is_numeric($starship)) $data = Starship::where('id', $starship)->get();
        else $data = Starship::where('name', 'like',"%{$starship}%")->get();

        return (count($data->toArray()) > 0) ? $data : "No one planet founded with: {$starship}";
    }


    /**
     * Create a new Starship
     *
     * @param array $request
     * @return array
     */
    public function newStarship(array $request): array
    {
        $response = new \stdClass();
        $response->success = ['status' => 200, 'message' => 'Starship created with success'];
        $response->error = ['status' => 400, 'message' => 'Error to create a new Starship'];

        $insert = Starship::create([
            'name' => $request['name'],
            'model' => $request['model'],
            'manufacturer' => $request['manufacturer'],
            'cost_in_credits' => $request['cost_in_credits'],
            'length' => $request['length'],
            'max_atmosphering_speed' => $request['max_atmosphering_speed'],
            'crew' => $request['crew'],
            'passengers' => $request['passengers'],
            'cargo_capacity' => $request['cargo_capacity'],
            'consumables' => $request['consumables'],
            'hyperdrive_rating' => $request['hyperdrive_rating'],
            'MGLT' => $request['MGLT'],
            'starship_class' => $request['starship_class'],
        ]);

        return $insert ? $response->success : $response->error;
    }

    /**
     * Update starship's data
     *
     * @param array $request
     * @return array
     */
    public function updateStarship(array $request): array
    {
        $response = new \stdClass();
        $response->success = ['status' => 200, 'message' => 'Starship updated successfully'];
        $response->error = ['status' => 400, 'message' => 'Fail to update Starship'];

        $update = false;

        foreach($request as $field => $value) {
            if (!$value) continue;

            $updating = Starship::where('id', $request['id'])
                ->update(["{$field}" => $value]);

            if($updating) $update = true;
        }

        return $update ? $response->success : $response->error;
    }

}
