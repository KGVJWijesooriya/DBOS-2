<?php
@include 'login-check.php';
 
if (isset($_POST["type"])) {
    if ($_POST["type"] == "customerData") {
        $sqlQuery = "SELECT * FROM customer ORDER BY Name ASC";
        $resultset = mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));
        while( $row = mysqli_fetch_array($resultset) ) {
            $output[] = [
                'id' => $row["id"],
                'name' => $row["Name"],
                'P_Number' => $row["P_Number"], 
                'address' => $row["address"],
            ];
        }
        echo json_encode($output); 
    } else {
    }
}
  
?>
