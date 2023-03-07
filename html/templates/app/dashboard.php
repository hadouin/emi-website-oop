<?php $title = "Emi - App" ?>
<?php ob_start(); ?>
    <!-- Main -->
    <main class="container">
        <p>Welcome to app</p>
    </main><!-- ./ Main -->
<?php $content = ob_get_clean(); ?>
<?php require('+layout.php') ?>