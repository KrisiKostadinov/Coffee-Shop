<?php $meta_title = "New Product" ?>
<?php $meta_description = "Create new product for your shop." ?>

<?php
session_start();
include_once("../functions.php");

if ( !is_authenticated() ) {
    redirect("users/login");
}

include_once("../inc/header.php");

include_once("../inc/navbar.php");
?>

<main>
    <div class="text-center md:w-1/3 mx-auto mt-5">
        <h1 class="text-4xl mb-2">New Product</h1>
        <p class="text-slate-900">Create new product for your shop.</p>
    </div>

    <div class="md:w-1/3 max-md:px-4 mx-auto mt-10">
        <?php include_once("../inc/message.php") ?>
        <form action="<?= BASE_URL ?>products/code.php" method="post">
            <div class="grid grid-cols-2 gap-5">
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="w-full border py-2 px-4 pt-2 rounded outline-none inline-block" name="name">
                </div>
                <div class="mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" class="w-full border py-2 px-4 pt-2 rounded outline-none inline-block" name="slug">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div class="mb-3">
                    <label for="price">Price</label>
                    <input type="text" class="w-full border py-2 px-4 pt-2 rounded outline-none inline-block" name="price">
                </div>
                <div class="mb-3">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="w-full border py-2 px-4 pt-2 rounded outline-none inline-block" name="quantity">
                </div>
            </div>
            <div class="mb-3">
                <button type="button" class="text-blue-600 font-bold" onclick="history.back()">Cancel</button>
            </div>
            <div>
                <input value="Create The Product" name="create" type="submit" class="px-5 py-3 rounded shadow text-white bg-blue-600 cursor-pointer">
            </div>
        </form>
    </div>

</main>

<?php include_once("../inc/footer.php") ?>