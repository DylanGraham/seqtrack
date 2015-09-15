<?php

namespace App\Http\Requests;


class UsersRequest extends Request
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
            'user_id' => array('required' , 'regex:/[a-zA-Z0-9]/' , 'max:10'),

            'default_project_id' =>  'required | exists:project_group,id',

            'name' => array('required' , 'regex:/[a-zA-Z0-9]/' , 'max:50'),

            'default_charge_code' => array('required' , 'regex:/[\d]{4}[-][\d]{5}[-][\d]{2}[-][\d]{3}/' , 'max:17'),

            'super' => 'required | boolean'


        ];
    }
}
