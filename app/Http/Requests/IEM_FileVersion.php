<?php

namespace App\Http\Requests;



class IEM_FileVersion extends Request
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
            'file_version' => array('required' , 'regex:/^[a-zA-Z0-9]{0,10}$/' , 'max:10'),

            'default' => 'required | boolean'
        ];
    }
}
