<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class AuthController extends BaseController
{
    // Mostrar el formulario de registro
    public function registro()
    {
        return view('registro');
    }

    // Manejar el registro del usuario
    public function registrar()
    {
        // Validar los datos del formulario
        if (!$this->validate([
            'nombre'    => 'required|min_length[3]|max_length[255]',
            'email'     => 'required|valid_email|is_unique[usuarios.email]',
            'contrasena'=> 'required|min_length[6]'
        ])) {
            // Si la validación falla, volver al formulario con los errores
            return redirect()->to('/registro')->withInput()->with('errors', $this->validator->getErrors());
        }

        // Insertar los datos en la base de datos
        $model = new UsuarioModel();
        $data = [
            'nombre'    => $this->request->getPost('nombre'),
            'email'     => $this->request->getPost('email'),
            'contrasena'=> password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];
        $model->insert($data);

        // Redirigir a la página de login
        return redirect()->to('/login')->with('message', 'Registro exitoso');
    }
}
