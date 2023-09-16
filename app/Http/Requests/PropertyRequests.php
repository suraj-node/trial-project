<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequests extends FormRequest
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
            'county'                =>  'required|string',
            'country'               =>  'required',
            'town'                  =>  'required',
            'display_address'       =>  'required',
            'number_of_bedrooms'    =>  'required',
            'number_of_bathrooms'   =>  'required',
            'price'                 =>  'required',
            'property_type'         =>  'required',
            'type'                  =>  'required',
            'description'           =>  'required',
        ];
    }
}
