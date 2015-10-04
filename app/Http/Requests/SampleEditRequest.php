<?php

namespace App\Http\Requests;


class SampleEditRequest extends Request
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

            /*
             * For custom error messages see resources/lang/en/validation.php
             *
             */

            // SAMPLE TABLE FIELDS

            'plate' => array('max:120' , 'regex:/^[a-zA-Z0-9]{1,120}$/', 'max:120'),

            'well' => array('max:120' , 'regex:/^[a-zA-Z0-9]{1,120}$/', 'max:120'),

            'description' => array('regex:/^[a-zA-Z0-9]{1,120}$/' , 'max:120'),

            'runs_remaining' => 'required | integer | between:0,60',

           // 'instrument_lane' => 'required | integer | between:1,8'
        ];
    }
}
