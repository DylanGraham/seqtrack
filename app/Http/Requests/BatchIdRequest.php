<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BatchIdRequest extends Request
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
     * Get the validation rules that apply to SampleRunController that gets a array list of batch ID's
     * that have samples to be included in a run.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'batch_check_id'  => 'required'
        ];
    }
}
