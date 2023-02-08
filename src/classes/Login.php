<?php

class Login extends Dbh
{
    protected function getUser(string $uid, string $password) {
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ?;');


        if (!$stmt->execute(array($uid))) {
            $stmt = null;
            header("location: ../index.php?error=stmtFailed");
            exit();
        }

        if($stmt->rowCount() == 0){
            $stmt = null;
            header("location: ../login.php?error=userNotFound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($password, $pwdHashed[0]["users_pwd"]);

        if (!$checkPwd){
            $stmt = null;
            header("location: ../login.php?error=wrongPassword");
            exit();
        } else {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ?');

            if (!$stmt->execute(array($uid))) {
                $stmt = null;
                header("location: ../login.php?error=stmtFailed");
                exit();
            }

            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../login.php?error=userNotFound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["userId"] = $user[0]["users_id"];
            $_SESSION["userUid"] = $user[0]["users_uid"];

        }

        $stmt = null;

    }
}