<?php
include("../config.php");
$name = $_POST['name'];

$sql = "SELECT * FROM vendor WHERE Name LIKE '$name%' OR P_Number LIKE '$name%'";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($query)) { ?>
    <tr id=<?php echo $row['id']; ?>>
        <td> <?php echo $row['id']; ?></td>
        <td data-target="Name"> <?php echo $row['Name']; ?></td>
        <td data-target="P_Number"> <?php echo $row['P_Number']; ?></td>
        <td data-target="address"> <?php echo $row['address']; ?></td>
        <td> <a href="#" data-role="update" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['id'] ?>"> Update </a> </td>
    </tr>
<?php }
?>