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
            'date_of_birth' => 'sometimes|required|date|date_format:Y-m-d',
            'gender' => 'sometimes|required|in:1,2,3',
            'city' => 'sometimes|required|max:25',
            'email' => 'sometimes|required|email|max:150|unique:users,email,' . $this->user()->id,
            'mobile' => 'sometimes|required|mobile_number|unique:users,mobile,' . $this->user()->id,
            'profile_picture' => $this->userProfilePictureRule(),
        ];
    }
}
