<?php

session_start();
include_once("../functions.php");

include_once("../inc/header.php");
include_once("../dbconn.php");

include_once("../inc/navbar.php") ?>

<main>
    <div class="grid grid-cols-1 gap-4">
        <div class="container mx-auto">
            <div class="flex items-center justify-between mt-5">
                <h1 class="text-2xl mt-4">My Products</h1>
                <a href="<?= BASE_URL ?>products/create/" class="text-white bg-orange-500 py-3 px-5 rounded ">Create a New Product</a>
            </div>
        </div>
        <?php include_once("../inc/products/menu.php") ?>
    </div>
</main>

<?php include_once("inc/footer.php") ?>