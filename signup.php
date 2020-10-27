<?php
  include_once 'header.php';
?>

<section class="signup-form">
    
    <head>
        <title>Signup</title>
        <link rel="stylesheet" href="css/signup.css">
    </head>
    <body>

    <form action="includes/signup.inc.php" method="post">

    <div class="form-box">
        <h1>Signup</h1>
        <div class="input-box">
            <input type="text" name="fullName" placeholder="Full Name..." id="fullName">
        </div>
        <div class="input-box">
            <input type="email" name="emailID" placeholder="Email Id..." id="email">
        </div>
        <div class="input-box">
            <input type="text" name="username" placeholder="Username..." id="username">
        </div>
        <div class="input-box">
            <input type="password" name="password" placeholder="Password..." id="password">
        </div>
        <div class="input-box">
            <input type="password" name="repeatPassword" placeholder="Repeat password..." id="repeatpassword">
        </div>
        <button type="submit" name="submit" class="login-btn">SIGNUP</button>
        <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput"){
            echo "<span style='color:red; font-weight: bold; margin-left: 50px'>Fill in all fields!</span>";
        }
        elseif ($_GET["error"] == "invaliduid"){
            echo "<span style='color:red; font-weight: bold; margin-left: 50px'>Choose a valid username!</span>";
        }
        elseif ($_GET["error"] == "inappropriateName"){
            echo "<span style='color:red; font-weight: bold; margin-left: 50px'>Choose an appropriate username!</span>";
        }
        elseif ($_GET["error"] == "invalidemail"){
            echo "<span style='color:red; font-weight: bold; margin-left: 50px'>Choose a proper email!</span>";
        }
        elseif ($_GET["error"] == "passwordsdontmatch"){
            echo "<span style='color:red; font-weight: bold; margin-left: 50px'> Passwords don't match!</span>";
        }
        elseif ($_GET["error"] == "stmtfailed"){
            echo "<span style='color:red; font-weight: bold; margin-left: 50px'>Something went wrong, try again!</span>";
        }
        elseif ($_GET["error"] == "usernametaken"){
            echo "<span style='color:red; font-weight: bold; margin-left: 50px'>Username already taken!</span>";
        }
        elseif ($_GET["error"] == "none"){
            echo "<span style='color:red; font-weight: bold; margin-left: 50px'>Welcome to Speed Gaming!</span>";
        } 
    }
    ?>
    </div>
    </body>
</section>