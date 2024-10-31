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