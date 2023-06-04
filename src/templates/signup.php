<?php $title = "Emi - Signup" ?>
<?php ob_start(); ?>
    <!-- Main -->
    <main class="container">
        <article class="grid">
            <div>
                <hgroup>
                    <h1>Sign up</h1>
                    <h2>here you sign up</h2>
                </hgroup>
                <form action="/signup" method="post">
                    <input type="text" name="uid" placeholder="username" aria-label="username" required>
                    <input type="email" name="email" placeholder="email@example.com" aria-label="email" required>
                    <input type="password" name="password" placeholder="Password" aria-label="Password" required>
                    <input type="password" name="password-confirm" placeholder="Confirm password" aria-label="Confirm password" required>
                    <fieldset>
                        <label for="agree">
                            <input type="checkbox" role="checkbox" id="agree" name="agree">
                            I agree to terms & conditions
                        </label>
                    </fieldset>
                    <button type="submit" name="submit" class="contrast">Sign up</button>
                    <?php
                    if (isset($_GET["error"])){
                        if ($_GET["error"] == "emptyInput"){
                            echo "<mark>Please fill in all the form</mark>";
                        } else if ($_GET["error"] == "wrongLogin") {
                            echo "<mark>Wrong login or password</mark>";
                        } else if ($_GET["error"] == "passwordNoMatch") {
                            echo "<mark>Password don't match</mark>";
                        }
                    }
                    ?>
                </form>
            </div>
            <div></div>
        </article>
    </main><!-- ./ Main -->
<?php $content = ob_get_clean(); ?>
<?php require('+layout.php') ?>
