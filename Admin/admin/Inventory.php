<?php

@include 'menu.php';

?>

<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Inventory Items</h2>
            <a href="add_stocks.php" class="btn">Add Stocks</a>
            <a href="add_item.php" class="btn">New Item</a>
        </div>
        <div class="mt-4">
            <h2 class="mt-5"><b>Search Item</b></h2>
            <div class="input-group mb-4 mt-3">
                <div class="form-outline">
                    <input type="text" id="getName" />
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>Product No</td>
                        <td>Name</td>
                        <td>Cost</td>
                        <td>Price</td>
                        <td>Qty</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody id="showdata">
                    <?php
                    $sql = "SELECT * FROM inventor";

                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query)) { ?>
                        <tr id=<?php echo $row['id']; ?>>
                            <td> <?php echo $row['p_No']; ?></td>
                            <td data-target="Name"> <?php echo $row['Name']; ?></td>
                            <td data-target="Cost"> <?php echo $row['Cost']; ?></td>
                            <td data-target="Price"> <?php echo $row['Price']; ?></td>
                            <td data-target="qty"> <?php echo $row['qty']; ?></td>
                            <td> <a href="#" data-role="update" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['id'] ?>"> Update </a> </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>


    </div>

    <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

    <!-- The Modal -->
    <div id="myModal" class="modal container">


        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h2>Edit Customer</h2>
            </div>
            <div class="modal-body">
                <label>Name</label>
                <input type="text" id="Name" class="form-control">

                <label>Price</label>
                <input type="text" id="Price" class="form-control">

            </div>
            <input type="hidden" id="userID" class="form-control">

            <div class="modal-footer">
                <a href="#" id="save" class="btn btn-primary pull-right">Update</a>
                <button type="button" class="btn btn-default pull-left  " data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>


    <!-- =========== Scripts =========  -->


    <script>
        $(document).ready(function() {
            $(document).on('click', 'a[data-role=update]', function() {
                var id = $(this).data('id');
                var Name = $('#' + id).children('td[data-target=Name]').text();
                var Price = $('#' + id).children('td[data-target=Price]').text();

                $('#Name').val(Name);
                $('#Price').val(Price);
                $('#userID').val(id);
                // $('#myModal').model('toggle');
            });

            $('#save').click(function() {
                var id = $('#userID').val();
                var Name = $('#Name').val();
                var Price = $('#Price').val();
                $.ajax({
                    url: 'edit_inventory.php',
                    method: 'post',
                    data: {
                        Name: Name,
                        Price: Price,
                        id: id
                    },
                    success: function(response) {
                        $('#' + id).children('td[data-target=Name]').text(Name);
                        $('#' + id).children('td[data-target=Price]').text(Price);
                        // $('#myModal').model('toggle');
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#getName').on("keyup", function() {
                var getName = $(this).val();
                $.ajax({
                    method: 'POST',
                    url: 'searchajax.php',
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
    </body>
    <?php
    @include 'footer.php';
    ?>