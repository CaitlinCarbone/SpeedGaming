<link rel="stylesheet" href="css/header.css">
<div class="headerBox">
    <a class="tab" href="index.php">Home</a>
    <?php
    if (isset($_SESSION["useruid"])){
        echo "<a class='tab' href='profile.php'>My Profile</a>";
        echo "<a class='tab' href='includes/logout.inc.php'>Logout</a>";
        echo "<a class='tab' href='findPlayer.php'>Find Player</a>";
    }
    else{
        echo "<a class='tab' href='login.php'>Login</a>";
        echo "<a class='tab' href='signup.php'>Sign Up</a>";
    }
    ?>
</div>
