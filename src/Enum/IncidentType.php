<?php

namespace App\Enum;

enum IncidentType: string
{
case NUISANCE = 'nuisance';
case DEGRADATION = 'degradation';
case AUTRE = 'autre';
case TRAVAUX = 'travaux';
case ACCIDENT = 'accident';
case EVENEMENT = 'evenement';
case INFRASTRUCTURE = 'infrastructure';
case SECURITE = 'securite';
               
}

?>