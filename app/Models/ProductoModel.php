<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table = 'productos'; // Nombre de la tabla
    protected $primaryKey = 'id'; // La clave primaria
    protected $allowedFields = ['nombre', 'precio', 'descripcion', 'stock', 'codigo']; // Campos de la tabla

    // Si es necesario, puedes configurar timestamps o relaciones con otras tablas
    protected $useTimestamps = false; // Si usas timestamps en la tabla, habilítalo
}
