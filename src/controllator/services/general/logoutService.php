<?php
include "../../util/Session.php";
$session = new Session();
$session->deleteSessionCookie();
header("Location: ../../../view/general/index.php");
exit;
?>