<?php

namespace App\Controllers;
use App\model;

class SignupController
{
    private string $uid;
    private string $email;
    private string $password;
    private string $passwordConfirm;

    public function __construct(string $uid, string $email, string $password, string $passwordConfirm)
    {
        $this->uid = $uid;
        $this->email = $email;
        $this->password = $password;
        $this->passwordConfirm = $passwordConfirm;
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

        (new model\UserRepository)->setUser($this->uid, $this->email, $this->password);
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
        return (new model\UserRepository)->checkUser($this->uid, $this->email);
    }
}

