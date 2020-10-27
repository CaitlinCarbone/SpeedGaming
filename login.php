<?php
  include_once 'header.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="js/login.js"></script>
    </head>

    <form action="includes/login.inc.php" method="post">

    <body>
    <div class="form-box">
        <h1>Login</h1>
        <div class="input-box">
            <i class="fa fa-envelope-o"></i>
            <input type="text" name="uid" placeholder="Username/Email..." id="username">
        </div>
        <div class="input-box">
            <i class="fa fa-key"></i>
            <input type="password" name= "password" placeholder="Password..." id="password">
            <span class="eye" onclick="displayEye();">
                <i id="hide1" class="fa fa-eye"></i>
                <i id="hide2" class="fa fa-eye-slash"></i>
            </span>
        </div>
        <button type="submit" name="submit" class="login-btn">LOGIN</button>
        <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput"){
            echo "<span style='color:red; font-weight: bold; margin-left: 50px'>Fill in all fields!</span>";
        }
        elseif ($_GET["error"] == "wronglogin"){
            echo "<span style='color:red; font-weight: bold; margin-left: 50px'>Incorrect login information!</span>";
        }
    }
    ?>
    </div>

    </body>
</html>