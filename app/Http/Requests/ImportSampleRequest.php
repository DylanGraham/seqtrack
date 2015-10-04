<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ImportSampleRequest extends Request
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

            'sampleFile' => array('required', 'mimes:csv,txt'),

            'plate' => array('regex:/^[a-zA-Z0-9-]{1,120}$/' , 'max:120'),

            'well' => array('regex:/^[a-zA-Z0-9-]{1,120}$/', 'max:120'),

            'description' => array('regex:/^[a-zA-Z0-9-]{1,120}$/' , 'max:120'),

            'runs_remaining' => array('required', 'integer', 'between:1,60'),


        ];
    }
}
