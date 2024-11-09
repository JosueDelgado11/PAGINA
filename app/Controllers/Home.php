<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        // Cargar el modelo de productos
        $productoModel = new ProductoModel();

        // Obtener todos los productos de la base de datos
        $productos = $productoModel->findAll();

        // Pasar los productos a la vista
        return view('home', ['productos' => $productos]);
    }
}
