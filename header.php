<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"   integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   crossorigin="anonymous"></script>
  </head>
  <body>
    <header>
      <div class="midd"><a href = "index.php"> <img src = "trans.png" alt = "Centeral Image" align="middle" height = "100" width = "500"> </a></div>
      <nav>
        <div class="main-wrapper">
          <ul>
            <li><a href="index.php" class = "btn">Home</a></li>
            <li><a href="calendar2017.php" class = "btn">Calendar</a></li>
          </ul>
          <div class="nav-login">
            <?php
              if(isset($_SESSION['u_id']))
              {
                echo '<form action="includes/logout.inc.php" method="POST">
                        <button type="submit" name="submit" class = "btn">Logout</button>
                      </form>';
              }
              else
              {
                echo '<form action="includes/login.inc.php" method="POST">
                        <input type="text" name="uid" placeholder="Username/e-email">
                        <input type="password" name="pwd" placeholder="password">
                        <button type="submit" name="submit" class = "btn">Login</button>
                        <a href="signup.php" class ="btn">Sign up</a>
                      </form>';
              }
            ?>
          </div>
        </div>
      </nav>
    </header>
