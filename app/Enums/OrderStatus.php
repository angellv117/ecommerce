<?php

namespace App\Enums;

enum OrderStatus : int
{ 
    case PENDING = 1;
    case PROCESSING = 2;
    case SHIPPED = 3;
    case COMPLETED = 4;
    case CANCELLED = 5;
    case FAILED = 6;
    case REFUNDED = 7;
}
