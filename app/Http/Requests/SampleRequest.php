<?php

namespace App\Http\Requests;


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

            'sample_id'     => array( 'required', 'regex:/^[a-zA-Z0-9-_]{1,120}$/' , 'between:6,120', 'unique:samples,sample_id' ),

            'plate' => array('regex:/^[a-zA-Z0-9-]{1,120}$/', 'max:120'),

            'well' => array('regex:/^[a-zA-Z0-9-]{1,120}$/', 'max:120'),

            'i7_index_id'   =>  'required| integer | exists:i7_index,id',

            'i5_index_id'   =>  array('integer','exists:i5_index,id'),

            'description' => array( 'regex:/^[a-zA-Z0-9-_]{1,120}$/' , 'max:120'),

            'runs_remaining' => 'required | integer | between:1,60',

            'instrument_lane' => ' integer | between:1,8'
        ];
    }
}
