<?php
include("../config.php");
?>

<?php
$vendor_id = $_POST['vendor_id'];
$invoice_id = $_POST['invoice_id'];
$product_id = $_POST['Product_no'];
$qty = $_POST['qty'];
$cost = $_POST['cost'];
$date = date("Y-m-d H:i:s"); // Current date and time

// Insert data into vendor_bill table
$sql = "INSERT INTO vendor_bill (vendor_id, invoide_id, product_id, qty, cost, date) VALUES ('$vendor_id', '$invoice_id', '$product_id', '$qty', '$cost', '$date')";

if ($conn->query($sql) === TRUE) {
    $response = array("status" => "success", "message" => "Data inserted successfully");
} else {
    $response = array("status" => "error", "message" => "Error: " . $sql . "<br>" . $conn->error);
}

$conn->close();

echo json_encode($response);
?>
