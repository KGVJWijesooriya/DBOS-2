<?php

@include 'menu.php';

?>

<div id="postDataPreview">
    <!-- The POST data will be displayed here -->
</div>

<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Add Bill</h2>
            <a href="add_vendor.php" class="btn">Add Vendors</a>
        </div>
        <div>
            <form id="billForm" method="post">
                <div class="form-row">
                    <div class="col-4">
                        <input type="hidden" name="Vender_ID" id="Vender_ID" value="">
                        <select name="Vender_Name" data-live-search="true" id="Vender_Name" class="form-control" title="Select Vender Name"> </select> <br>
                    </div>
                    <!-- <div>
                        <input type="number" class="form-control" placeholder="Vender Phone Number"  >
                    </div> -->
                </div>
                <div class="form-row">
                    <div>
                        <br><input type="number" name="invoice_id" id="invoice_id" class="form-control" placeholder="Invoice Number" required>
                    </div>
                    <div class="px-2">
                        <br><input type="date" id="date" name="date" class="form-control" required>
                    </div>
                </div>
        </div>

        <div class=" mt-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>No</td>
                        <td class="col-md-6">Name</td>
                        <td>Qty</td>
                        <td>Cost</td>
                        <td>Amount</td>
                    </tr>
                </thead>
                <tbody id="tbl">
                </tbody>

            </table>
            <div class="float-right">
                <h4 class="float-right">Total</h4><br>
                <input type="number" class="tota" id="total" name="total" value="" readonly>
                <!-- <input type="submit" id="submitBillButton" class="button add_another btn btn-success" value="Save" /> -->
                <button type="submit" id="submitBillButton" class="btn btn-primary">Submit Bill</button>
            </div>
            <button type="button" id="addRowButton" class="btn btn-primary">Add New Row</button>

            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Load initial data
        loadVenderData();
        loadProductData();

        Calc($("input[name='qty[]']:first, input[name='cost[]']:first"));

        $("#addRowButton").click(addNewRow);

        // Attach the function to the "Submit Bill" button's click event
        $("#submitBillButton").click(submitBillForm);

        // Rest of your JavaScript code
    });
    // Function to clone the row and append it to the table



    // Function to update the count in the rows
    function updateRowCount() {
        var table = document.getElementById("tbl");
        var rows = table.getElementsByTagName("tr");

        for (var i = 0; i < rows.length; i++) {
            var countInput = rows[i].querySelector("input[name='count']");
            var countDisplay = rows[i].querySelector(".count-display");
            if (countInput && countDisplay) {
                countInput.value = i + 1;
                countDisplay.textContent = i + 1; // Update the count display
            }
        }
    }

    // Load vendor data and populate options
    function loadVenderData() {
        // ... Your loadVenderData logic ...
    }

    // Load product data and populate options
    function loadProductData(selectElement) {
        // ... Your loadProductData logic ...
    }

    $(newRow).find("input[name='qty[]'], input[name='cost[]']").on("change", function() {
        Calc($(this));
        GetTotal();
    });

    function Calc(inputElement) {
        var row = inputElement.closest("tr"); // Find the parent row of the input
        var qty = row.find("input[name='qty[]']").val();
        var cost = row.find("input[name='cost[]']").val();

        var amount = qty * cost;
        row.find("input[name='amount']").val(amount);

        GetTotal();
    }

    // Function to calculate the total amount
    function GetTotal() {
        var sum = 0;
        var amounts = $("input[name='amount']");

        for (let index = 0; index < amounts.length; index++) {
            var amount = $(amounts[index]).val();
            sum = +(sum) + +(amount);
        }

        $("#total").val(sum);
    }

    function addNewRow(event) {
        event.preventDefault(); // Prevent form submission

        var table = document.getElementById("tbl");
        var newRow = document.createElement("tr");

        // HTML for the new row
        newRow.innerHTML = `
            <td>
                <input type="hidden" name="count" value="">
                <span class="count-display"></span>
            </td>
            <td class="col-4">
                <input type="hidden" name="Product_no" value="">
                <select name="Product_id[]" class="form-control product-select" data-live-search="true" title="Select Product Name"></select>
            </td>
            <td>
                <input type="number" class="form-control" name="qty[]">
            </td>
            <td>
                <input type="number" class="form-control" name="cost[]" id='cost[]'>
            </td>
            <td>
                <input type="number" class="form-control" name="amount" readonly >
            </td>
        `;

        // Append the new row to the table
        table.appendChild(newRow);

        $(newRow).find("input[name='qty[]'], input[name='cost[]']").first().trigger("change");

        // Update the count in all rows
        updateRowCount();

        // Refresh the Bootstrap-select in the newly added row
        var productSelect = $(newRow).find(".product-select");
        productSelect.selectpicker();

        // Load product data and populate options
        loadProductData(productSelect);

        // Attach the Calc function to the "onchange" event of the quantity and cost inputs
        $(newRow).find("input[name='qty[]'], input[name='cost[]']").on("change", function() {
            Calc($(this));
            GetTotal();
        });
    }

    // Function to load product data and populate options
    function loadProductData(selectElement) {
        $.ajax({
            url: "fetch.php", // Change the URL to the correct PHP file
            method: "POST",
            data: {
                type: "ProductData", // You may need to adjust this type
            },
            dataType: "json",
            success: function(data) {
                var html = "";
                for (var count = 0; count < data.length; count++) {
                    html += '<option value="' + data[count].id + '">' + data[count].name + ' (ID: ' + data[count].id + ')</option>';
                }

                // Populate options in the select menu
                selectElement.html(html);

                // Refresh the Bootstrap-select to display the newly populated options
                selectElement.selectpicker('refresh');
            },
        });
    }

    function submitBillForm() {
        var formData = $("#billForm").serialize(); // Serialize form data
        $.ajax({
            url: "upload_bill.php", // Change the URL to your server-side script
            method: "POST",
            data: formData,
            dataType: "json",
            success: function(response) {
                // Handle the server response if needed
                console.log(response);

            }
        });
    }
</script>



<script>
    $(document).ready(function() {
        $("#Vender_Name").selectpicker();

        load_data("VendorData");

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
                    $("#Vender_Name").html(html);
                    $("#Vender_Name").selectpicker("refresh");
                },
            });
        }

        // Add an onchange event to update the hidden input (Vender_ID)
        $("#Vender_Name").on("changed.bs.select", function(e) {
            var selectedOption = $(this).find("option:selected");
            var vendorID = selectedOption.val();
            $("#Vender_ID").val(vendorID);
        });
    });
</script>

<?php
// Vendor amount update

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $vendorID = $_POST["Vender_ID"];
    $invoiceId = $_POST["invoice_id"];
    $totalAmount = $_POST["total"];
    $date = $_POST["date"];

    $sql = "SELECT Amount FROM vendor WHERE id = '$vendorID' ";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $Amount = $row['Amount'];
    }

    (float)$newTotal = (float)$totalAmount + (float)$Amount;

    $sql = "UPDATE vendor SET Amount = '$newTotal' , date = '$date '  WHERE id = '$vendorID'";

    if ($conn->query($sql) === TRUE) {
        echo "Vendor's amount updated successfully.";
    } else {
        echo "Error updating vendor's amount: " . $conn->error;
    }
}
?>







<?php
@include 'footer.php';
?>
