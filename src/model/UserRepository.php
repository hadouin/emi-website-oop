<?php
namespace Emi\model;

use Emi\model\DatabaseConnection;
use Emi\model\entities\User;

require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/model/entities/User.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/model/DatabaseConnection.php');

class UserRepository {

    public DatabaseConnection $database;

    public function __construct()
    {
        $this->database = new DatabaseConnection();
    }

    public function getUserMatchingPwd(string $uid, string $password): User
    {
        $stmt = $this->database->getConnection()->prepare('SELECT user_pwd FROM user WHERE user_uid = ?;');

        if (!$stmt->execute(array($uid))) {
            $stmt = null;
            header("location: ../welcome?error=stmtFailed");
            exit();
        }

        if($stmt->rowCount() == 0){
            $stmt = null;
            header("location: ../login?error=userNotFound");
            exit();
        }

        $pwdHashed = $stmt->fetch();
        $checkPwd = password_verify($password, $pwdHashed["user_pwd"]);

        if (!$checkPwd){
            $stmt = null;
            header("location: ../login?error=wrongPassword");
            exit();
        } else {

            $stmt = $this->database->getConnection()->prepare('SELECT * FROM user WHERE user_uid = ?');

            if (!$stmt->execute(array($uid))) {
                $stmt = null;
                header("location: ../login?error=stmtFailed");
                exit();
            }

            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../login?error=userNotFound");
                exit();
            }

            $userFetchedRow = $stmt->fetch();

            $resUser = new User();
            $resUser->setId($userFetchedRow["user_id"]);
            $resUser->setUsername($userFetchedRow["user_uid"]);
            $resUser->setEmail($userFetchedRow["user_email"]);

            return $resUser;
        }
    }

    public function setUser(string $uid, string $email, string $password): void
    {
        $stmt = $this->database->getConnection()->prepare("INSERT INTO user (user_uid, user_email, user_pwd) VALUES (?,?,?)");
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($uid, $email, $hashedPassword))) {
            $stmt = null;
            header("location: ../welcome?error=stmt-failed");
            exit();
        }

        $stmt = null;
    }

    public function clearUsedCode($code)
    {
        $stmt = $this->database->getConnection()->prepare("DELETE FROM accessCode WHERE code = ?");
        if (!$stmt->execute(array($code))) {
            $stmt = null;
            header("location: ../welcome?error=stmt-failed");
            exit();
        }

        $stmt = null;
    }

    public function checkUser(string $uid, string $email) : bool
    {
        $stmt = $this->database->getConnection()->prepare('SELECT user_uid FROM user WHERE user_uid = ? OR user_email = ?;');

        if (!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("location: ../welcome?error=stmt-failed");
            exit();
        }

        return $stmt->rowCount() > 0;

    }

    public function checkCode($code)
    {
        $stmt = $this->database->getConnection()->prepare('SELECT id FROM accessCode WHERE code = ?;');

        if (!$stmt->execute(array($code))) {
            $stmt = null;
            header("location: ../welcome?error=stmt-failed");
            exit();
        }

        return $stmt->rowCount() == 0;
    }

    public function checkUserFromEmail(string $email) : bool
    {
        $stmt = $this->database->getConnection()->prepare('SELECT user_uid FROM user WHERE user_email = ?;');

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("location: ../welcome?error=stmt-failed");
            exit();
        }

        return $stmt->rowCount() > 0;

    }

    public function setToken(string $token, string $email) : void {
        $stmt = $this->database->getConnection()->prepare('UPDATE user SET token = ? WHERE user_email = ?');
        if (!$stmt->execute(array($token, $email))) {
            $stmt = null;
            header("location: ../welcome?error=stmt-failed");
            exit();
        }

        $stmt = null;
    }

    public function getEmailFromToken(string $token) {
        $stmt = $this->database->getConnection()->prepare('SELECT user_email FROM user WHERE token = ?');
        if (!$stmt->execute([$token])) {
            $stmt = null;
            header("location: ../welcome?error=stmt-failed");
            exit();
        }

        return $stmt->fetchColumn();
    }

    public function changePassword(string $email, string $newPassword) {
        $stmt = $this->database->getConnection()->prepare('UPDATE user SET user_pwd = ?, token = NULL WHERE user_email = ?');
        $hashedPwd = password_hash($newPassword, PASSWORD_DEFAULT);
        if (!$stmt->execute([$hashedPwd, $email])) {
            $stmt = null;
            header("location: ../welcome?error=stmt-failed");
            exit();
        }

        $stmt = null;
    }

}