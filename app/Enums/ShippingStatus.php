<?php

namespace App\Enums;

enum ShippingStatus: string
{
    case ORDERED = 'Expedition crée';
    case DEPOSITED = 'Paquet(s) arrivé(s) à l\'entrepot';
    case ONWAY = 'Expédition en cours';
    case ARRIVED = 'Paquet(s) arrivé(s) à destination';
    case DELIVERED = 'Fin de l\'expédition';
}