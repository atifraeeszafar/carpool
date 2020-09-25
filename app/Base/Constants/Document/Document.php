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

    public static function nationalIdentityCard()
    {
        return [ 
                 'name' => 'required',
                 'gender' => 'required|in:1,2',
                 'identity_card_number' => 'required',
                 'date_of_birth' => 'required|date|date_format:Y-m-d',
                 'date_of_expiry' => 'required|date|date_format:Y-m-d|after:today'
                ];
    }

    public static function nationalIdentityCardOfOverseasPakistan()
    {
    
        return [ 
                'name' => 'required',
                'gender' => 'required|in:1,2',
                'country_of_stay' => 'required',
                'identity_card_number' => 'required',
                'date_of_birth' => 'required|date|date_format:Y-m-d',
                'date_of_expiry' => 'required|date|date_format:Y-m-d|after:today'
       ];

    }
   

    public static function pakistanOriginCard()
    {
        return [ 
                'identity_card_number' => 'required',
                'date_of_issue' => 'required|date|date_format:Y-m-d',
                'date_of_expiry' => 'required|date|date_format:Y-m-d|after:today',
                'name' => 'required',
                'gender' => 'required|in:1,2',
                'date_of_birth' => 'required|date|date_format:Y-m-d',
                'passport_number' => 'required',
                'issuing_state' => 'required',
       ];
    }


    public static function juvenileCard()
    {
        return [ 
                'name' => 'required',
                 'father_name' => 'required',
                 'gender' => 'required|in:1,2',
                 'identity_card_number' => 'required',
                 'date_of_birth' => 'required|date|date_format:Y-m-d',
                 'date_of_expiry' => 'required|date|date_format:Y-m-d|after:today'
       ];

    }

    public static function passport()
    {
        return [
                'passport_country_code' => 'required',
                'passport_number' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required|in:1,2',
                'citizen_number' => 'required',
                'date_of_birth' => 'required|date|date_format:Y-m-d',
                'place_of_birth' => 'required',
                'date_of_issue' => 'required|date|date_format:Y-m-d',
                'date_of_expiry_of_passport' => 'required|date|date_format:Y-m-d|after:today'
       ];

    }

    public static function identityCardsFromForeigners()
    {
        
        return [ 
                'name' => 'required',
                'gender' => 'required|in:1,2',
                'identity_card_number' => 'required',
                'date_of_birth' => 'required|date|date_format:Y-m-d',
                'date_of_expiry' => 'required|date|date_format:Y-m-d|after:today'
       ];

    }

    public static function drivingLicense()
    {
        
        return [ 'name' => 'required',
                'so' => 'sometimes|required',
                'wo' => 'sometimes|required',
                'do' => 'sometimes|required',
                'license_number' => 'required',
                'gender' => 'required|in:1,2',
                'identity_card_number' => 'required',
                'date_of_birth' => 'required|date|date_format:Y-m-d',
                'date_of_expiry' => 'required|date|date_format:Y-m-d|after:today'
       ];

    }

    public static function vehicleIdentificationCard()
    {
        
        return [ 'name' => 'required',
                 'cnic_number' => 'required',
                 'date_of_registraion' => 'required|date|date_format:Y-m-d',
                 'vehicle_registraion_number' => 'required',
       ];

    }
    










}