<?php

namespace App\Controllers;

use App\Models\Clientes_model;
use CodeIgniter\Controller;

class Clientes extends Controller
{
    public function index()
    {
        $model = new Clientes_model();
        $data['clientes'] = $model->findAll();

        echo view('plantillas/header');
        echo view('paginas/clientes', $data);
        echo view('plantillas/footer');
    }

    public function store()
    {
        $model = new Clientes_model();

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'ruc' => $this->request->getPost('ruc'),
            'direccion' => $this->request->getPost('direccion'),
        ];

        $model->save($data);

        return redirect()->to(base_url('/clientes'));
    }
    public function update()
    {
        $model = new Clientes_model();
        $id = $this->request->getPost('idcliente');

        $data = (object)[
            'nombre' => $this->request->getPost('nombre'),
            'ruc' => $this->request->getPost('ruc'),
            'direccion' => $this->request->getPost('direccion'),
        ];

        $model->update($id, $data);

        return redirect()->to(base_url('/clientes'));
    }

    public function delete($id)
    {
        $model = new Clientes_model();
        $model->delete($id);

        return redirect()->to(base_url('/clientes'));
    }
}
