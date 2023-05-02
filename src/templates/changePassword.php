<?php use Emi\model\UserRepository;

$title = "Emi - ForgotPassword" ?>
<?php ob_start();
session_start();
?>
<?php if(isset($_GET['token']) && $_GET['token'] != ''){
    $user = new UserRepository;
    $email = $user->getEmailFromToken($_GET['token']);
    if($email) {
        ?>
        <html>
        <main class="container">
            <div>
                <form action="/changePassword" method="post">
                    <input type="password" name="new_password" placeholder="new password" aria-label="new_password" autocomplete="new_password" required>
                    <input type="password" name="new_passwordC" placeholder="confirm your password" aria-label="new_password" autocomplete="new_password" required>
                    <input type="submit" value="Valider" name="pass_submit">
                </form>
            </div>
            <?php if(isset($error)) {echo $error;} ?>
        </main>
        </html>
        <?php
    }
    else {
        echo "trouvé";
    }
} else {
    echo "TEST";
}

$content = ob_get_clean(); ?>
<?php require('+layout.php') ?><?php
