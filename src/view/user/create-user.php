<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear usuario</title>
    <link rel="stylesheet" href="../../assets/styles/styles.css">
</head>
<body>

<?php include "./admi-header.php"?>

<h1>Crear empleado</h1>

<?php
if (isset($_GET['e'])) {
    switch ($_GET['e']) {
        case 200:
            echo '<div class="success">Se creo correctamente el empleado</div>';
            break;
        default:
            echo '<div class="error">Ocurrio un error al crear un usuario</div>';
            break;
    }
}
?>

<div class="centrado">
    <img src="../../assets/img/nube.png" alt="wallpaper" id="wallpaper-nube"> 
</div>
<form action="../../controllator/services/general/createUser.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <br><br>

    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name" required>
    <br><br>

    <label for="lastname">Apellido:</label>
    <input type="text" id="lastname" name="lastname" required>
    <br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br><br>

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required>
    <br>

    <input type="submit" value="Crear Usuario">
</form>
<div class="espaciado">

</div>

<?php include "../general/footer.php"?>
</body>
</html>  