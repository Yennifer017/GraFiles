
<?php
    require '../../vendor/autoload.php';
    include "../../controllator/util/Connection.php";
    include "../../controllator/util/Session.php";
    include "../../model/instances/User.php";
    include "../../model/instances/File.php";
    include "../../controllator/db/FilesDB.php";
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
    include "./header.php";
    try {
        $db = Connection::getInstance()->getDB();
        $session = new Session();
        $user = $session->get_session_data();
        $nameFile = isset($_GET['n']) ? $_GET['n'] : '';
        $file = new File($nameFile);
        $fileDB = new FilesDB();
        $file = $fileDB->getFile($db, $file, $user->getUsername());
    } catch (Exception $th) {
        header("Location: ../../../view/user/view-files.php?e=401");
        exit;
    }
?>

<h1>Editar documento</h1>

<?php
if (isset($_GET['e'])) {
    switch ($_GET['e']) {
        case 200:
            echo '<div class="success">Cambios guardados</div>';
            break;
        default:
            echo '<div class="error">No se guardaron cambios, intentalo de nuevo</div>';
            break;
    }
}
?>

<div class="centrado">
    <img src="../../assets/img/nube.png" alt="wallpaper" id="wallpaper-nube"> 
</div>
<form action="../../controllator/services/files/editFile.php" method="post">

    <h2>Nombre: <?php echo $file->getName()?></h2>
    <input type="hidden" name="name" value="<?php echo $file->getName()?>">

    <p>Extension: <?php echo $file->getType()?></p>
    <input type="hidden" name="extension" value="<?php echo $file->getType()?>">

    <br><br>
    <label for="content">Contenido:</label>
    <textarea name="content" id="content">
        <?php echo $file->getContent()?>
    </textarea>
    <input type="submit" value="Guardar">
</form>
<div class="espaciado">

</div>

<?php include "../general/footer.php"?>
</body>
</html>  