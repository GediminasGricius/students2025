<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|min:2|max:20',
            'surname'=>'required|min:2|max:20',
            'email'=>'required|email',
            'phone'=>'required|numeric',
        ];
    }
    public function messages(): array
    {
        return [
            'name'=>  __('Field name is required, min:2 max:20'),
            'surname'=> __('Field surname is required, min:2 max:20'),
        ];
    }
}


