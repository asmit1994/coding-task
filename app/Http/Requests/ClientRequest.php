<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'name' => 'required|min:2',
            'gender' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'address' => 'required|min:3',
            'nationality' => 'required|min:3',
            'date_of_birth' => 'required',
            'preferred_contact' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name field is required!'
        ];
    }
}
