<?php $meta_title = "Coffee Ordering System" ?>
<?php $meta_description = "Welcome to coffee ordering system" ?>

<?php
session_start();
include_once("functions.php");

include_once("inc/header.php");
include_once("dbconn.php");

include_once("inc/navbar.php") ?>

<main>
    <div class="grid grid-cols-1 gap-4">
        <h1 class="text-center text-4xl mt-4">Welcome to coffee ordering system</h1>
        <?php include_once("inc/products/menu.php") ?>
        <div class="container mx-auto">
            <?php include_once("inc/message.php") ?>
        </div>
        <?php include_once("inc/home/order.php") ?>
    </div>
</main>

<?php include_once("inc/footer.php") ?>