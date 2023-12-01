<?php
include("../config.php");

session_start();
if (!$_SESSION['auth'])
{
    header('location:/DBOS/Admin/login.php');
}


?>
