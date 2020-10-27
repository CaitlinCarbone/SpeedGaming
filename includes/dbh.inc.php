<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "SpeedGaming";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn){
    die("Connection failed: " . mysquli_connect_error());
}