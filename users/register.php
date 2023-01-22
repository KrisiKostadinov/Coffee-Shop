<?php $meta_title = "Sign Up" ?>
<?php $meta_description = "Sign Up after as you sign up in the app you will to sell products wit own coffee shop." ?>

<?php
    session_start();
    include_once("../functions.php");

    if (is_authenticated()) {
        redirect("");
    }

    include_once("../inc/header.php");
    include_once("../dbconn.php");
    include_once("../inc/navbar.php");
?>

<main>
    <div class="text-center md:w-1/3 mx-auto">
        <h1 class="text-4xl my-2">Sign Up</h1>
        <p class="text-slate-900">Sign Up after as you sign up in the app you will to sell products wit own coffee shop.</p>
    </div>

    <div class="md:w-1/3 max-md:px-4 mx-auto mt-10">
        <?php include_once("../inc/message.php") ?>
        <form action="code.php" method="post">
            <div class="mb-3">
                <label for="fullname">Fullname</label>
                <input type="text" class="w-full border py-2 px-4 pt-2 rounded outline-none inline-block" name="fullname">
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="w-full border py-2 px-4 pt-2 rounded outline-none inline-block" name="email">
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" class="w-full border py-2 px-4 pt-2 rounded outline-none inline-block" name="password">
            </div>
            <div class="mb-3">
                <span>Already have account?</span>
                <a href="login.php" class="text-blue-600 font-bold">Sign In</a>
            </div>
            <div>
                <input value="Sign Up" name="register" type="submit" class="px-5 py-3 rounded shadow text-white bg-blue-600 cursor-pointer">
            </div>
        </form>
    </div>

</main>

<?php include_once("../inc/footer.php") ?>