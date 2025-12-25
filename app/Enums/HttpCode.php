<?php

namespace App\Enums;

enum HttpCode: int
{
    case DEFAULT   = 200;
    case CREATE    = 201;
    case OK        = 204;
    case INVALID   = 400;
    case AUTH      = 401;
    case FORBIDDEN = 403;
    case NOT_FOUND = 404;
}
