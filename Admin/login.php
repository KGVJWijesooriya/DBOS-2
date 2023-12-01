<?php

@include 'config.php';



if (isset($_POST['submit'])) {

   //Check whether the Submit Button is Clicked or NOT
   if (isset($_POST['submit'])) {
      //process for login
      //get the data from login from
      $email = $_POST['email'];
      $pass = md5($_POST['password']);

      //check user name and password available
      $select = "SELECT * FROM user_form WHERE email='$email' AND password='$pass' ";

      //Execute the Query
      $result = mysqli_query($conn, $select);

      if (mysqli_num_rows($result) > 0) {

         $row = mysqli_fetch_array($result);

         if ($row['user_type'] == 'admin') {

            session_start();
            $_SESSION['admin_name'] = $row['name'];
            $_SESSION['auth'] = true;
            header('location:/DBOS/Admin/admin/index.php');
         } elseif ($row['user_type'] == 'user') {

            $_SESSION['user_name'] = $row['name'];
            $_SESSION['autha'] = true;
            header('location:/DBOS/Admin/Cashier/cashier.php');
         }
      } else {
         $error[] = 'incorrect email or password!';
      }
   }
};
?>




<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="CSS/style.css">

</head>

<body>

   <div class="form-container">

      <form action="" method="post">
         <h3>login now</h3>
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            };
         };
         ?>
         <input type="email" name="email" required placeholder="Enter your email">
         <input type="password" name="password" required placeholder="Enter your password">
         <input type="submit" name="submit" value="login now" class="form-btn">
      </form>

   </div>

</body>

</html>