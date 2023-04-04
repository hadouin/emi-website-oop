<?php

namespace Emi\model\entities;

enum Role: string
{
    case ADMIN = "admin";
    case MANAGER = "manager";
    case USER = "user";
}