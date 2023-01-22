<div class="text-white bg-orange-500 py-2 px-4">
    <div class="container mx-auto flex justify-between items-center">
        <div>
            <a href="<?= BASE_URL ?>" class="text-2xl">Coffee Shop</a>
        </div>
        <nav>
            <?php if ( !is_authenticated() ): ?>
                <ul class="flex gap-2">
                    <li>
                        <a href="<?= BASE_URL ?>users/login" class="py-3 px-2 inline-block">Sign In</a>
                    </li>
                    <li>
                        <a href="<?= BASE_URL ?>users/register" class="py-3 px-2 inline-block">Sign Up</a>
                    </li>
                </ul>
            <?php else: ?>
                <ul class="flex gap-2">
                    <li>
                        <a href="<?= BASE_URL ?>" class="py-3 px-2 inline-block"><?= $_SESSION["user"]["fullname"] ?></a>
                    </li>
                    <li>
                        <a href="<?= BASE_URL ?>users/logout" class="py-3 px-2 inline-block">Logout</a>
                    </li>
                </ul>
            <?php endif; ?>
        </nav>
    </div>
</div>