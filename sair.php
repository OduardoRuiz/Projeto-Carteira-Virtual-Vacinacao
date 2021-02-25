<?php

session_start();

if($_SESSION['adminlog']){
    unset($_SESSION['adminlog']);
    header("Location: admin.php");
}
if($_SESSION['usuariolog']){
    unset($_SESSION['usuariolog']);
    header("Location: index.php");
}
?>