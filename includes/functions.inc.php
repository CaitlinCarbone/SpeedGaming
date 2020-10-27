<?php

function emptyInputSignup($name, $email, $username, $password, $repeatPassword){
    $result;
    if (empty($name) || empty($email) || empty($username) || empty($password) || empty($repeatPassword)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function pwdMatch($password, $repeatPassword){
    $result;
    if ($password !== $repeatPassword){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function inappropriateName($username, $name, $email){
    $result;
    $file = fopen('../externalResources/profanity.txt', 'r');
    while ($line = fgets($file)){
        if (strpos($username, $line) !== false || strpos($name, $line) !== false || strpos($email, $line) !== false){
            return true;
        }
    }
    $result = false;
    return $result;
}

function uidExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}

function createUser($conn, $name, $email, $username, $password){
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPassword) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?error=none");
    exit();
}

function emptyInputLogin($username, $password){
    $result;
    if (empty($username) || empty($password)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $password){
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPassword"];
    $checkPassword = password_verify($password, $pwdHashed);

    if ($checkPassword === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPassword === true){
        session_start();
        $_SESSION["userid"] =  $uidExists["usersId"];
        $_SESSION["useruid"] =  $uidExists["usersUid"];
        header("location: ../index.php");
        exit();
    }
}