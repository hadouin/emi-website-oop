document.addEventListener('DOMContentLoaded', function() {
    const pswInput = document.getElementById('psw');
    const confirmPswInput = document.getElementById('confirmPsw');
    const form = document.getElementById('form');

    function validatePassword() {
        const psw = pswInput.value;
        const confirmPsw = confirmPswInput.value;

        if (psw.length < 8) {
            pswInput.setCustomValidity('Password must be at least 8 characters long.');
        } else if (psw !== confirmPsw) {
            confirmPswInput.setCustomValidity('Passwords do not match.');
        } else {
            pswInput.setCustomValidity('');
            confirmPswInput.setCustomValidity('');
        }
    }

    pswInput.addEventListener('input', validatePassword);
    confirmPswInput.addEventListener('input', validatePassword);

    form.addEventListener('submit', function() {
        pswInput.reportValidity();
        confirmPswInput.reportValidity();
    });
});
