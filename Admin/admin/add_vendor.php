<?php

@include 'menu.php';

?>

<?php

if (isset($_POST['submit'])) {

    $v_name = $_POST['v_name'];
    $v_pNo = $_POST['v_pNo'];
    $v_address = $_POST['v_address'];

    $select = " SELECT * FROM vendor WHERE Name = '$v_name' && P_Number = '$v_pNo' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $error[] = 'Product already exist!';
    } else {
        $insert = "INSERT INTO `vendor`(`Name`, `P_Number`, `address`) VALUES ('$v_name','$v_pNo','$v_address')";
        // echo $insert;
        mysqli_query($conn, $insert);
    }
};

?>

<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Add New Vendor</h2>
        </div>

        <form action="" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Vendor Name</label>
                <input type="text" name="v_name" class="form-control" required placeholder="Enter your Vendor name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Vendor Phone Number</label>
                <input type="number" name="v_pNo" class="form-control" equired placeholder="Enter your Vendor Phone Number">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Address</label>
                <input type="text" name="v_address" class="form-control" required placeholder="enter your Vendor Address">
            </div>
            <button type="submit" name="submit" value="Save" class="btn btn-primary">Submit</button>
        </form>

        <!-- <input type="submit" name="submit" value="Save" class="form-btn"> -->
        </form>
    </div>