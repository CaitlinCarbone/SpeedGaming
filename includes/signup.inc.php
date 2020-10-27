<?php

if (isset($_POST["submit"])) {
    $name = $_POST["fullName"];
    $email = $_POST["emailID"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $repeatPassword = $_POST["repeatPassword"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($name, $email, $username, $password, $repeatPassword) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if(invalidUid($username) !== false){
        header("location: ../signup.php?error=invaliduid");
        exit();
    }
    if(pwdMatch($password, $repeatPassword) !== false){
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }
    if(uidExists($conn, $username, $email) !== false){
        header("location: ../signup.php?error=usernametaken");
        exit();
    }
    if(inappropriateName($username, $name, $email) !== false){
        header("location: ../signup.php?error=inappropriateName");
        exit();
    }

    createUser($conn, $name, $email, $username, $password);
}
else{
    header("location: ../signup.php");
    exit();
}