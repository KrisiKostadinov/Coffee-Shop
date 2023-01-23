<?php

session_start();
include_once("../functions.php");
include_once("../dbconn.php");

if ( !$product_id = $_GET["product_id"] ) {
    $_SESSION["message"] = "Invalid product id";
    redirect("");
}

if ( !is_authenticated() ) {
    $_SESSION["message"] = "Not authorized";
    redirect("users/login");
}


if ( $_SERVER["REQUEST_METHOD"] === "GET" ) {
    $user_id = $_SESSION["user"]["id"];
    $product_id = $_GET["product_id"];

    $query = "SELECT * FROM products WHERE id = $product_id AND user_id = $user_id";
    $query_run = mysqli_query($conn, $query);
    
    if ( mysqli_num_rows($query_run) === 0 ) {
        $_SESSION["message"] = "Invalid product id";
        redirect("");
    }

    $product = mysqli_fetch_array($query_run, MYSQLI_ASSOC);
}
else {
    $_SESSION["message"] = "Method not allowed";
    redirect("");
}

include_once("../inc/header.php");

include_once("../inc/navbar.php");
?>

<main>
    <div class="md:w-1/3 mx-auto mt-5">
        <h1 class="text-center text-4xl mb-2"><?= $product["name"] ?></h1>
        <form action="<?= BASE_URL ?>checkout/code.php" method="post">
            <div class="mb-3">
                <label for="quantity">Quantity</label>
                <input type="number" class="w-full border py-2 px-4 pt-2 rounded outline-none inline-block" value="1" name="quantity" min="1" autofocus>
            </div>
            <input type="hidden" name="product_id" value="<?= $product["id"] ?>">
            <button type="submit" class="text-white bg-orange-500 px-5 py-3 rounded shadow" name="checkout_post">Order</button>
        </form>
    </div>
</main>

<?php include_once("../inc/footer.php") ?>