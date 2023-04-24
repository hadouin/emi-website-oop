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

    <!--Favicons-->
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/icons/favicon-16x16.png">
    <link rel="manifest" href="/assets/icons/site.webmanifest">
    <link rel="mask-icon" href="/assets/icons/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/assets/icons/favicon.ico">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="msapplication-config" content="/assets/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">


</head>
<body>
<!-- Nav -->
<nav class="container">
    <ul style="flex: 1">
        <li>
            <a href="/" class="contrast">
                <div class="emi-logo"></div>
            </a>
        </li>
    </ul>
    <ul class="nav-middle">
        <li><a href='/'>Accueil</a></li>
        <li><a href='#faq'>FAQ</a></li>
        <li><a href='#contact'>Contact</a></li>
    </ul>
    <ul style="flex: 1; justify-content: end">
        <?php
        if (isset($_SESSION["userId"])){
            echo "<li><a href='includes/logout.inc.php' role='button' class='outline' >Log out</a></li>";
        } else {
            echo "<li><a href='/signup'>Sign up</a></li>";
            echo "<li><a href='/login' role='button' >Log in</a></li>";
        }
        ?>
        <li class="theme-switcher">
            <details role="list" dir="rtl" >
                <summary aria-haspopup="listbox" role="link" class="secondary"><i class="icon current-theme-icon"></i></summary>
                <ul role="listbox">
                    <li><a href="#" data-theme-switcher="light">Light</a></li>
                    <li><a href="#" data-theme-switcher="dark">Dark</i></a></li>
                </ul>
            </details>
        </li>
    </ul>
</nav><!-- ./ Nav -->

<!-- Minimal theme switcher -->
<script src="../js/minimal-theme-switcher.js"></script>

<?= $content ?? '<p>No content</p>' ?>

<!-- Footer -->
<footer class="container">
    <small>Built with <a href="https://picocss.com" class="secondary">Pico</a> • <a href="https://github.com/picocss/examples/tree/master/sign-in/" class="secondary">Source code</a></small>
    <div class="footer-content">
        <div class="footer-contact">
            <h3>Nous contacter</h3>
            <p>06 XX XX XX XX</p>
            <p>EMI-support@gmail.com</p>
            <p>10 Rue de Vanves, 92130 Issy-les-Moulineaux</p>
        </div>

        <div class="footer-medias">
            <ul>
                <li><a href="#">GitHub</a></li>
                <li><a>Twitter</a></li>
                <li><a>Instagram</a></li>
            </ul>
        </div>
    </div>
</footer><!-- ./ Footer -->

</body>
</html>