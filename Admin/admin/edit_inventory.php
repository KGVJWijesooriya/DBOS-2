<?php

@include 'login-check.php';

if(isset($_POST['Name'])){

    $Name = $_POST['Name'];
    $Price = $_POST['Price'];
    $id = $_POST['id'];

    $result = mysqli_query($conn, "UPDATE inventor SET Name = '$Name', Price = '$Price' WHERE id = '$id'");

    if($result){
        return 'data update';
    }
}
?>