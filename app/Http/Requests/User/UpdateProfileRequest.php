<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;

class UpdateProfileRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'sometimes|required|max:50',
            'gender_based_search' => 'sometimes|required',
            'email' => 'sometimes|required|email|max:150|unique:users,email,' . $this->user()->id,
            'mobile' => 'sometimes|required|mobile_number|unique:users,mobile,' . $this->user()->id,
            'profile_picture' => $this->userProfilePictureRule(),
        ];
    }
}
