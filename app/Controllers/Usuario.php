<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class Usuario extends Controller
{
    // Mostrar el formulario de registro
    public function registro()
    {
        // Si se recibe un formulario con método POST, procesamos los datos
        if ($this->request->getMethod() === 'post') {
            // Validar los datos recibidos (puedes agregar más validaciones según tus necesidades)
            $validation = \Config\Services::validation();
            $validation->setRules([
                'email' => 'required|valid_email|is_unique[usuarios.email]',
                'contraseña' => 'required|min_length[8]',
            ]);

            // Si la validación falla, devolvemos un mensaje de error
            if (!$validation->withRequest($this->request)->run()) {
                return view('registro', [
                    'validation' => $validation
                ]);
            }

            // Si la validación es exitosa, guardamos el nuevo usuario
            $usuarioModel = new UsuarioModel();
            $data = [
                'email' => $this->request->getPost('email'),
                'contraseña' => password_hash($this->request->getPost('contraseña'), PASSWORD_DEFAULT)
            ];

            // Guardar el usuario en la base de datos
            $usuarioModel->save($data);

            // Redirigir al login después de un registro exitoso
            return redirect()->to('/usuario/login')->with('success', 'Registro exitoso, por favor inicie sesión');
        }

        // Si no se recibe un formulario POST, simplemente mostramos el formulario de registro
        return view('registro');
    }

    // Mostrar el formulario de login
    public function login()
    {
        if ($this->request->getMethod() === 'post') {
            // Obtener los datos del login
            $usuarioModel = new UsuarioModel();
            $email = $this->request->getPost('email');
            $contraseña = $this->request->getPost('contraseña');

            // Buscar el usuario en la base de datos por email
            $usuario = $usuarioModel->where('email', $email)->first();

            // Verificar si existe el usuario y si la contraseña es correcta
            if ($usuario && password_verify($contraseña, $usuario['contraseña'])) {
                // Si la contraseña es correcta, iniciamos sesión
                session()->set('usuario_id', $usuario['id']);
                return redirect()->to('/home');
            } else {
                // Si las credenciales son incorrectas, mostramos un mensaje de error
                return redirect()->to('/usuario/login')->with('error', 'Credenciales inválidas');
            }
        }

        // Si no se recibe un formulario POST, mostramos el formulario de login
        return view('login');
    }

    // Función para cerrar sesión
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/usuario/login');
    }
}
