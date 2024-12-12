<?php

namespace App\Controllers;

use App\Models\Historial_model;
use App\Models\Productos_model;
use CodeIgniter\Controller;

class Topventas extends Controller
{
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('historial');
        $builder->select('productos.nombre as producto_nombre, SUM(historial.cantidad) as cantidad_vendida');
        $builder->join('productos', 'productos.idproductos = historial.idproductos');
        $builder->groupBy('historial.idproductos');
        $builder->orderBy('cantidad_vendida', 'DESC');
        $query = $builder->get();
        $data['topventas'] = $query->getResultArray();
        
        echo view('plantillas/header');
        echo view('paginas/topventas', $data);
        echo view('plantillas/footer');
    }
}
