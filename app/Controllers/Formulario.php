<?php
namespace App\Controllers;

use App\Models\Clientes_model;
use CodeIgniter\Controller;

class Formulario extends Controller
{
    public function index(){
        echo view('index');
    }
    public function sql(){
        echo view('sqlserver');
    }
    public function microsoft(){
        echo view('microsoft');
    }
    public function movil(){
        echo view('movil');
    }
}

