<?php namespace App\Models;

use CodeIgniter\Model;

class EjemploModel extends Model
{
    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    /**
     * Obtener datos combinados de las tablas `productos` y `cliente`.
     *
     * @return array
     */
    public function getProductosConClientes()
    {
        $query = $this->db->query("
            SELECT 
                productos.nombre AS producto, 
                productos.precio, 
                cliente.nombre AS cliente
            FROM productos
            JOIN cliente ON productos.idproductos = cliente.idcliente
        ");

        return $query->getResultArray();
    }
}
