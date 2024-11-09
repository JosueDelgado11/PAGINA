<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Formulario de Registro</h1>

<?php if (session()->getFlashdata('message')): ?>
    <div style="color: green;">
        <?= session()->getFlashdata('message') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('errors')): ?>
    <div style="color: red;">
        <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <p><?= esc($error) ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form action="/authController/registrar" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?= old('nombre') ?>" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?= old('email') ?>" required><br>

    <label for="contrasena">Contraseña:</label>
    <input type="password" id="contrasena" name="contrasena" required><br>

    <button type="submit">Registrar</button>
</form>

<p>¿Ya tienes cuenta? <a href="/login">Inicia sesión aquí</a></p>

</body>
</html>
