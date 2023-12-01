<?php

include("../config.php");

  if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $query = "SELECT * FROM vendor WHERE Name LIKE '%$inpText%'";
    $result = $conn->query($query);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            echo "<a herf='#' class='list-group-item list-group-item-action border-1'>" . $row['Name'] . "</a>";
        }
    }
    else{
       echo "<p class='list-group-item list-group-item-action border-1'>No records</p>";
    }
}
?>