<?php $title = "Emi - Welcome" ?>
<?php

use Emi\model\entities\Role;
ob_start();
session_start();
?>
<header>
    <div class="container welcome-header">
        <div class="cog-svg animate-cog" style="top: -1rem;left: 5rem;"></div>
        <div class="cog-svg animate-cog" style="top: -4rem;right: 17rem;animation-delay: -3s!important;"></div>
        <div class="cog-svg animate-cog" style="bottom: -1rem;right: 9rem;animation-delay: -1s!important;"></div>
        <h1>The APP that cares <span style="color:var(--primary)">for <br/> your workforce</span></h1>
        <p>
            <?php
            if (isset($_SESSION["userId"]) && isset($_SESSION["userUid"])) {
                echo "<b>Logged in as " . $_SESSION["userUid"] . " of id=" . $_SESSION["userId"] . "</b>";
            }
            ?>
        </p>
        <p>
            Emi est l'entreprise qui va vous accompagner
            pour prendre soin de l'état physique de vos employés
            notre solution de gilets connectés est aujourd'hui
            plus simple que jamais à utiliser sur le site.
        </p>
        <?php if(isset($_SESSION["userId"])) {
            echo "<p><a href='/app' role='button'>Get started</a></p>";
            ?>
        <?php
        }
        ?>
    </div>
</header>
<main class="container">
    <section id="about">
            <h2>Functions</h2>
             <div class="grid">
                <div>
                    <img src="/assets/icons/activity.svg" alt="activity-icon" class="filter-to-emi-primary">
                    <h4>Heart-rate</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, quisquam!</p>
                </div>
                 <div>
                     <img src="/assets/icons/volume-2.svg" alt="volume-icon" class="filter-to-emi-primary">
                     <h4>Sound level</h4>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur cupiditate enim magnam molestias quaerat rerum soluta velit.</p>
                 </div>
                 <div>
                     <img src="/assets/icons/wind.svg" alt="wind-icon" class="filter-to-emi-primary">
                     <h4>Air quality</h4>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis nam quae vel.</p>
                 </div>
                 <div>
                     <img src="/assets/icons/thermometer.svg" alt="thermometer-icon" class="filter-to-emi-primary">
                     <h4>Temperature</h4>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa cum deleniti dolorum molestiae nemo rem.</p>
                 </div>
             </div>
    </section>
    <section id="faq">
        <h2>Frequently asked questions</h2>
        <details>
            <summary>Question number one ?</summary>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci asperiores consequatur, delectus eligendi eum facere harum illo iste molestias natus odio odit provident, ullam? Eligendi eum incidunt temporibus ut vitae!
            </p>
        </details>
        <details>
            <summary>Question number two ?</summary>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci asperiores consequatur, delectus eligendi eum facere harum illo iste molestias natus odio odit provident, ullam? Eligendi eum incidunt temporibus ut vitae!
            </p>
        </details>
        <details>
            <summary>Question number three ?</summary>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci asperiores consequatur, delectus eligendi eum facere harum illo iste molestias natus odio odit provident, ullam? Eligendi eum incidunt temporibus ut vitae!
            </p>
        </details>
        <details>
            <summary>Question number four ?</summary>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci asperiores consequatur, delectus eligendi eum facere harum illo iste molestias natus odio odit provident, ullam? Eligendi eum incidunt temporibus ut vitae!
            </p>
        </details>
    </section>
    <section id="contact">
        <form method="post" action="/contact">
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" placeholder="Nom">
            <small>Entrez votre nom</small>
            <label for="text">Text</label>
            <textarea id="text" name="text"></textarea>
            <button type="submit" name="submit">Submit</button>
        </form>
    </section>
</main>
<?php $content = ob_get_clean(); ?>
<?php require('+layout.php') ?>
