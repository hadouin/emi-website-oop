<?php use Emi\model\UserRepository;
session_start();
/**
 * @var $email
 */
$title = "Emi - ForgotPassword" ?>
<?php ob_start();
?>
<?php if(isset($_GET['token']) && $_GET['token'] != ''){
    if($email) {
        $_SESSION["email"] = $email;
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
            <?php if(isset($_SESSION['error'])) {echo $_SESSION['error'];  unset($_SESSION['error']);} ?>
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
