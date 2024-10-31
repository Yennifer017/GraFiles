<?php
require '../../../vendor/autoload.php';
include "../../util/Connection.php";
include "../../util/Session.php";
include "../../db/UserDB.php";
include "../../../model/exceptions/NoInsertEx.php";
include "../../../model/exceptions/FileException.php";
include "../../../model/exceptions/NoDataFoundEx.php";
include "../../../model/instances/User.php";
include "../../../model/instances/File.php";
include "../../db/FilesDB.php";
include "../../../model/exceptions/NoUpdateEx.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $extension = isset($_POST['extension']) ? $_POST['extension'] : '';
    $content = isset($_POST['content']) ? $_POST['content'] : '';

    $returnPath = "../../../view/user/edit-file.php";
    try {
        $db = Connection::getInstance()->getDB();
        $session = new Session();
        $user = $session->get_session_data();
        $fileDB = new FilesDB();
        $file = new File($name, $extension, $content);
        $fileDB->editFile($db, $file, $user->getUsername());
        header("Location: $returnPath?n=$name&e=200");
        exit;
    } catch (Exception $th) {
        header("Location: $returnPath?n=$name&e=400");
        exit;
    }
    
} else {
    echo "No se han enviado datos.";
}
?>
