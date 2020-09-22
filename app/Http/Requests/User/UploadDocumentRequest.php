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
            }
        }

        return $validation;
    }
}
