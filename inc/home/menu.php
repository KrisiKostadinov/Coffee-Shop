<?php


$products = [
    [
        "key" => "coffee",
        "value" => "Coffee",
    ],
    [
        "key" => "espresso",
        "value" => "Espresso",
    ],
    [
        "key" => "late",
        "value" => "Late",
    ],
    [
        "key" => "tea",
        "value" => "Tea",
    ]
];

?>

<div class="container mx-auto">
    <ul class="grid grid-cols-4 gap-5 w-1/2 mx-auto">
        <?php foreach($products as $product): ?>
            <a
                href="?key=<?= $product["key"] ?>"
                class="w-full h-40 flex justify-center items-center rounded shadow text-2xl">
                <span><?= $product["value"] ?></span>
            </a>
        <?php endforeach; ?>
    </ul>
</div>