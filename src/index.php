<?php
include_once 'header.php';
?>
<main class="container">
    <section id="welcome">
        <h2>Welcome to the website</h2>
        <p>A simple login setup using php</p>
        <?php
        if (isset($_SESSION["userFirstName"]) && isset($_SESSION["userLastName"])){
            echo "<b>Logged in as " . $_SESSION["userFirstName"] . " " . $_SESSION["userLastName"] ."</b>";
        }
        ?>
    </section>
</main>
<?php
include_once 'footer.php';
?>

