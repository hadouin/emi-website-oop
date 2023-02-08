<?php
namespace model;

use DatabaseConnection;
use model\Entities\User;

class UserRepository {

    public DatabaseConnection $database;

    public function getUserMatchingPwd(string $uid, string $password): User
    {
        $stmt = $this->database->getConnection()->prepare('SELECT users_pwd FROM users WHERE users_uid = ?;');

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

        $pwdHashed = $stmt->fetch();
        $checkPwd = password_verify($password, $pwdHashed["users_pwd"]);

        if (!$checkPwd){
            $stmt = null;
            header("location: ../login.php?error=wrongPassword");
            exit();
        } else {

            $stmt = $this->database->getConnection()->prepare('SELECT * FROM users WHERE users_uid = ?');

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

            $userFetchedRow = $stmt->fetch();

            $resUser = new User();
            $resUser->id = $userFetchedRow["users_id"];
            $resUser->username = $userFetchedRow["users_uid"];
            $resUser->email = $userFetchedRow["users_email"];

            return $resUser;
        }
    }

    public function setUser(string $uid, string $email, string $password): void
    {
        $stmt = $this->database->getConnection()->prepare("INSERT INTO users (users_uid, users_email, users_pwd) VALUES (?,?,?)");
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($uid, $email, $hashedPassword))) {
            $stmt = null;
            header("location: ../index.php?error=stmt-failed");
            exit();
        }

        $stmt = null;
    }

    public function checkUser(string $uid, string $email) : bool
    {
        $stmt = $this->database->getConnection()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');

        if (!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmt-failed");
            exit();
        }

        return $stmt->rowCount() > 0;

    }

}