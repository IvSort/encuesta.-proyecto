
<?php

namespace App\Models;

use CodeIgniter\Model;

class SurveyModel extends Model
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
