<?php $title = "Emi - Login" ?>
<?php ob_start(); ?>
<!-- Main -->
<main class="container">
    <article class="grid">
        <div>
            <hgroup>
                <h1>Log in</h1>
                <h2>A minimalist layout for Login pages</h2>
            </hgroup>
            <form action="/login" method="post">
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<mark>Please fill in all the form</mark>";
                    } else if ($_GET["error"] == "passwordnomatch") {
                        echo "<mark>Password don't match</mark>";
                    } else if ($_GET["error"] == "invalidemail") {
                        echo "<mark>Invalid email</mark>";
                    } else if ($_GET["error"] == "emailtaken") {
                        echo "<mark>An account already uses this email try to login</mark>";
                    } else if ($_GET["error"] == "userNotFound") {
                        echo "<mark>User not found</mark>";
                    } else if ($_GET["error"] == "messageSend") {
                        echo "<mark>messsage sent</mark>";
                    } else if ($_GET["error"] == "passwordChange") {
                        echo "<mark>password changed</mark>";
                    } else if ($_GET["error"] == "emailNotFound") {
                        echo "<mark>email not found</mark>";
                    }
                }
                ?>
                <input type="text" name="username" placeholder="Login" aria-label="Login" autocomplete="nickname" required>
                <input type="password" name="password" placeholder="Password" aria-label="Password" autocomplete="current-password" required>
                <fieldset>
                    <label for="remember">
                        <input type="checkbox" role="switch" id="remember" name="remember">
                        Remember me
                    </label>
                </fieldset>
                <button type="submit" name="submit" class="contrast">Login</button>
                <p>
                    Je n'ai pas de compte
                    <a href="/signup">S'inscrire</inscrire></a>
                </p>
            </form>
            <p><a href="/forgotPassword">Mot de passe oublié</a></p>
        </div>
        <div></div>
    </article>
</main><!-- ./ Main -->
<?php $content = ob_get_clean(); ?>
<?php require('+layout.php') ?>
