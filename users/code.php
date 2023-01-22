<?php

include_once("../functions.php");
include_once("../dbconn.php");
session_start();

if ( !empty($_POST) && isset($_POST["register"]) ) {
    
    // read input
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // start validatins
    if ( empty($email) || empty($password) || empty($fullname) ) {
        $_SESSION["message"] = "All fields is required";
        redirect("users/register");
    }

    if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
        $_SESSION["message"] = "Invalid email address";
        redirect("users/register");
    }
    // end validatins

    // hash password
    $password = password_hash($password, PASSWORD_BCRYPT);
    
    $query = "INSERT INTO users
        (fullname, email, password)
        VALUES ('$fullname', '$email', '$password')";
    try {
        $query_run = mysqli_query($conn, $query);
    } catch ( Exception $error ) {
        $_SESSION["message"] = "Database error: " . $error;
        redirect("users/register");
    }

    if (!$query_run) {
        $_SESSION["message"] = "Database error: " . mysqli_error($conn);
        redirect("users/register");
    }

    $_SESSION["message"] = "Registered successfully";
    redirect("users/login");
}
else if ( !empty($_POST) && isset($_POST["login"]) ) {

    // read input
    $email = $_POST["email"];
    $password = $_POST["password"];

    // start validatins
    if ( empty($email) || empty($password) ) {
        $_SESSION["message"] = "All fields is required";
        redirect("users/register");
    }

    if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
        $_SESSION["message"] = "Invalid email address";
        redirect("users/register");
    }
    // end validatins

    $query = "SELECT * FROM users WHERE email = '$email'";
    try {
        $query_run = mysqli_query($conn, $query);
    } catch (Exception $error) {
        echo mysqli_error($conn);
        exit;
    }

    if ( mysqli_num_rows($query_run) === 0 ) {
        $_SESSION["message"] = "Invalid email or password";
        redirect("users/login");
    }

    $user = mysqli_fetch_array($query_run, MYSQLI_ASSOC);

    // check password
    if ( !password_verify($password, $user["password"]) ) {
        $_SESSION["message"] = "Invalid email or password";
        redirect("users/login");
    }

    $user_id = $user["id"];

    // check is logged in now
    $query = "SELECT * FROM sessions WHERE user_id = $user_id";
    try {
        $query_run = mysqli_query($conn, $query);
    } catch (Exception $error) {
        echo mysqli_error($conn);
        exit;
    }

    if ( $query_run && $session_user = mysqli_fetch_array($query_run, MYSQLI_ASSOC)) {
        if ( intval($session_user["access_token_expiry"]) > time() ) {
            $_SESSION["message"] = "You are logged in";
            redirect("");
        }
        else {
            $query = "DELETE FROM sessions WHERE user_id = $user_id";
            $query_run = mysqli_query($conn, $query);
        }
    }

    // generate token
    $access_token = base64_encode(hash_hmac("sha256", $email, true) . time());
    $access_token_expiry = time() + 3600; // 60 minites

    // make query
    $query = "INSERT INTO sessions
        (user_id, access_token, access_token_expiry)
        VALUES ($user_id, '$access_token', $access_token_expiry)";

    try {
        $query_run = mysqli_query($conn, $query);
    } catch ( Exception $error ) {
        $_SESSION["message"] = $error;
        redirect("users/login");
    }

    if ( !$query_run ) {
        echo mysqli_error($conn);
        exit;
    }

    $_SESSION["message"] = "Successfully Login";
    $_SESSION["access_token"] = $access_token;
    $_SESSION["access_token_expiry"] = $access_token_expiry;
    redirect("");
}