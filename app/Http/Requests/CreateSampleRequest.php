<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateSampleRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Change when Auth implemented
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
            'basc_group_id' =>  'required',
            'name'          =>  'required',
            'i7_index_id'   =>  'required',

        ];
    }
}
