<?php

class SignupController extends Signup {
    private string $uid;
    private string $email;
    private string $password;
    private string $passwordConfirm;

    public function __construct(string $uid, string $email, string $password, string $passwordConfirm){
        $this->uid = $uid;
        $this->email = $email;
        $this->password = $password;
        $this->passwordConfirm = $passwordConfirm;
    }

    public function signupUser(){
        if($this->emptyInput()){
            header("location: ../index.php?error=emptyInput");
            exit();
        }
        if($this->invalidUid()){
            header("location: ../index.php?error=invalidUid");
            exit();
        }
        if($this->invalidEmail()){
            header("location: ../index.php?error=invalidEmail");
            exit();
        }
        if(!$this->passwordMatch()){
            header("location: ../index.php?error=passwordNoMatch");
            exit();
        }
        if($this->uidTaken()){
            header("location: ../index.php?error=uidTaken");
            exit();
        }

        $this->setUser($this->uid, $this->email, $this->password);

    }

    private function emptyInput() : bool {
        return (empty($this->uid) || empty($this->email) || empty($this->password) || empty($this->passwordConfirm));
    }

    private function invalidUid() : bool {
        return !preg_match("/^[a-zA-Z0-9]*$/", $this->uid);
    }

    private function invalidEmail() : bool {
        return !filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    private function passwordMatch() : bool {
        return $this->password == $this->passwordConfirm;
    }

    private function uidTaken() : bool {
        return $this->checkUser($this->uid, $this->email);
    }
}

