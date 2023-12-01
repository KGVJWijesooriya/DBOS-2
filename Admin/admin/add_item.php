<?php

@include 'menu.php';

?>

<?php

if(isset($_POST['submit'])){

    $p_BarC = $_POST['p_BarC'];
    $p_No = $_POST['p_No'];
    $p_name = $_POST['p_name'];
    $p_dis = $_POST['p_dis'];
    $p_price = $_POST['p_price'];
 
    $select = " SELECT * FROM inventor WHERE id = '$p_No' && barcode = '$p_BarC' ";
    $conn = mysqli_connect('localhost','root','','dbos');
    $result = mysqli_query($conn, $select);
 
    if(mysqli_num_rows($result) > 0){
 
       $error[] = 'Product already exist!';
 
    }else{
        $insert = "INSERT INTO `inventor`(`p_No`, `barcode`, `Name`, `Discription`, `Cost`, `Price`, `qty`) VALUES ('$p_No','$p_BarC','$p_name','$p_dis','0','$p_price','0')";
        mysqli_query($conn, $insert);
        
    }
 
 };

?>

<div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Inventory Items</h2>
                    </div>

                    <table><form action="" method="post">

                        <tbody>
                        
                            <tr>
                                <td>Product Number</td>
                                <td><input class="itext" type="number" name="p_No" required placeholder="enter your Product Number"></td>
                            </tr>

                            <tr>    
                                <td>Name</td>
                                <td><input class="itext" type="text" name="p_name" required placeholder="enter your Product name"></td>
                            </tr> 
                         
                            <tr>
                                <td>Barcode</td>
                                <td><input class="itext" type="text" name="p_BarC" required placeholder="enter your Product Barcode"></td>
                            </tr>

                            <tr>
                                <td>Discription</td>
                            <td><input class="itext" type="text" name="p_dis" required placeholder="enter your Product Discription"></td>
                            </tr>

                            <tr>
                                <td>Price</td>
                            <td><input class="itext" type="number" name="p_price" required placeholder="enter your product price"></td>
                            </tr>

                            
                        </tbody>
                    </table>
                    
                    <input type="submit" name="submit" value="Save" class="form-btn">
                    </form>
                </div>