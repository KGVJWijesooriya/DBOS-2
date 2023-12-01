<?php

@include 'menu.php';

?>

<?php

if (isset($_POST['submit'])) {

    $c_name = $_POST['c_name'];
    $c_pNo = $_POST['c_pNo'];
    $c_address = $_POST['c_address'];

    $select = " SELECT * FROM customer WHERE Name = '$c_name' && P_Number = '$c_pNo' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $error[] = 'Product already exist!';
    } else {
        $insert = "INSERT INTO `customer`(`Name`, `P_Number`, `address`) VALUES ('$c_name','$c_pNo','$c_address')";
        mysqli_query($conn, $insert);
    }
};

?>

<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Add New Customer</h2>
        </div>


        <form action="" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Coustomer Name</label>
                <input type="text" name="c_name" class="form-control" required placeholder="Enter your Coustomer name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Coustomer Phone Number</label>
                <input type="number" name="c_pNo" class="form-control" equired placeholder="Enter your Coustomer Phone Number">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Address</label>
                <input type="text" name="c_address" class="form-control" required placeholder="enter your Coustomer Address">
            </div>
            <button type="submit" name="submit" value="Save" class="btn btn-primary">Submit</button>
        </form>
    </div>