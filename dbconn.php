<?php

$hsot = "localhost";
$user = "root";
$password = "root";
$dbname = "coffee-shop";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (mysqli_connect_error()) {
    die("Database connection error: " . mysqli_connect_error());
}