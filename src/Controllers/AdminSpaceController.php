<?php

namespace Emi\Controllers;

use Emi\model\UserRepository;
require __DIR__ . '/../../vendor/autoload.php';


class AdminSpaceController
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function getAdminSpace() {

        $users = $this->userRepository->getAllUser();
        require_once 'templates/app/adminSpace.php';
    }

    public function addNewUserCode() {
        $code = $this->random_string();
        $this->userRepository->addNewCode($code);
        $users = $this->userRepository->getAllUser();
        header("location: /app/adminSpace");
    }

    public function deleteUserFromId() {
        $userId = $_GET['userId'];
        $this->userRepository->deleteUserFromId($userId);
        header('location: /app/adminSpace');
    }
    function random_string($length=10){
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';
        for($i=0; $i<$length; $i++){
            $string .= $chars[rand(0, strlen($chars)-1)];
        }
        return $string;
    }

}