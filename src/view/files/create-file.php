<?php
    require '../../vendor/autoload.php';
    include "../../controllator/util/Connection.php";
    include "../../controllator/util/Session.php";
    include "../../model/instances/User.php";
    include "../../model/instances/File.php";
    include "../../controllator/db/FilesDB.php"
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Archivo</title>
    <link rel="stylesheet" href="../../assets/styles/styles.css">
</head>
<body>

<?php
$session = new Session();
$user = $session->get_session_data();
if($user->getRol() == User::ADMIN_ROL){
    include "../user/admi-header.php";
} else if($user->getRol() == User::EMPLEADO_ROL){
    include "../user/user-header.php";
} else {
    header("Location: ../general/login.php?e=401");
    exit;
}
?>

<h1>Crear documento</h1>

<div class="centrado">
    <img src="../../assets/img/nube.png" alt="wallpaper" id="wallpaper-nube"> 
</div>
<form action="../../controllator/services/files/createFile.php" method="post">

    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name" required>
    <br><br>

    <label for="extension">Extension:</label>
    <input type="text" id="extension" name="extension" required>
    <br><br>

    <label for="content"></label>
    <textarea name="content" id="content"></textarea>

    <input type="submit" value="Crear">
</form>
<div class="espaciado">

</div>

<?php include "../general/footer.php"?>
</body>
</html>  