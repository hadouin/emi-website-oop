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

    private int $code;

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
            $code = $_POST["code"];

            // set data
            $this->uid = $uid;
            $this->email = $email;
            $this->password = $password;
            $this->passwordConfirm = $passwordConfirm;
            $this->code = $code;

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
            header("location: /signup?error=emptyInput");
            exit();
        }
        if ($this->invalidUid()) {
            header("location: /signup?error=invalidUid");
            exit();
        }
        if ($this->invalidEmail()) {
            header("location: /signup?error=invalidEmail");
            exit();
        }
        if (!$this->passwordMatch()) {
            header("location: /signup?error=passwordNoMatch");
            exit();
        }

        if ($this->uidTaken()) {
            header("location: /signup?error=uidTaken");
            exit();
        }

        if($this->checkCode()) {
            header("location: /signup?error=codeNotFound");
            exit();
        }

        $this->userRepository->setUser($this->uid, $this->email, $this->password);
        $this->userRepository->clearUsedCode($this->code);
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

    private function checkCode() : bool
    {
        return $this->userRepository->checkCode($this->code);
    }
}

