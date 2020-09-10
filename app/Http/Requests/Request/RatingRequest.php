<?php

namespace App\Http\Requests\Request;

use App\Http\Requests\BaseRequest;

class RatingRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rating'  => 'required|numeric|min:1|max:5',
            'comment'  => 'required',
           
        ];
    }
}
