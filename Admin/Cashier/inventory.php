<?php
include("login-check.php");
?>



<!DOCTYPE html>
<html>

<head>
  <title>Billing</title>
  <link rel="stylesheet" href="cashier.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>

<body>
  <div class="container">
    <!-- Navigation Bar -->
    <div class="navbar">
      <div class="cashier-profile">Cashier: <?php echo $_SESSION['user_name'] ?></div>
      <ul class="nav-links">
        <li><a href="logout.php">Log Out</a></li>
        <li><a href="cashier.php">Home</a></li>
        <li><a href="inventory.php">Stock</a></li>
        <!-- Add more navigation links as needed -->
      </ul>
    </div>

    <h1>INVENTORY </h1>

    <!-- <script src="cashier.js"></script> -->

    <div class="container mt-4">
      <h2 class="mt-5"><b>Search Item</b></h2>
      <div class="input-group mb-4 mt-3">
        <div class="form-outline">
          <input type="text" id="getName" />
        </div>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Product No</th>
            <th>Name</th>
            <th>Price</th>
            <th>qty</th>
          </tr>
        </thead>
        <tbody id="showdata">
          <?php
          $sql = "SELECT * FROM inventor";

          $query = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($query)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['p_No'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Price'] . "</td>";
            echo "<td>" . $row['qty'] . "</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
    <script>
      $(document).ready(function() {
        $('#getName').on("keyup", function() {
          var getName = $(this).val();
          $.ajax({
            method: 'POST',
            url: 'searchinventory.php',
            data: {
              name: getName
            },
            success: function(response) {
              $("#showdata").html(response);
            }
          });
        });
      });
    </script>