<?php
include("../config.php");
?>

<?php
if (isset($_POST['submit'])) {
    $vendor_id = $_POST['Vender_ID'];
    $invoice_id = $_POST['invoice_id'];
    $date = $_POST['date'];

    // Check if the arrays are set and countable
    if (isset($_POST['Product_id']) && isset($_POST['qty']) && isset($_POST['cost'])) {
        $product_ids = $_POST['Product_id'];
        $qtys = $_POST['qty'];
        $costs = $_POST['cost'];

        // Loop through the posted data for each row
        for ($i = 0; $i < count($product_ids); $i++) {
            $product_id = $product_ids[$i];
            $qty = $qtys[$i];
            $cost = $costs[$i];

            // Debugging: Print the values of the variables
            echo "Vendor ID: $vendor_id<br>";
            echo "Invoice ID: $invoice_id<br>";
            echo "Product ID: $product_id<br>";
            echo "Quantity: $qty<br>";
            echo "Cost: $cost<br>";
            echo "Date: $date<br>";

            // Insert data into the database using prepared statement
            $sql = "INSERT INTO vendor_bill (vendor_id, invoice_id, product_id, qty, cost, date) VALUES ($vendor_id, $invoice_id, $product_id, $qty, $cost, $date)";
            mysqli_query($conn, $sql);
        }

        echo "All data inserted successfully!";
    }
}
?>