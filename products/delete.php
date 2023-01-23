<?php $meta_title = "Delete Product" ?>

<?php
session_start();
include_once("../functions.php");
include_once("../dbconn.php");

if ( !is_authenticated() ) {
    redirect("users/login");
}

if ($id = $_GET["id"]) {
    $query = "SELECT id FROM products WHERE id = $id";
    $query_run = mysqli_query($conn, $query);
    
    if ( mysqli_num_rows($query_run) > 0 ) {
        $query = "DELETE FROM products WHERE id = $id";
        $query_run = mysqli_query($conn, $query);

        if ( $query_run ) {
            redirect("products");
        }
        else {
            $_SESSION["message"] = "Invalid product id";
        }
    }
    else {
        $_SESSION["message"] = "Invalid product id";
    }
}
else {
    $_SESSION["message"] = "Invalid product id";
}

include_once("../inc/header.php");

include_once("../inc/navbar.php");
?>

<main>
    <div class="text-center md:w-1/3 mx-auto mt-5">
        <h1 class="text-4xl mb-2">Delete Product</h1>
        <?php include_once("../inc/message.php") ?>
    </div>
</main>

<?php include_once("../inc/footer.php") ?>