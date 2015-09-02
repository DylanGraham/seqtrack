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

            /* BATCH TABLE FIELDS */

            //  id and date created by database
            //  users id from loged in user

            'batch_name' => array('required' , 'regex:/^[_a-zA-Z0-9]{1,60}$/' , 'max:60', 'unique:batches,batch_name'),

            'concentration' => array('required' ,'numeric', 'between:1,200', 'regex:/^[\d]{1,3}([.][\d]){0,1}$/'),

            'volume' => array('required' ,'numeric', 'between:1,10000', 'regex:/^[\d]{1,5}([.][\d]){0,1}$/'),

            'tube_bar_code' => array('required' , 'regex:/^[A-Z0-9]{1,60}$/' , 'max:60'),

            'tube_location' => array('required' , 'regex:/^[_a-zA-Z0-9]{1,60}$/' , 'max:60'),

            'tape_station_length' => 'required | integer | between:50,900',

            'charge_code' => array('required' , 'regex:/^[\d]{4}[-][\d]{5}[-][\d]{2}[-][\d]{3}$/' , 'max:17'),


            // SAMPLE TABLE FIELDS

            // batch_id and sample_id created when saved by database ??
            //'batch_id' => 'required|exists:batchs,id',

            'project_group_id' => array( 'required', 'exists:project_group,id'),

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
