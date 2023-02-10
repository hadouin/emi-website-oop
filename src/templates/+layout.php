<?php
if(empty(session_id())) session_start();
/**
 * @var $title
 * @var $content
 */
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?= $title ?? 'Emi Website' ?></title>
    <link rel="stylesheet" href="css/pico.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
<!-- Nav -->
<nav class="container-fluid">
    <ul>
        <li><a href="index.php" class="contrast"><strong>Brand</strong></a></li>
    </ul>
    <ul>
        <li>
            <details role="list" dir="rtl">
                <summary aria-haspopup="listbox" role="link" class="secondary">Theme</summary>
                <ul role="listbox">
                    <li><a href="#" data-theme-switcher="auto">Auto</a></li>
                    <li><a href="#" data-theme-switcher="light">Light</a></li>
                    <li><a href="#" data-theme-switcher="dark">Dark</a></li>
                </ul>
            </details>
        </li>
        <?php
        if (isset($_SESSION["userId"])){
            echo "<li><a href='..' onclick='event.preventDefault()'>Profile</a></li>";
            echo "<li><a href='includes/logout.inc.php' >Log out</a></li>";
        } else {
            echo "<li><a href='./signup'>Sign up</a></li>";
            echo "<li><a href='./login'>Log in</a></li>";
        }
        ?>
    </ul>
</nav><!-- ./ Nav -->

<!-- Minimal theme switcher -->
<script src="../js/minimal-theme-switcher.js"></script>

<?= $content ?? '<p>No content</p>' ?>

<!-- Footer -->
<footer class="container-fluid">
    <small>Built with <a href="https://picocss.com" class="secondary">Pico</a> • <a href="https://github.com/picocss/examples/tree/master/sign-in/" class="secondary">Source code</a></small>
</footer><!-- ./ Footer -->

</body>
</html>