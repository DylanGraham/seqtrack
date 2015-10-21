<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AssayRequest extends Request
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
     * Get the validation rules that apply to creating a new Assay form.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => array('required' , 'regex:/^[a-zA-Z0-9]{0,15}$/' , 'max:15','unique:assay,name'),

            'default' => 'required | boolean'
        ];
    }
}
