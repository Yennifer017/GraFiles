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
    <title>Registrarse</title>
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
    try {
        $session = new Session();
        $user = $session->get_session_data();
        $db = Connection::getInstance()->getDB();
        $filesDB = new FilesDB();
        $files = $filesDB->getAllFiles($db, $user->getUsername());
    } catch (Exception $th) {
        header("Location: ../general/login.php?e=401");
        exit;
    }

?>

<h1>Archivos</h1>
<div class="centrado">
    <a class="simple-button" href="./create-file.php">Nuevo Archivo</a>
    <a class="simple-button" href="#">Subir Archivo</a>
</div>

<?php
if (isset($_GET['e'])) {
    switch ($_GET['e']) {
        case 200:
            echo '<div class="success">Se creo un archivo correctamente</div>';
            break;
        default:
            echo '<div class="error">Ocurrio un error al crear el archivo, intentalo de nuevo</div>';
            break;
    }
}
?>

<div>
<?php foreach ($files as $file): ?>
    <div class='file'>
        <p>Nombre: <?= htmlspecialchars($file->getName()); ?></p>
        <p>Tipo: <?= htmlspecialchars($file->getType()); ?></p>
        <button>Editar</button>
    </div>
<?php endforeach; ?>    
</div>

<div class="espaciado">
</div>

<?php include "../general/footer.php"?>
</body>
</html>  