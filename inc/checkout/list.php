<?php

$user_id = $_SESSION["user"]["id"];

$query = "SELECT
    p.price AS price,
    p.name AS name,
    c.quantity AS quantity,
    p.price * c.quantity AS total
    FROM products p, checkout c
    WHERE c.user_id = $user_id AND c.product_id = p.id";

$query_run = mysqli_query($conn, $query);

if ( $query_run ) {
    $products = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

    $query = "SELECT
    SUM(p.price * c.quantity) AS total
    FROM products AS p, checkout AS c
    WHERE c.user_id = $user_id AND c.product_id = p.id";

    $query_run = mysqli_query($conn, $query);
    $total_sum = mysqli_fetch_array($query_run, MYSQLI_ASSOC);
}
?>

<div class="container mx-auto">
    <h2 class="text-2xl mb-5">Order</h2>
    
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Product name</th>
                    <th scope="col" class="px-6 py-3">Product Price</th>
                    <th scope="col" class="px-6 py-3">Quantity</th>
                    <th scope="col" class="px-6 py-3">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($products as $product): ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $product["name"] ?></th>
                        <td class="px-6 py-4">$<?= number_format($product["price"], 2) ?></td>
                        <td class="px-6 py-4"><?= $product["quantity"] ?></td>
                        <td class="px-6 py-4">$<?= number_format($product["total"], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="flex items-center justify-between mt-5">
        <?php if ( count($products) > 0 ): ?>
            <form action="<?= BASE_URL ?>checkout/code.php" method="post">
                <input type="hidden" name="money" value="<?= $total_sum["total"] ?>">
                <button name="completion" class="text-white bg-orange-500 px-5 py-3 rounded shadow">Proceed Order</button>
            </form>
        <?php endif; ?>
        <div class="text-right">
            <p class="text-2xl">$<?= number_format($total_sum["total"], 2) ?></p>
        </div>
    </div>
</div>