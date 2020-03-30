<?php
  // First we start a session which allow for us to store information as SESSION variables.
  session_start();
  // "require" creates an error message and stops the script. "include" creates an error and continues the script.
  // this creates the file to create the connection to the database
  require "includes/dbh.inc.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Simple login system using mysql and php.">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title>Login System</title>
    <!-- link to w3.css -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- link to my css -->
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <!-- Here is the header where I decided to include the login form for this tutorial. -->
    <header>
      <nav class="w3-bar w3-border-bottom w3-blue-grey">
        <a class="w3-bar-item w3-border w3-button" href="index.php">Home</a>
        <a class="w3-bar-item w3-border w3-button" href="#">Portfolio</a>
        <a class="w3-bar-item w3-border w3-button" href="#">About</a>
        <a class="w3-bar-item w3-border w3-button" href="#">Contact</a>
        <!--
        Here is the HTML login form.
        Notice that the "method" is set to "post" because the data we send is sensitive data.
        The "inputs" I decided to have in the form include username/e-mail and password. The user will be able to choose whether to login using e-mail or username.

        Also notice that using PHP, we can choose whether or not to show the login/signup form, or to show the logout form, if we are logged in or not. We do this based on SESSION variables which I explain in more detail in the login.inc.php file!
        -->
        <?php
        if (!isset($_SESSION['id'])) {
          echo '
          <a class="w3-bar-item w3-border w3-button w3-right" href="signup.php" class="header-signup">Signup</a>
          <form class="w3-bar-item w3-right" action="includes/login.inc.php" method="post">
          <input type="text" name="username" placeholder="E-mail/Username">
          <input type="password" name="password" placeholder="Password">
          <button class="w3-button w3-border" type="submit" name="login-submit">Login</button>
          </form>
          ';
        }
        else if (isset($_SESSION['id'])) {
          echo '<form class="w3-bar-item w3-right" action="includes/logout.inc.php" method="post">
            <button class="w3-button w3-border" type="submit" name="login-submit">Logout</button>
          </form>';
        }
        ?>
      <!-- </div> -->
      </nav>
    </header>
