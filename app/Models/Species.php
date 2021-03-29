<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    use HasFactory;

    protected $table = 'people';
    protected $primaryKey = 'id';

    protected $fillable = [
            'name',
            'classification',
            'designation',
            'average_height',
            'skin_colors',
            'hair_colors',
            'eye_colors',
            'average_lifespan',
            'language',
        ];

    /**
     * Create a new People
     *
     * @param array $request
     * @return array
     */
    public function newPeople(array $request): array
    {
        $response = new \stdClass();
        $response->success = ['status' => 200, 'message' => 'Specie created with success'];
        $response->error = ['status' => 400, 'message' => 'Error to create a new Specie'];

        $insert = People::create([
            'name' => $request['name'],
            'classification' => $request['classification'],
            'designation' => $request['designation'],
            'average_height' => $request['average_height'],
            'skin_colors' => $request['skin_colors'],
            'hair_colors' => $request['hair_colors'],
            'eye_colors' => $request['eye_colors'],
            'average_lifespan' => $request['average_lifespan'],
            'language' => $request['language'],
        ]);

        return $insert ? $response->success : $response->error;
    }

}
