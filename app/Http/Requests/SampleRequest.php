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
            'project_group_id' =>  'required',
            'sample_id'     =>  'required',
            'i7_index_id'   =>  'required',

        ];
    }
}
