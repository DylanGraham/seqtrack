<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SampleRequest extends Request
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

            'sample_id'     => array( 'required', 'regex:/[a-zA-Z0-9]{1,120}/' , 'max:120', 'unique:samples,sample_id' ),

            'plate' => array('max:120' , 'regex:/^[a-zA-Z0-9]{1,120}$/', 'max:120'),

            'well' => array('max:120' , 'regex:/^[a-zA-Z0-9]{1,120}$/', 'max:120'),

            'i7_index_id'   =>  'required| integer | exists:i7_index,id',

            // TODO check if exits in i5_index set or is NULL
           // 'i5_index_id'   =>  array('integer','exists:i5_index,id'),

            'description' => array('required' , 'regex:/^[a-zA-Z0-9]{1,120}$/' , 'max:120'),

            'runs' => 'required | integer | between:1,60',

            'instrument_lane' => 'required | integer | between:1,8'
        ];
    }
}
