<?php

namespace App\Http\Requests\Master;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'question'=>'required|regex:/[a-zA-Z0-9\s]+/|max:5',
            'answer'=>'required|regex:/[a-zA-Z0-9\s]+/|max:5'
        ];
    }
}
