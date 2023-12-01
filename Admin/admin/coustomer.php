<?php

@include 'menu.php';

?>
<div class="details">
  <div class="recentOrders">
    <div class="cardHeader">
      <h2>Customers</h2>
      <a href="add_coustomer.php" class="btn">Add Customer</a>
    </div>

    <table>

      <div class="mt-4">
        <h2 class="mt-5"><b>Search Name</b></h2>
        <div class="input-group mb-4 mt-3">
          <div class="form-outline">
            <input type="text" id="getName" />
          </div>
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <td>ID</td>
              <td>Name</td>
              <td>Phone Number</td>
              <td>Address</td>
              <td>Actions</td>
            </tr>
          </thead>
          <tbody id="showdata">
            <?php
            $sql = "SELECT * FROM customer";

            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($query)) { ?>
              <tr id=<?php echo $row['id']; ?>>
                <td> <?php echo $row['id']; ?></td>
                <td data-target="Name"> <?php echo $row['Name']; ?></td>
                <td data-target="P_Number"> <?php echo $row['P_Number']; ?></td>
                <td data-target="address"> <?php echo $row['address']; ?></td>
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

        <label>Phone Number</label>
        <input type="text" id="P_Number" class="form-control">

        <label>Address</label>
        <input type="text" id="address" class="form-control">
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
        var P_Number = $('#' + id).children('td[data-target=P_Number]').text();
        var address = $('#' + id).children('td[data-target=address]').text();

        $('#Name').val(Name);
        $('#P_Number').val(P_Number);
        $('#address').val(address);
        $('#userID').val(id);
        // $('#myModal').model('toggle');
      });

      $('#save').click(function() {
        var id = $('#userID').val();
        var Name = $('#Name').val();
        var P_Number = $('#P_Number').val();
        var address = $('#address').val();
        $.ajax({
          url: 'edit_coustomer.php',
          method: 'post',
          data: {
            Name: Name,
            P_Number: P_Number,
            address: address,
            id: id
          },
          success: function(response) {
            $('#' + id).children('td[data-target=Name]').text(Name);
            $('#' + id).children('td[data-target=P_Number]').text(P_Number);
            $('#' + id).children('td[data-target=address]').text(address);
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
<?php
@include 'footer.php';
?>