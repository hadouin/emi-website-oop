<?php

namespace Emi\Controllers;
use Emi\model\UserRepository;

require __DIR__ . '/../../vendor/autoload.php';

class SignupController
{
    private string $uid;
    private string $email;
    private string $password;
    private string $passwordConfirm;

    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function get():void
    {
        require_once 'templates/signup.php';
    }

    public function post(): void
    {
        if (isset($_POST["submit"])) {
            // grab data
            $uid = $_POST["uid"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordConfirm = $_POST["password-confirm"];

            // set data
            $this->uid = $uid;
            $this->email = $email;
            $this->password = $password;
            $this->passwordConfirm = $passwordConfirm;

            $this->signupUser();

            header("location: /?error=none");
            exit();
        } else {
            header("location: /signup");
            exit();
        }
    }

    public function signupUser(): void
    {
        if ($this->emptyInput()) {
            header("location: ../welcome.php?error=emptyInput");
            exit();
        }
        if ($this->invalidUid()) {
            header("location: ../welcome.php?error=invalidUid");
            exit();
        }
        if ($this->invalidEmail()) {
            header("location: ../welcome.php?error=invalidEmail");
            exit();
        }
        if (!$this->passwordMatch()) {
            header("location: ../welcome.php?error=passwordNoMatch");
            exit();
        }
        if ($this->uidTaken()) {
            header("location: ../welcome.php?error=uidTaken");
            exit();
        }

        $this->userRepository->setUser($this->uid, $this->email, $this->password);
    }

    private function emptyInput(): bool
    {
        return (empty($this->uid) || empty($this->email) || empty($this->password) || empty($this->passwordConfirm));
    }

    private function invalidUid(): bool
    {
        return !preg_match("/^[a-zA-Z0-9]*$/", $this->uid);
    }

    private function invalidEmail(): bool
    {
        return !filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    private function passwordMatch(): bool
    {
        return $this->password == $this->passwordConfirm;
    }

    private function uidTaken(): bool
    {
        return $this->userRepository->checkUser($this->uid, $this->email);
    }
}

