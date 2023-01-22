<?php

define("BASE_URL", "/coffee-shop/");

function redirect($value, $code = 200) {
    http_response_code($code);
    header("Location: " . BASE_URL . $value);
    exit;
}

function is_authenticated() {
    if ( isset($_SESSION["user"]) ) {
        return true;
    }
    return false;
}