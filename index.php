<?php $meta_title = "Coffee Ordering System" ?>
<?php $meta_description = "Welcome to coffee ordering system" ?>

<?php
session_start();
include_once("functions.php");

include_once("inc/header.php");
include_once("dbconn.php");

include_once("inc/navbar.php") ?>

<main>
    <div class="flex flex-col gap-4">
        <?php if ( !is_authenticated() ): ?>
            <h1 class="text-center text-4xl mt-4">Welcome to coffee ordering system</h1>
        <?php endif; ?>
        <?php if ( is_authenticated() ): ?>
            <div class="container mx-auto mt-5">
                <?php include_once("inc/message.php") ?>
            </div>
            <div class="grid md:grid-cols-2 gap-5 px-5">
                <?php include_once("inc/products/menu.php") ?>
                <?php include_once("inc/products/order.php") ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php include_once("inc/footer.php") ?>