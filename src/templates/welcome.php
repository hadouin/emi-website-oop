<?php $title = "Emi - Welcome" ?>
<?php
ob_start();
session_start();
?>
<header>
    <div class="container welcome-header">
        <div class="cog-svg animate-cog" style="top: -1rem;left: 5rem;"></div>
        <div class="cog-svg animate-cog" style="top: -4rem;right: 17rem;animation-delay: -3s!important;"></div>
        <div class="cog-svg animate-cog" style="bottom: -4rem;right: 9rem;animation-delay: -1s!important;"></div>
        <h1>The APP that cares <span style="color:var(--primary)">for <br/> your workforce</span></h1>
        <p>
            <?php
            if (isset($_SESSION["userId"]) && isset($_SESSION["userUid"])) {
                echo "<b>Logged in as " . $_SESSION["userUid"] . " of Id=" . $_SESSION["userId"] . "</b>";
            }
            ?>
        </p>
        <p>
            Emi est l'entreprise qui va vous accompagner
            pour prendre soin de l'état physique de vos employés
            notre solution de gilets connectés est aujourd'hui
            plus simple que jamais à utiliser sur le site.
        </p>
        <p>
            <a href="" role="button">Se lancer</a>
            <a href="" role="button" class="outline">Connexion</a>
        </p>
    </div>
</header>
<main>

</main>
<?php $content = ob_get_clean(); ?>
<?php require('+layout.php') ?>
