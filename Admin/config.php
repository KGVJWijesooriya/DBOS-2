<?php
// Start session
session_start();

// Create constants to store non-repeating values
define('SITEURL', 'http://localhost/DBOS/Admin/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'dbos');

// Establish database connection
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection and handle errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>
