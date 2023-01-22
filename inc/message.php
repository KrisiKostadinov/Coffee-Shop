<?php if ( isset($_SESSION["message"]) ): ?>
    <div class="bg-orange-400 py-3 px-5 mb-4 rounded border border-orange-600 shadow">
        <?= $_SESSION["message"] ?>
    </div>
    <?php unset($_SESSION["message"]) ?>
<?php endif; ?>