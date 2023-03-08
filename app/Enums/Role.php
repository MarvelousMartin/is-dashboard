<?php

namespace App\Enums;

enum Role: string
{
    case ADMIN = 'Admin';
    case SURROGATE = 'Surrogate';
    case PARENT = 'Parent';
    case DOCTOR = 'Doctor';
    case LEGAL = 'Legal';
    case SUPPORT = 'Support';

    public function getTitle(): string
    {
        return match ($this) {
            self::ADMIN => 'Admin',
            self::CLIENT => 'Client',
            self::DOCTOR => 'Doctor',
            self::LEGAL => 'Legal',
            self::SUPPORT => 'Support',
        };
    }
}
