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

        echo "<pre>";
        print_r( Document::NATIONAL_IDENTITY_CARD() );

        die();

        if( $this->has('document_id') == 1  ) {

        }

        return [
            'name' => 'sometimes|required|max:50',
            'gender_based_search' => 'sometimes|required',
            'email' => 'sometimes|required|email|max:150|unique:users,email,' . $this->user()->id,
            'mobile' => 'sometimes|required|mobile_number|unique:users,mobile,' . $this->user()->id,
            'profile_picture' => $this->userProfilePictureRule(),
        ];
    }
}
