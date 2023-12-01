<?php
@include 'login-check.php';

if (isset($_POST["type"])) {
    if ($_POST["type"] == "ProductData") { // Change the type to "ProductData"
        $sqlQuery = "SELECT * FROM inventor ORDER BY Name ASC"; // Change the table name to "inventor"
        $resultset = mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));
        while ($row = mysqli_fetch_array($resultset)) {
            $output[] = [
                'id' => $row["id"],
                'name' => $row["Name"],
            ];
        }
        echo json_encode($output);
    } else {
        // Handle other cases if needed
    }
}
?>
