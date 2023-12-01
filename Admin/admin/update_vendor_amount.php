<?php
include("../config.php");

if (isset($_POST['Vender_ID']) && isset($_POST['total'])) {

    

    $vendorID = $_POST['Vender_ID'];
    $total = $_POST['total'];

    $sql = "SELECT Amount FROM vendor WHERE id = '$vendorID' ";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $Amount = $row['Amount'];

        (float)$newtotal = (float)$total + (float)$Amount;

        $result = mysqli_query($conn, "UPDATE vendor SET Amount = '$newtotal' WHERE id = '$vendorID'");
    }
}
?>
