<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;
use App\Base\Constants\Document\Document;

class UploadDocumentRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $validation = array();
        $validation['document_id'] = 'required';

        if( $this->has('document_id')  ) {

            if($this->document_id == Document::NATIONAL_IDENTITY_CARD) {
                $validation  = array_merge($validation,Document::nationalIdentityCard());
            }else if($this->document_id == Document::NATIONAL_IDENTITY_CARD_OF_OVERSEAS_PAKISTAN) {
                $validation  = array_merge($validation,Document::nationalIdentityCardOfOverseasPakistan());
            }else if($this->document_id == Document::PAKISTAN_ORIGIN_CARD) {
                $validation  = array_merge($validation,Document::pakistanOriginCard());
            }else if($this->document_id == Document::JUVENILE_CARD) {
                $validation  = array_merge($validation,Document::juvenileCard());
            }else if($this->document_id == Document::PASSPORT) {
                $validation  = array_merge($validation,Document::passport());
            }else if($this->document_id == Document::IDENTITY_CARDS_FROM_FOREIGNERS) {
                $validation  = array_merge($validation,Document::identityCardsFromForeigners());
            }else if($this->document_id == Document::DRIVING_LICENSE) {
                $validation  = array_merge($validation,Document::drivingLicense());
            }else if($this->document_id == Document::VEHICLE_IDENTIFICATION_CARD) {
                $validation  = array_merge($validation,Document::vehicleIdentificationCard());
            }                       
        }

        return $validation;
    }
}
