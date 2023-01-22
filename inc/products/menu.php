<?php

$user_id = $_SESSION["user"]["id"];
$query = "SELECT * FROM products WHERE user_id = $user_id";
$query_run = mysqli_query($conn, $query);

if ( $query_run ) {
    $products = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
}
?>

<div class="w-full">
    <h2 class="text-2xl mb-5">Menu</h2>
    <ul class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 w-full">
        <?php foreach($products as $product): ?>
            <a href="?key=<?= $product["id"] ?>" class="flex flex-col justify-center items-center rounded-lg shadow border-4 py-9">
                <span class="md:text-lg text-2xl"><?= $product["name"] ?></span>
                <span class="text-lg">$<?= number_format($product["price"], 2) ?></span>
            </a>
        <?php endforeach; ?>
    </ul>
</div>