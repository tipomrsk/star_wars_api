<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planets extends Model
{
    use HasFactory;

    protected $table = 'planet';
    protected $primaryKey = 'planet_id';
    public $timestamps = false;


    protected $fillable = [
            'planet_name',
            'planet_rotation_period',
            'plaent_orbital_period',
            'planet_diameter',
            'planet_climate',
            'planet_gravity',
            'planet_terrain',
            'planet_surface_water',
            'planet_population',
            'planet_created_date',
        ];


    public static function getAPlanet(int $planetID)
    {
        $data = Planets::where('planet_id', $planetID)->get();

        return count($data->toArray()) > 0 ? $data : 'Nenhum planeta com essa identificação foi encontrado';
    }

    /**
     * Cria um novo planeta
     *
     * @param array $request
     * @return array
     */
    public function newPlanet(array $request): array
    {

        $response = new \stdClass();
        $response->success = ['status' => 200, 'message' => 'Planeta Inserido com Sucesso'];
        $response->error = ['status' => 400, 'message' => 'Erro ao Inserir Planeta'];

        $insert = Planets::create([
            'planet_name' => $request['name'],
            'planet_rotation_period' => $request['rotation_period'],
            'plaent_orbital_period' => $request['orbital_period'],
            'planet_diameter' => $request['diameter'],
            'planet_climate' => $request['climate'],
            'planet_gravity' => $request['gravity'],
            'planet_terrain' => $request['terrain'],
            'planet_surface_water' => $request['surface_water'],
            'planet_population' => $request['population'],
            'planet_created_date' => date('Y-m-d H:i:s'),
        ]);

        return $insert ? $response->success : $response->error;
    }

    /**
     * Atualização dos dados do planeta
     *
     * @param array $request
     * @return array
     */
    public function updatePlanet(array $request): array
    {
        $response = new \stdClass();
        $response->success = ['status' => 200, 'message' => 'Planeta Atualizado com Sucesso'];
        $response->error = ['status' => 400, 'message' => 'Erro ao Atualizar Planeta'];

        $update = false;

        foreach($request as $field => $value) {
            if (!$value) continue;

            $updating = Planets::where('planet_id', $request['id'])
                        ->update(["planet_{$field}" => $value]);

            if($updating) $update = true;
        }
        return $update ? $response->success : $response->error;
    }
}
