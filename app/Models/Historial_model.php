<?php

namespace App\Models;

use CodeIgniter\Model;

class Historial_model extends Model
{
    protected $table = 'historial';
    protected $primaryKey = 'idhistorial';
    protected $allowedFields = ['idcliente', 'idproductos', 'precio', 'cantidad', 'importe'];
    protected $useTimestamps = false;
}
