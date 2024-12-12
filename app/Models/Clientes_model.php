<?php

namespace App\Models;

use CodeIgniter\Model;

class Clientes_model extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'idcliente';
    protected $allowedFields = ['nombre','ruc', 'direccion'];
}
