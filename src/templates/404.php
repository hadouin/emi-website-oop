<?php $title = "Emi - NotFound" ?>
<?php
ob_start();
session_start();
?>
<header>
    <div class="container">
        <h1>404</h1>
        <p>page not found</p>
    </div>
</header>
<?php $content = ob_get_clean(); ?>
<?php require('+layout.php') ?>
