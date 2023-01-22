<?php

$user_id = $_SESSION["user"]["id"];
$query = "SELECT * FROM products WHERE user_id = $user_id";
$query_run = mysqli_query($conn, $query);

if ( $query_run ) {
    $products = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
}
?>

<div class="container mx-auto">
    <ul class="grid grid-cols-8 gap-5">
        <?php foreach($products as $product): ?>
            <a
                href="?key=<?= $product["name"] ?>"
                class="w-40 h-40 flex justify-center items-center rounded-lg shadow border-4 text-2xl">
                <span><?= $product["name"] ?></span>
            </a>
        <?php endforeach; ?>
    </ul>
</div>