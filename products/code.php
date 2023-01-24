<?php

include_once("../functions.php");
include_once("../dbconn.php");
session_start();

if ( !empty($_POST) && isset($_POST["create"]) ) {

    $name = $_POST["name"];
    $slug = $_POST["slug"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $user_id = $_SESSION["user"]["id"];

    if ( empty($name) || empty($price) || empty($quantity) || empty($slug) ) {
        $_SESSION["message"] = "All fields are required";
        redirect("products/create");
    }

    $query = "INSERT INTO products
        (name, slug, price, quantity, user_id)
        VALUES ('$name', '$slug', '$price', $quantity, $user_id)";
    try {
        $query_run = mysqli_query($conn, $query);
    } catch (Exception $error) {
        echo $error;
    }

    if ( !$query_run ) {
        $_SESSION["message"] = "Database problem: " . mysqli_error($conn);
        redirect("products/create");
    }

    $_SESSION["message"] = "Successfully created";
    redirect("products");
}