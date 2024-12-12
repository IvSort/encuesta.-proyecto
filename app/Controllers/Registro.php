<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Usuarios_model;

class Registro extends Controller
{
    public function index(){
        return view('/login');
    }
    public function crear()
    {
        return view('/registro');
    }
    //Registro de usuarios
    public function registrar()
    {
        $model = new Usuarios_model();

        // Obtener datos del formulario
        $data = [
            'usuario' => $this->request->getPost('usuario'),
            'contraseña' => $this->request->getPost('contraseña'),
            'email' => $this->request->getPost('email')
        ];

        // Guardar datos en la base de datos
        if ($model->insert($data)) {
            // Redireccionar o mostrar un mensaje de éxito
            return redirect()->to('/login')->with('msg', 'Registro exitoso');
        } else {
            // Manejar el error
            return redirect()->to('/login')->with('msg', 'Error en el registro');
        }
    }
}