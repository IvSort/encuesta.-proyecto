<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuarios_model extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuarios';
    protected $allowedFields = ['usuario', 'contraseña', 'email'];
    // Si no quieres usar timestamps, asegúrate de comentar o eliminar la siguiente línea
    // protected $useTimestamps = true;
}