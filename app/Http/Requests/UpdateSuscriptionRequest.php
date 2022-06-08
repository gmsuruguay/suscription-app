<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSuscriptionRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'email:rfc,dns|string|max:255|unique:suscriptions,email,'.$this->route('suscription')->id,
            'state_id' => 'required|integer|exists:App\Models\State,id'
        ];
    }

    public function messages()
    {
        $messages = [
            'email.max' => 'Solo se permiten 255 caracteres',
            'email.email' => 'Email con formato incorrecto',
            'email.unique' => 'Este dato ya existe',
            'email.required' => 'Este campo es obligatorio',
            'state_id.required' => 'Este campo es obligatorio'                                
        ];
       
        return $messages;
    }
}
