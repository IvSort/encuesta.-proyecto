<?php

namespace App\Models;

use CodeIgniter\Model;

class Universidades_model extends Model
{
    protected $table = 'universidades';
    protected $primaryKey = 'iduniversidades';
    protected $allowedFields = ['nombres'];
    protected $useTimestamps = false;
}
