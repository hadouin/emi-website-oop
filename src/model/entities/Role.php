<?php

namespace Emi\model\entities;

enum Role: string
{
    case ADMIN = "admin";
    case MANAGER = "manager";
    case USER = "user";

    public function getRoleString(): string
    {
        switch ($this) {
            case self::ADMIN:
                return "Administrateur";
            case self::MANAGER:
                return "Manager";
            case self::USER:
                return "Utilisateur";
            default:
                return "";
        }
    }
}