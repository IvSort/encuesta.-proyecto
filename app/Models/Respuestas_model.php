<?php
namespace App\Models;

use CodeIgniter\Model;

class Respuestas_model extends Model
{
    protected $table = 'survey_responses'; 
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nombre',
        'apellidos',
        'email',
        'telefono'
    ];
}

/*<?php
namespace App\Models;
use CodeIgniter\Model;
class Respuestas_model extends Model
{
    protected $table = 'respuestas';
    protected $primaryKey = 'id_respuestas';
    protected $allowedFields = ['nombre,apellidos,telefono,num_respuesta,num_respuestasdos,imagen,courseRating,respuesta'];
}*/
