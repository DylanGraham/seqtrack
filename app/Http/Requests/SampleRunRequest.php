<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SampleRunRequest extends Request
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
          //  'run_id' =>  'required | exists:runs,id',

           // 'sample_id' =>  'required | exists:samples,id',
        ];
    }
}
