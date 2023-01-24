<?php

include_once("../functions.php");
include_once("../dbconn.php");
session_start();

if ( $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["checkout_post"]) ) {
    $user_id = $_SESSION["user"]["id"];

    $quantity = $_POST["quantity"];
    $product_id = $_POST["product_id"];

    
    $query = "SELECT id FROM checkout WHERE user_id = $user_id AND product_id = $product_id";
    $query_run = mysqli_query($conn, $query);
    
    if ( mysqli_num_rows($query_run) === 0 ) {
        $query = "INSERT INTO checkout (user_id, product_id, quantity) VALUES ($user_id, $product_id, $quantity)";
        $query_run = mysqli_query($conn, $query);
    }
    else {
        $query = "UPDATE checkout SET quantity=quantity+$quantity WHERE user_id = $user_id AND product_id = $product_id";
        $query_run = mysqli_query($conn, $query);
    }

    redirect("");
}
else if ( $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["completion"]) ) {
    $money = doubleval($_POST["money"]);
    $user_id = $_SESSION["user"]["id"];

    $query = "UPDATE users SET money=money+$money WHERE id = $user_id";
    $query_run = mysqli_query($conn, $query);

    if ( $query_run ) {
        $query = "DELETE FROM checkout WHERE user_id = $user_id";
        $query_run = mysqli_query($conn, $query);
    }

    redirect("");
}