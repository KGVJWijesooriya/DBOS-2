<?php

include('../config/constants.php');

?>

<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <div class="login-wrapper">
      <h2>Login</h2>
      <form>
        <div class="input-group">
          <label for="username">Username</label>
          <input type="text" id="username" placeholder="Enter your username" required>
        </div>
        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" id="password" placeholder="Enter your password" required>
        </div>
        <button type="submit" class="btn">Login</button>
      </form>
    </div>
  </div>
</body>
</html>
