<?php
// get_data.php

// Include the database connection script
include('db_connection.php');

// Perform a query to get data from the database (replace 'your_table_name' with the actual table name)
$sql = "SELECT * FROM your_table_name";
$result = $conn->query($sql);

// Check if the query was successful
if ($result->num_rows > 0) {
    // Fetch data and store it in an array
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Convert the data array to JSON format and return it
    echo json_encode($data);
} else {
    // No data found in the database
    echo "No data found";
}

// Close the database connection
$conn->close();
?>
