<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RunRequest extends Request
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

            // users id from loged in user


            'project_group_id' =>  'required | integer | exists:project_group,id',

            'instrument_id' => 'required | integer | exists:instrument,id',

            'iem_file_version' => 'required | integer |exists:iem_file_version,id',

            'experiment_name' => array('required' , 'regex:/[_a-zA-Z0-9]/' , 'max:120'),

            // make a date as integar off set from today eg 1 to 7 days from today
            'date' => 'required | integer | between:0,7',

            'work_flow_id' => 'required | integer |exists:work_flow,id',

            'application_id' => 'required |integer | exists:application,id',

            'assay_id' => 'required | integer |exists:assay,id',

            'description' => array('regex:/[a-zA-Z0-9_]/' , 'max:120'),

            'chemistry_id' => 'required |integer | exists:chemistry,id',

            'read1' => 'required | integer | between:20:600',

            'read2' => 'integer | between:1:600',

            'adaptor' =>  'required |integer | exists:adaptor,id',

            'flow_cell' => array('required' , 'regex:/[A-Z0-9]/' , 'max:10'),

            'run_status_id' =>  'required | integer | exists:run_status,id',

        ];
    }
}
