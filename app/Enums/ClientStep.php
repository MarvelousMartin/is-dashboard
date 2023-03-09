<?php

namespace App\Enums;

enum ClientStep: string
{
    case REGISTERED = 'Registered';
    case VERIFIED = 'Verified';
    case MATCHING = 'Matching';
    case PREMEDICAL = 'Pre-Medical';
    case SCREENING = 'Screening';
    case LEGAL = 'Legal';
    case EMBRYO_TRANSFER = 'Embryo Transfer';
    case PREGNANCY = 'Pregnancy';
    case DELIVERY = 'Delivery';
    case ARCHIVED = 'Archived';
}
