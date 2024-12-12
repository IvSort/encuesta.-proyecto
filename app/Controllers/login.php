<?php

namespace App\Controllers;

use App\Models\Usuarios_model;
use CodeIgniter\Controller;

class login extends Controller
{
    public function index()
    {
        echo view('login');
    }                                                                                                               

    public function auth()
    {
        $session = session();
        $model = new Usuarios_model();

        $usuario = $this->request->getVar('usuario');
        $contraseña = $this->request->getVar('contraseña');

        $data = $model->where('usuario', $usuario)->first();

        if ($data) {
            $stored_password = $data['contraseña'];

            if ($contraseña === $stored_password) {
                $ses_data = [
                    'id' => $data['id_usuarios'],
                    'usuario' => $data['usuario'],
                    'email' => $data['email'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/principal');
            } else {
                $session->setFlashdata('msg', 'Contraseña incorrecta.');
                session()->setFlashdata('msg_type', 'danger');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Usuario no encontrado.');
            session()->setFlashdata('msg_type', 'danger');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
