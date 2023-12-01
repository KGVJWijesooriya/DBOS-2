<?php
include("../config.php");

// session_start();
if (!$_SESSION['autha'])
{
    header('location:/DBOS/Admin/login.php');
}


?>
