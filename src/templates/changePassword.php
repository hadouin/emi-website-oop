<?php use Emi\model\UserRepository;
session_start();
/**
 * @var $email
 */
$title = "Emi - ForgotPassword" ?>
<?php ob_start();
?>
<?php if(isset($_GET['token']) && $_GET['token'] != ''){
    if(!empty($email)) {
        $_SESSION["email"] = $email;
        ?>
        <html>
        <head>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const newPswInput = document.getElementById('newPsw');
                    const newPswCInput = document.getElementById('newPswC');
                    const form = document.querySelector('form');

                    function validatePassword() {
                        const newPsw = newPswInput.value;
                        const newPswC = newPswCInput.value;

                        if (newPsw.length < 8) {
                            newPswInput.setCustomValidity('Le mot de passe doit contenir au moins 8 caractères.');
                        } else if (newPsw !== newPswC) {
                            newPswCInput.setCustomValidity('Les mots de passe ne correspondent pas.');
                        } else {
                            newPswInput.setCustomValidity('');
                            newPswCInput.setCustomValidity('');
                        }
                    }

                    newPswInput.addEventListener('input', validatePassword);
                    newPswCInput.addEventListener('input', validatePassword);

                    form.addEventListener('submit', function() {
                        newPswInput.reportValidity();
                        newPswCInput.reportValidity();
                    });
                });
            </script>
        </head>
        <main class="container">
            <div>
                <form action="/changePassword" method="post">
                    <input type="password" name="new_password" id="newPsw" placeholder="new password" aria-label="new_password" autocomplete="new_password" required>
                    <input type="password" name="new_passwordC" id="newPswC" placeholder="confirm your password" aria-label="new_password" autocomplete="new_password" required>
                    <input type="submit" value="Valider" name="pass_submit">
                </form>
            </div>
        </main>
        </html>
        <?php
    }
    else {
        header('location: /login?error=emailNotFound');
    }
} else {
    echo "TEST";
}

$content = ob_get_clean(); ?>
<?php require('+layout.php') ?><?php
