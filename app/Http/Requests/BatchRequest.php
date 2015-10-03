<?php

namespace App\Http\Requests;



class BatchRequest extends Request
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

            /* BATCH TABLE FIELDS */

            //  id and date created by database
            //  users id from loged in user

            'batch_name' => array('required' , 'regex:/^[\_a-zA-Z0-9-]{1,60}$/' , 'between:6,60', 'unique:batches,batch_name'),
            'project_group_id' => array( 'required', 'exists:project_group,id'),
            'concentration' => array('numeric', 'between:1,200', 'regex:/^[\d]{1,3}([.][\d]){0,1}$/'),
            'volume' => array('numeric', 'between:1,10000', 'regex:/^[\d]{1,5}([.][\d]){0,1}$/'),
            'tube_bar_code' => array('required' , 'regex:/^[A-Z0-9]{1,60}$/' , 'max:60'),
            'tube_location' => array('required' , 'regex:/^[a-zA-Z0-9_-]{1,60}$/' , 'max:60'),
            'tape_station_length' => 'required | integer | between:50,900',
            'charge_code' => array('required' , 'regex:/^[\d]{4}[-][\d]{5}[-][\d]{2}[-][\d]{3}$/' , 'max:17')
        ];
    }
}
