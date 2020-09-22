<?php

namespace App\Base\Constants\Document;

class Document
{
    const NATIONAL_IDENTITY_CARD = '1';
    const NATIONAL_IDENTITY_CARD_OF_OVERSEAS_PAKISTAN = '2';
    const PAKISTAN_ORIGIN_CARD = '3';
    const JUVENILE_CARD = '4';
    const PASSPORT = '5';
    const IDENTITY_CARDS_FROM_FOREIGNERS = '6';
    const DRIVING_LICENSE = '7';
    const VEHICLE_IDENTIFICATION_CARD = '8';

    public static function NATIONAL_IDENTITY_CARD()
    {
        return [ 'name','gender','identity_card_number','date_of_birth','date_of_expiry'];
    }
   
}