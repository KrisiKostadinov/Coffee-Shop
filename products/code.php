<?php

include_once("../functions.php");
include_once("../dbconn.php");
session_start();

if ( !empty($_POST) && isset($_POST["create"]) ) {

    $name = $_POST["name"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $user_id = $_SESSION["user"]["user_id"];

    if ( empty($name) || empty($price) || empty($quantity) ) {
        $_SESSION["message"] = "All fields are required";
        redirect("products/create");
    }

    $query = "INSERT INTO products
        (name, price, quantity, user_id)
        VALUES ('$name', $price, $quantity, $user_id)";
    try {
        $query_run = mysqli_query($conn, $query);
    } catch (Exception $error) {
        echo $error;
    }

    if ( !$query_run ) {
        $_SESSION["message"] = "Database problem";
        redirect("products/create");
    }

    $_SESSION["message"] = "Successfully created";
    redirect("products");
}