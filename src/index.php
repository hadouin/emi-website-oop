<?php
include_once 'header.php';
?>
<main class="container">
    <section id="welcome">
        <h2>Welcome to the website</h2>
        <p>A simple login setup using php</p>
        <?php
        if (isset($_SESSION["userId"]) && isset($_SESSION["userUid"])){
            echo "<b>Logged in as " . $_SESSION["userUid"] . " of Id=" . $_SESSION["userId"] . "</b>";
        }
        ?>
    </section>
</main>
<?php
include_once 'footer.php';
?>

