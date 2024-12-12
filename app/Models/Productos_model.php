<?php

namespace App\Models;

use CodeIgniter\Model;

class Productos_model extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'idproductos';
    protected $allowedFields = ['nombre', 'precio', 'stock', 'imagen'];
}
