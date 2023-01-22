<?php

session_start();
include_once("../functions.php");

if ( is_authenticated() ) {
    unset($_SESSION["access_token"]);
    unset($_SESSION["access_token_expity"]);
    unset($_SESSION["user"]);
    redirect("users/login");
}