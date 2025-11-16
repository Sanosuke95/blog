<?php

namespace App\Enum;

enum HttpCode: String
{
    case SUCCESS = "200";
    case UNAUTHORIZED = "401";
    case FORBIDDEN = "403";
    case NOT_FOUND = "404";
    case BAD_REQUEST = "400";
    case ERROR_SERVOR = "500";
}
