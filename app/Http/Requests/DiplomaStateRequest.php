<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DiplomaStateRequest extends FormRequest
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
            'name' => [
                'required',
                //Rule::unique('diploma_states')->ignore($this->route('diploma_states'))
            ],
            'concept_id' => 'required',
            'status' => 'required',
            'note' => 'nullable'
        ];
    }
}
