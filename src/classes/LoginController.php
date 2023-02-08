<?php

class LoginController extends Login
{
    private string $uid;
    private string $password;

    public function __construct(string $uid, string $password){
        $this->uid = $uid;
        $this->password = $password;
    }

    public function loginUser(): void {

        if($this->emptyInput()){
            header("location: ../index.php?error=emptyInput");
            exit();
        }

        $this->getUser($this->uid, $this->password);

    }

    private function emptyInput() : bool {
        return (empty($this->uid) || empty($this->password));
    }

}