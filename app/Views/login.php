<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Ecommerce</title>
</head>
<body>
    <h1>Iniciar sesión</h1>
    
    <form method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        
        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" required>
        
        <button type="submit">Iniciar sesión</button>
    </form>

    <?php if (session()->getFlashdata('error')): ?>
        <p><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>
</body>
</html>
