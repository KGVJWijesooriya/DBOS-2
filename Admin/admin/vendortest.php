<?php
include("../config.php");

// if (isset($_POST['Vender_ID']) && isset($_POST['total'])) {
//     $vendorID = $_POST['Vender_ID'];
//     $total = $_POST['total'];

//     // Query the database to fetch the previous amount for the selected vendor
//     $sql = "SELECT Amount FROM vendor WHERE id = $vendorID";
//     // Execute the query and fetch the previous amount
//     // Assuming you have a database connection, you can use PDO or mysqli

//     // Calculate the new amount
//     $previousAmount = $sql;// Fetch the previous amount from the database
//     $newAmount = $previousAmount + $total;

//     // Update the database with the new amount
//     $updateSql = "UPDATE vendor SET Amount = '$newAmount' WHERE id = '$vendorID'";
//     // Execute the update query

//     // Handle the database update result (success or failure) as needed

// } else {
//     // Handle the case where the required parameters are not provided
// }


// if (isset($_POST['submit'])) {



//     $vendorID = $_POST['Vender_ID'];
//     $total = $_POST['total'];

//     $sql = "SELECT * FROM vendor WHERE id = '$vendorID' ";
//     $query = mysqli_query($conn, $sql);
//     while ($row = mysqli_fetch_assoc($query)) {
//         $Amount = $row['Amount'];

//         $newtotal = $total + $Amount;

//         $result = mysqli_query($conn, "UPDATE vendor SET Amount = '$newtotal' WHERE id = '$vendorID'");
//     }
// }
?>
<?php
$sql = "SELECT * FROM vendor WHERE id = '1' ";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($query)) {

?>

    <form action="" method="post">
        <h1>Venter Name</h1> <span> : <?php echo $row['Name']; ?></span>
        <input type="hidden" name="Amount" id="Amount" value="<?php echo $row['Amount']; ?>">
        <h4><?php echo $row['Amount'];
        } ?></h4>

        <h1>Update Amount</h1>
        <input type="number" name="total" id="total">
        <button type="submit" id="submit" name="submit"> update</button>
    </form>

    <?php

    if (isset($_POST['submit'])) {
        $total = $_POST['total'];
        $Amount = $_POST['Amount'];

        (float)$newtotal = (float)$total + (float)$Amount;

        $result = mysqli_query($conn, "UPDATE vendor SET Amount = '$newtotal' WHERE id = '1'");
    }

    ?>