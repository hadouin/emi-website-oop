<?php
include_once 'header.php';
?>

<!-- Main -->
<main class="container">
    <article class="grid">
        <div>
            <hgroup>
                <h1>Log in</h1>
                <h2>A minimalist layout for Login pages</h2>
            </hgroup>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="username" placeholder="Login" aria-label="Login" autocomplete="nickname" required>
                <input type="password" name="password" placeholder="Password" aria-label="Password" autocomplete="current-password" required>
                <fieldset>
                    <label for="remember">
                        <input type="checkbox" role="switch" id="remember" name="remember">
                        Remember me
                    </label>
                </fieldset>
                <button type="submit" name="submit" class="contrast" >Login</button>
                <?php
                if (isset($_GET["error"])){
                    if ($_GET["error"] == "emptyinput"){
                        echo "<mark>Please fill in all the form</mark>";
                    } else if ($_GET["error"] == "passwordnomatch") {
                        echo "<mark>Password don't match</mark>";
                    } else if ($_GET["error"] == "invalidemail") {
                        echo "<mark>Invalid email</mark>";
                    } else if ($_GET["error"] == "emailtaken") {
                        echo "<mark>An account already uses this email try to login</mark>";
                    }
                }
                ?>
            </form>
        </div>
        <div></div>
    </article>
</main><!-- ./ Main -->

<?php
include_once 'footer.php';
?>
