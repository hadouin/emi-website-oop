<?php

class Signup extends Dbh {

    protected function checkUser(string $uid, string $email) : bool
    {
        $stmt = $this->connect()->prepare('SELECT usersUid FROM users WHERE users_uid = ? OR usersEmail = ?;');

        if (!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmt-failed");
            exit();
        }

        return !$stmt->rowCount() > 0;

    }

    protected function setUser(string $uid, string $email, string $password){
        $stmt = $this->connect()->prepare('INSERT INTO users (userUid, usersEmail, usersPwd) VALUES (?,?,?)');
        $hashedPassword = hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($uid, $email, $hashedPassword))) {
            $stmt = null;
            header("location: ../index.php?error=stmt-failed");
            exit();
        }

        $stmt = null;

    }

}