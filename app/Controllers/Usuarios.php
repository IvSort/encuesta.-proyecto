<?php

namespace App\Controllers;

use App\Models\Usuarios_model;
use CodeIgniter\Controller;

class Usuarios extends Controller
{
    public function index()
    {
        $model = new Usuarios_model();
        $data['usuarios'] = $model->findAll();

        echo view('plantillas/header');
        echo view('paginas/usuarios', $data);
        echo view('plantillas/footer');
    }

    public function store()
    {
        $model = new Usuarios_model();

        $data = [
            'usuario' => $this->request->getPost('usuario'),
            'contraseña' => password_hash($this->request->getPost('contraseña'), PASSWORD_DEFAULT),
            'email' => $this->request->getPost('email'),
        ];

        $model->save($data);

        return redirect()->to(base_url('/usuarios'))->with('message', 'Usuario creado correctamente');
    }

    public function update()
    {
        $model = new Usuarios_model();
        $id = $this->request->getPost('id');

        $data = [
            'usuario' => $this->request->getPost('usuario'),
            'email' => $this->request->getPost('email'),
        ];

        // Verifica si se envió una nueva contraseña
        $contraseña = $this->request->getPost('contraseña');
        if (!empty($contraseña)) {
            $data['contraseña'] = password_hash($contraseña, PASSWORD_DEFAULT);
        }

        $model->update($id, $data);

        return redirect()->to(base_url('/usuarios'))->with('message', 'Usuario actualizado correctamente');
    }

    public function delete($id)
    {
        $model = new Usuarios_model();
        $model->delete($id);

        return redirect()->to(base_url('/usuarios'))->with('message', 'Usuario eliminado correctamente');
    }
}
