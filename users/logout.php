<?php

session_start();
include_once("../functions.php");
include_once("../dbconn.php");

if ( is_authenticated() ) {
    $id = $_SESSION["user"]["id"];
    unset($_SESSION["access_token"]);
    unset($_SESSION["access_token_expity"]);
    unset($_SESSION["user"]);
    $query = "DELETE FROM sessions WHERE user_id = $id";
    $query_run = mysqli_query($conn, $query);
    redirect("users/login");
}
