<?php

namespace App\Enum;

enum EtatType: string
{
    case OUVERT = 'ouvert';
    case EN_COURS = 'en_cours';
    case RESOLU = 'resolu';
}
