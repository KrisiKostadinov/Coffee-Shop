<?php $meta_title = "Sign In" ?>
<?php $meta_description = "Sign In to sell products with own coffee shop." ?>

<?php include_once("../functions.php") ?>
<?php include_once("../inc/header.php") ?>
<?php include_once("../dbconn.php") ?>
<?php session_start() ?>

<?php include_once("../inc/navbar.php") ?>

<main>
    <div class="text-center md:w-1/3 mx-auto">
        <h1 class="text-4xl my-2">Sign In</h1>
        <p class="text-slate-900">Sign In to sell products with own coffee shop.</p>
    </div>

    <div class="md:w-1/3 max-md:px-4 mx-auto mt-4">
        <?php include_once("../inc/message.php") ?>
        <form action="code.php" method="post">
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="w-full border py-2 px-4 pt-2 rounded outline-none inline-block" name="email">
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" class="w-full border py-2 px-4 pt-2 rounded outline-none inline-block" name="password">
            </div>
            <div class="mb-3">
                <span>Dont have account?</span>
                <a href="register" class="text-blue-600 font-bold">Sign Up</a>
            </div>
            <div>
                <input type="submit" name="login" value="Sign In" class="px-5 py-3 rounded shadow text-white bg-blue-600 cursor-pointer">
            </div>
        </form>
    </div>

</main>

<?php include_once("../inc/footer.php") ?>