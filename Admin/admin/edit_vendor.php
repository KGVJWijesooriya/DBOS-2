<?php

@include 'login-check.php';

if(isset($_POST['Name'])){

    $Name = $_POST['Name'];
    $P_Number = $_POST['P_Number'];
    $address = $_POST['address'];
    $id = $_POST['id'];

    $result = mysqli_query($conn, "UPDATE vendor SET Name = '$Name', P_Number = '$P_Number', address = '$address' WHERE id = '$id'");

    if($result){
        return 'data update';
    }
}
?>