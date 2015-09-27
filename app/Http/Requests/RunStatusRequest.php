<?php

namespace App\Http\Requests;


class RunStatusRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'status' => array('required' , 'regex:/^[a-zA-Z0-9]{0,20}$/' , 'max:20'),

            'default' => 'required | boolean'
        ];
    }
}
