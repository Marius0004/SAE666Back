<?php

namespace App\Enum;

enum IncidentType: string
{
case NUISANCE = 'nuisance';
case DEGRADATION = 'degradation';
case AUTRE = 'autre';
}

?>