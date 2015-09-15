<?php

namespace App\Http\Requests;


class ChemistryRequest extends Request
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
            'chemistry' => array('required' , 'regex:/^[a-zA-Z0-9]{0,15}$/' , 'max:15'),

            'default' => 'required | boolean'
        ];
    }
}
