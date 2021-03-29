<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $table = 'people';
    protected $primaryKey = 'id';

    protected $fillable = [
            'name',
            'height',
            'mass',
            'hair_color',
            'skin_color',
            'eye_color',
            'birth_year',
            'gender',
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
        $response->success = ['status' => 200, 'message' => 'People created with success'];
        $response->error = ['status' => 400, 'message' => 'Error to create a new people'];

        $insert = People::create([
            'name' => $request['name'],
            'height' => $request['height'],
            'mass' => $request['mass'],
            'hair_color' => $request['hair_color'],
            'skin_color' => $request['skin_color'],
            'eye_color' => $request['eye_color'],
            'birth_year' => $request['birth_year'],
            'gender' => $request['gender'],
        ]);

        return $insert ? $response->success : $response->error;
    }

}
