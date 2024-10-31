<?php
require '../../../vendor/autoload.php';
include "../../util/Connection.php";
include "../../util/Session.php";
include "../../db/UserDB.php";
include "../../../model/exceptions/NoInsertEx.php";
include "../../../model/exceptions/FileException.php";
include "../../../model/instances/User.php";

error_reporting(E_ALL); 
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    $returnPath = "../../../view/user/create-user.php";
    try {
        $db = Connection::getInstance()->getDB();
        $user = new User($username, '', $password, $name, $lastname, $email);
        $userDB = new UserDB();
        $userDB->insetIntoDB($db, $user);
        header("Location: $returnPath?e=200");
        exit;
    } catch (NoInsertEx | Exception $ex) {
        //echo $ex->getMessage();
        header("Location: $returnPath?e=400");
        exit;
    }

} else {
    echo "No se han enviado datos.";
}


