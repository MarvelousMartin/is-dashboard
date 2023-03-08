<?php

namespace App\Enums;

enum ClientStep: string
{
    case REGISTERED = 'Registered';
    case VERIFIED = 'Verified';
    case PREMEDICAL = 'Pre-Medical';
    case MEDICAL = 'Medical';
    case MEDICAL_REJECTED = 'Medical Rejected';
    case MEDICAL_APPROVED = 'Medical Approved';
    case PRELEGAL = 'Pre-Legal';

    /*TODO*/

    public function getTitle(): string
    {
        return match ($this) {
            self::REGISTERED => 'Registered',
            self::VERIFIED => 'Verified',
            self::PREMEDICAL => 'Pre-Medical',
            self::MEDICAL => 'Medical',
            self::MEDICAL_REJECTED => 'Medical Rejected',
            self::MEDICAL_APPROVED => 'Medical Approved',
            self::PRELEGAL => 'Pre-Legal',
        };
    }
}
