<?php

namespace App\Models;

use CodeIgniter\Model;

class Ventas_model extends Model
{
    protected $table = 'ventas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'ruc', 'fecha', 'direccion','total'];
    protected $useTimestamps = false;
}
