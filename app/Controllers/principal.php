<?php

namespace App\Controllers;

use App\Models\Historial_model;
use App\Models\Clientes_model;
use App\Models\Ventas_model;
use CodeIgniter\Controller;

class Principal extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        // Obtener los datos de top clientes
        $builder = $db->table('historial');
        $builder->select('cliente.nombre as cliente_nombre, COUNT(historial.idcliente) as cantidad');
        $builder->join('cliente', 'cliente.idcliente = historial.idcliente');
        $builder->groupBy('historial.idcliente');
        $builder->orderBy('cantidad', 'DESC');
        $query = $builder->get();
        $data['topclientes'] = $query->getResultArray();

        // Obtener los datos de top ventas
        $builder = $db->table('historial');
        $builder->select('productos.nombre as producto_nombre, SUM(historial.cantidad) as cantidad_vendida');
        $builder->join('productos', 'productos.idproductos = historial.idproductos');
        $builder->groupBy('historial.idproductos');
        $builder->orderBy('cantidad_vendida', 'DESC');
        $query = $builder->get();
        $data['topventas'] = $query->getResultArray();

        // Obtener los datos de ventas por fecha
        $builder = $db->table('ventas');
        $builder->select('fecha, SUM(total) as total');
        $builder->groupBy('fecha');
        $builder->orderBy('fecha', 'ASC');
        $query = $builder->get();
        $data['ventasporfecha'] = $query->getResultArray();

        echo view('plantillas/header');
        echo view('paginas/principal', $data);
        echo view('plantillas/footer');
    }
}
