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
    include "./admi-header.php";
    $session = new Session();
    $user = $session->get_session_data();
    if($user->getRol() != User::ADMIN_ROL){
        header("Location: ../general/login.php?e=401");
        exit;
    }
    try {
        $db = Connection::getInstance()->getDB();
        $filesDB = new FilesDB();
        $files = $filesDB->getAllDeletedFiles($db);
    } catch (Exception $th) {
        header("Location: ../general/login.php?e=401");
        exit;
    }

?>

<h1>Papelera</h1>

<div class="container">
<?php foreach ($files as $file): ?>
    <div class='file'>
        <div>
            <img src="../../assets/img/doc-icon.png" alt="file icon">
        </div>
        <div>
            <p>Nombre: <?= htmlspecialchars($file->getName()); ?></p>
            <p>Tipo: <?= htmlspecialchars($file->getType()); ?></p>
            <a class="file-button" href="#">
                Ver Informacion
            </a>
            <a class="file-button" href="#">
                Eliminar definitivamente
            </a>
        </div>
    </div>
<?php endforeach; ?>    
</div>

<div class="espaciado">
</div>

<?php include "../general/footer.php"?>
</body>
</html>  