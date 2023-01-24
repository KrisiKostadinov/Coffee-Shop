<?php

$meta_title = "My Products";

session_start();
include_once("../functions.php");

include_once("../inc/header.php");
include_once("../dbconn.php");

if (is_authenticated()) {
    $user_id = $_SESSION["user"]["id"];
    $query = "SELECT * FROM products WHERE user_id = $user_id";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $products = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
    } else {
        $_SESSION["message"] = "No products yet";
    }
} else {
    redirect("users/login");
}

include_once("../inc/navbar.php") ?>

<main>
    <div class="container mx-auto px-5">
        <div class="grid grid-cols-1 gap-4">
            <div class="flex items-center justify-between my-5">
                <h1 class="text-2xl mt-4">My Products</h1>
                <a href="<?= BASE_URL ?>products/create/" class="text-white bg-orange-500 py-3 px-5 rounded ">
                    Create a New Product
                </a>
            </div>
        </div>

        <?php include_once("../inc/message.php") ?>

        <div class="container mx-auto">

            <?php if (!empty($products)): ?>
                <ul class="grid grid-cols-8 gap-5">
                    <?php foreach ($products as $product): ?>
                        <div class="relative w-40 h-40 flex flex-col justify-center items-center rounded-lg shadow border-4">
                            <span class="text-2xl">
                                <?= $product["name"] ?>
                            </span>
                            <span class="text-lg">$
                                <?= number_format($product["price"], 2) ?>
                            </span>
                            <a href="<?= BASE_URL ?>products/delete/<?= $product["id"] ?>" class="absolute right-2 top-0 text-2xl text-red-500">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p class="bg-slate-200 py-3 px-5 border-2 rounded shadow">No products yet</p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php include_once("../inc/footer.php") ?>