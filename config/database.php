<?php

//CREATING CONNECTION TO DB

$localhost = 'localhost';
$username = 'Godwin';
$password = '123456';
$dbname = 'signup';

$conn = mysqli_connect($localhost, $username, $password, $dbname);

if (mysqli_connect_errno()) {

    //CONNECTION FAILED

    echo "Connections Failed: " . mysqli_connect_errno();
}
