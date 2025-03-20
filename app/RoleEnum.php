<?php

namespace App;

enum RoleEnum: int
{
    case ADMIN = 1;
    case OWNER = 2;
    case USER = 3;
}
