<?php 
  include("../config.php");
  
   $name = $_POST['name'];
  
   $sql = "SELECT * FROM inventor WHERE Name LIKE '%$name%' OR p_No LIKE '%$name%';";  
   $query = mysqli_query($conn,$sql);
   $data='';
   while($row = mysqli_fetch_assoc($query))
   {
       $data .=  "<tr><td>".$row['id']."</td><td>".$row['p_No']."</td><td>".$row['Name']."</td><td>".$row['Price']."</td><td>".$row['qty']."</td></tr>";
   }
    echo $data;
