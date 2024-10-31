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
    <link rel="stylesheet" href="../../assets/styles/files-styles.css">
</head>
<body>

<?php
    include "./header.php";
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
        case 401:
            echo '<div class="success">No se encontro un archivo :c</div>';
            break;
        default:
            echo '<div class="error">Ocurrio un error al crear el archivo, intentalo de nuevo</div>';
            break;
    }
}
?>

<div class="container">
<?php foreach ($files as $file): ?>
    <div class='file'>
        <div>
            <img src="../../assets/img/doc-icon.png" alt="file icon">
        </div>
        <div>
            <p>Nombre: <?= htmlspecialchars($file->getName()); ?></p>
            <p>Tipo: <?= htmlspecialchars($file->getType()); ?></p>
            <a class="file-button" href="./edit-file.php?n=<?php echo $file->getName();?>">Editar</a>
            <a class="file-button" href="#">Eliminar</a>
        </div>
    </div>
<?php endforeach; ?>    
</div>

<div class="espaciado">
</div>

<?php include "../general/footer.php"?>
</body>
</html>  