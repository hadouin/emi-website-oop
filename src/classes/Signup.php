<?php

class Signup extends Dbh {

    protected function checkUser(string $uid, string $email) : bool
    {
        $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');

        if (!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmt-failed");
            exit();
        }

        return $stmt->rowCount() > 0;

    }

    protected function setUser(string $uid, string $email, string $password){
        $stmt = $this->connect()->prepare("INSERT INTO users (users_uid, users_email, users_pwd) VALUES (?,?,?)");
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($uid, $email, $hashedPassword))) {
            $stmt = null;
            header("location: ../index.php?error=stmt-failed");
            exit();
        }

        $stmt = null;

    }

}