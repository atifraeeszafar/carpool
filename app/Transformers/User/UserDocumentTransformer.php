<?php

namespace App\Transformers\User;

use App\Models\User;
use App\Base\Constants\Auth\Role;
use App\Transformers\Transformer;
use App\Transformers\Access\RoleTransformer;
use App\Models\UserDocuments;
use App\Base\Constants\Document\Document;
use App\Base\Constants\Document\DocumentStatus;

class UserDocumentTransformer extends Transformer
{
    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [
        // 'roles','document'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(UserDocuments $userDocument)
    {
        $params = [
            'id' => $userDocument->id,
            'document_id' => $userDocument->document_id,
            'image' => $userDocument->image,
            'document_status' => $userDocument->document_status,

        ];
        if($userDocument->document_status == DocumentStatus::UPLOADED) {
            $params['document_status_text'] = 'UPLOADED';            
        }else if($userDocument->document_status == DocumentStatus::APPROVED) {
            $params['document_status_text'] = 'APPROVED';            
        }else if($userDocument->document_status == DocumentStatus::REJECTED) {
            $params['document_status_text'] = 'REJECTED';            
        }  

        if($userDocument->document_id == Document::NATIONAL_IDENTITY_CARD) {
            $params['document_name'] = 'NATIONAL_IDENTITY_CARD';            
        }else if($userDocument->document_id == Document::NATIONAL_IDENTITY_CARD_OF_OVERSEAS_PAKISTAN) {
            $params['document_name'] = 'NATIONAL_IDENTITY_CARD_OF_OVERSEAS_PAKISTAN';            
        }else if($userDocument->document_id == Document::PAKISTAN_ORIGIN_CARD) {
            $params['document_name'] = 'PAKISTAN_ORIGIN_CARD';            
        }else if($userDocument->document_id == Document::JUVENILE_CARD) {
            $params['document_name'] = 'JUVENILE_CARD';            
        }else if($userDocument->document_id == Document::PASSPORT) {
            $params['document_name'] = 'PASSPORT';            
        }else if($userDocument->document_id == Document::IDENTITY_CARDS_FROM_FOREIGNERS) {
            $params['document_name'] = 'IDENTITY_CARDS_FROM_FOREIGNERS';            
        }else if($userDocument->document_id == Document::DRIVING_LICENSE) {
            $params['document_name'] = 'DRIVING_LICENSE';            
        }else if($userDocument->document_id == Document::VEHICLE_IDENTIFICATION_CARD) {
            $params['document_name'] = 'VEHICLE_IDENTIFICATION_CARD';            
        }

        $documentJson = (array) json_decode($userDocument->extra_fields);
        $params  = array_merge($params,$documentJson);

        return $params;
    }
    
}
