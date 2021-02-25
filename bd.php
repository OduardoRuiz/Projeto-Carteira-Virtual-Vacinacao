<?php

require_once "config.php";

$pdoConfig = DB_DRIVE . ":". "Server=" . DB_HOST . ";";
$pdoConfig .= "Database=".DB_NAME. ";";

try {
    $objBanco = new PDO($pdoConfig, DB_USER, DB_PASS);


} catch (PDOException $objErro)  {

    echo "SGND Indisponível:" . $objErro->getMessage();

    exit();
    
}