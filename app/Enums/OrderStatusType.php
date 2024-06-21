<?php

namespace App\Enums;

enum OrderStatusType: string
{
    case PADDING = 'padding';
    case RECEIVED = 'received';
    case PREPARATION = 'preparation';
    case COMPLETED = 'completed';
}
