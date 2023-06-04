<?php
use Emi\model\entities\Role;
if(empty(session_id())) session_start();
/**
 * @var $title
 * @var $content
 */
?>
<html lang="fr" dir="ltr" data-theme="light">
<head>
    <meta charset="utf-8">
    <title><?= $title ?? 'Emi App' ?></title>
    <link rel="stylesheet" href="/assets/css/app.css">
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

    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

</head>
<body>
<!-- Nav -->
<nav class="sidebar">
    <header>
        <div class="image-text">
                <span class="image">
                    <img src="/assets/img/Hadouin-JISEP.png" alt="">
                </span>

            <div class="text logo-text">
                <span class="name">Emi</span>
                <span class="profession">Hadouin LEROY</span>
            </div>
        </div>

        <div class="toggle">
            <i data-feather="chevron-right"></i>
        </div>
    </header>

    <div class="menu-bar">
        <div class="menu">

            <li class="search-box">
                <div class="icon"><i data-feather="search"></i></div>
                <input type="text" placeholder="Search...">
            </li>

            <ul class="menu-links">
                <li class="nav-link">
                    <a href="/app">
                        <div class="icon"><i data-feather="pie-chart"></i></div>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="/app/workers">
                        <div class="icon"><i data-feather="users"></i></div>
                        <span class="text nav-text">Workers</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="#">
                        <div class="icon"><i data-feather="box"></i></div>
                        <span class="text nav-text">Devices</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="#">
                        <div class="icon"><i data-feather="sliders"></i></div>
                        <span class="text nav-text">Settings</span>
                    </a>
                </li>
                <?php
                if(isset($_SESSION['userRole'])) {
                    if($_SESSION['userRole'] === Role::ADMIN) {?>
                <li class="nav-link">
                    <a href="/app/adminSpace">
                        <div class="icon"><i data-feather="settings"></i></div>
                        <span class="text nav-text">Admin emi</span>
                    </a>
                </li>
                <?php
                    }
                }
                ?>

            </ul>
        </div>

        <div class="bottom-content">
            <li class="">
                <a href="/includes/logout.inc.php">
                    <div class="icon">
                        <i data-feather="log-out"></i>
                    </div>
                    <span class="text nav-text">Logout</span>
                </a>
            </li>

            <li class="mode">
                <div class="sun-moon">
                    <div class="icon moon">
                        <i data-feather="moon"></i>
                    </div>
                    <div class="icon sun">
                        <i data-feather="sun"></i>
                    </div>
                </div>
                <span class="mode-text text">Dark mode</span>

                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li>

        </div>
    </div>
</nav>

<?= $content ?? '<p>No content</p>' ?>

</body>
<!-- Minimal theme switcher -->
<script src="/assets/js/minimal-theme-switcher.js"></script>
<script src="/assets/js/app/theme-switch-sidebar.js"></script>
<script>
    feather.replace()
</script>

</html>x