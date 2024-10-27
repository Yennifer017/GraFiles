<?php
require '../../../vendor/autoload.php';
include "../../util/Connection.php";

error_reporting(E_ALL); 
ini_set('display_errors', 1);

echo "login service";

$db = Connection::getInstance()->getDB();
$collections = $db->listCollections();
foreach ($collections as $collection) {
    echo $collection->getName() . "\n";
}

