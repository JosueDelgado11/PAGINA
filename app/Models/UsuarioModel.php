<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'email', 'password'];

    // Habilitamos la protección para evitar que el campo 'id' se pueda modificar directamente
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useTimestamps = false; // Si necesitas almacenar la fecha de creación, habilítalo.
}
