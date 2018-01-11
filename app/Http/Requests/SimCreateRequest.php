<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SimCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pin' => 'required|max:5',
            'sim' => 'required|max:25',
            //
        ];
    }
}
