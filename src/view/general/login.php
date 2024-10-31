<?php
    include "../../controllator/util/Session.php";
    include "../../controllator/util/Connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="../../assets/styles/styles.css">
</head>
<body>

<?php 
include "./header.php";
if (isset($_GET['e']) && $_GET['e'] == '401') {
    echo '<div class="error">Credenciales invalidas</div>';
}
?>

<h1>Ingresar</h1>
<div class="centrado">
    <img src="../../assets/img/nube.png" alt="wallpaper" id="wallpaper-nube"> 
</div>
<form action="../../controllator/services/general/loginService.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <br><br>

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required>
    <br>

    <input type="submit" value="Ingresar">
</form>
<div class="espaciado">

</div>

<?php include "./footer.php"?>
</body>
</html>  