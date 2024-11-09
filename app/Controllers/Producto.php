<?php

namespace App\Controllers;

use App\Models\ProductoModel;

class Producto extends BaseController
{
    public function detalle($id)
    {
        // Obtener los detalles de un producto por su ID
        $productoModel = new ProductoModel();
        $data['producto'] = $productoModel->find($id);

        return view('producto_detalle', $data);
    }
}
