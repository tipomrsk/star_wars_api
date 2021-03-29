<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planets extends Model
{
    use HasFactory;

    protected $table = 'planet';
    protected $primaryKey = 'id';

    protected $fillable = [
            'name',
            'rotation_period',
            'orbital_period',
            'diameter',
            'climate',
            'gravity',
            'terrain',
            'surface_water',
            'population',
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
            'name' => $request['name'],
            'rotation_period' => $request['rotation_period'],
            'orbital_period' => $request['orbital_period'],
            'diameter' => $request['diameter'],
            'climate' => $request['climate'],
            'gravity' => $request['gravity'],
            'terrain' => $request['terrain'],
            'surface_water' => $request['surface_water'],
            'population' => $request['population'],
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
