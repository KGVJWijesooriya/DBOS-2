<?php
include("login-check.php");
?>

<!DOCTYPE html>
<html>

<head>
  <title>Billing</title>
  <link rel="stylesheet" href="cashier.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.12.1.js" integrity="sha256-VuhDpmsr9xiKwvTIHfYWCIQ84US9WqZsLfR4P7qF6O8=" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css" />

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

    <h1>Stocks Pro </h1>


    <div class="input-group">
      <label for="customerDetails">Customer Details:</label>
      <div class="flex-wrap">
        <div class="flex-item">
          <!-- <input type="text" id="customerName" placeholder="Customer Name"> -->
          <select name="customer_Name" data-live-search="true" id="customer_Name" class="form-control" title="Select Customer Name"> </select>
        </div>
        <!--<div class="flex-item">
          <input type="text" name="customerAddress" id="customerAddress" placeholder="Customer Address" value="">
        </div> -->

      </div>
    </div>

    <!-- <div class="input-group">
      <label for="barcodeNumber">Barcode Number:</label>
      <input type="text" id="barcodeNumber" placeholder="Enter Barcode Number" oninput="autoFillItemDetails()">
    </div> -->

    <div class="input-group">
      <label>Payment Method:</label><br>
      <input type="radio" name="paymentMethod" value="cash" checked> Cash<br>
      <input type="radio" name="paymentMethod" value="creditCard"> Credit Card<br>
      <input type="radio" name="paymentMethod" value="debitCard"> Cheque<br>
    </div>

    <!-- <div class="input-group">
      <button id="addToCartButton">Add to Cart</button>
    </div> -->

    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Serial No</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody id="itemDetails">
          <!-- Table rows will be auto-filled here -->
        </tbody>
      </table>
    </div>

    <div class="receipt">
      <h2>Receipt</h2>
      <div id="receipt-items"></div>
      <p>Total: <span id="total">0.00</span></p>
      <!-- Add a container for the real-time date and time -->
      <div id="date-time"></div>

      <!-- Add the Print and Save buttons -->
      <div class="receipt-buttons">
        <button onclick="printReceipt()">Print</button>
        <button onclick="saveReceipt()">Save</button>
      </div>
    </div>
  </div>

  <!-- <script src="cashier.js"></script> -->
</body>

</html>

<script>
  $(document).ready(function() {
    $("#customer_Name").selectpicker();

    load_data("customerData");

    function load_data(type = "") {
      $.ajax({
        url: "fetch_P.php",
        method: "POST",
        data: {
          type: type,
        },
        dataType: "json",
        success: function(data) {
          var html = "";
          for (var count = 0; count < data.length; count++) {
            html += '<option value="' + data[count].id + '">' + data[count].name + ' (ID: ' + data[count].id + ')</option>';
          }
          $("#customer_Name").html(html);
          $("#customer_Name").selectpicker("refresh");
        },
      });
    }

    // Add an onchange event to update the hidden input (Vender_ID)
    $("#customerr_Name").on("changed.bs.select", function(e) {
      var selectedOption = $(this).find("option:selected");
      var vendorID = selectedOption.val();
      $("#customerAddress").val(vendorID);
    });
  });
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>