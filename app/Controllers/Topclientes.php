<?php

namespace App\Controllers;

use App\Models\Historial_model;
use App\Models\Clientes_model;
use CodeIgniter\Controller;

class Topclientes extends Controller
{
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('historial');
        $builder->select('cliente.nombre as cliente_nombre, COUNT(historial.idcliente) as cantidad');
        $builder->join('cliente', 'cliente.idcliente = historial.idcliente');
        $builder->groupBy('historial.idcliente');
        $builder->orderBy('cantidad', 'DESC');
        $query = $builder->get();
        $data['topclientes'] = $query->getResultArray();
        echo view('plantillas/header');
        echo view('paginas/topclientes', $data);
        echo view('plantillas/footer');
        
    }
}
