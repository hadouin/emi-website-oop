<?php $title = "Emi - ForgotPassword" ?>
<?php ob_start();
session_start();
?><html>
    <main class="container">
        <div>
            <form action="/forgotPassword" method="post">
                <input type="email" name="recup_email" placeholder="your email" aria-label="Email" autocomplete="email" required>
                <input type="submit" value="Valider" name="recup_submit">
            </form>
        </div>
    </main>
    </html>
<?php $content = ob_get_clean(); ?>
<?php require('+layout.php') ?>