<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Respuestas_model;

class Respuestas extends BaseController
{
    public function index(){
        return view('/principal');
    }
    //Registro de usuarios
    public function registrar()
    {
        
        if ($this->request->getMethod() !== 'post') {
            return $this->response->setJSON(['message' => 'Método no permitido'])->setStatusCode(405);
        }
        // Capturar los datos del formulario
        $data = [
            'nombre'          => $this->request->getPost('nombre'),
            'apellidos'       => $this->request->getPost('apellidos'),
            'email'=>$this->request->get('email'),
            'telefono'        => $this->request->getPost('telefono')
        ];
        $surveyModel = new SurveyModel();
        $data = [
            'nombre'    => $nombre,
            'apellidos' => $apellidos,
            'email'     => $email,
            'telefono'  => $telefono
        ];

        // Insertar los datos en la base de datos
        if ($surveyModel->insert($data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Encuesta registrada correctamente']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Hubo un error al registrar la encuesta']);
        }
        
    }
}
    


