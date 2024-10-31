<?php
require '../../../vendor/autoload.php';
include "../../util/Connection.php";
include "../../util/Session.php";
include "../../db/UserDB.php";
include "../../../model/exceptions/NoUserFoundEx.php";
include "../../../model/instances/User.php";

error_reporting(E_ALL); 
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    try {
        $db = Connection::getInstance()->getDB();
        $user = new User($username, '', $password);
        $userDB = new UserDB();
        $user = $userDB->getFromDB($db, $user);
        $session = new Session();
        $session->setSessionCookie($user);
        header("Location: ../../../view/user/dashboard.php");
        exit;
    } catch (NoUserFoundEx | Exception $ex) {
        header("Location: ../../../view/general/login.php?e=401");
        exit;
    }

} else {
    echo "No se han enviado datos.";
}


