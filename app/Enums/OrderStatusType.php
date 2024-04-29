<?php

namespace App\Enums;

enum OrderStatusType: string
{
    case RECEIVED = 'received';
    case PREPARATION = 'preparation';
    case COMPLETED = 'completed';
}
