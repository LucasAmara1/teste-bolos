<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmailRequest extends FormRequest
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
            'endereco_email' => 'required|email',
            'id_bolo' => 'required',
            'id_bolo' => 'exists:bolos,id'
        ];
    }

     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'endereco_email.required' => 'O campo email é obrigatório.',
            'endereco_email.email' => 'Digite um email válido.',
            'id_bolo.required' => 'O campo bolo é obrigatório.',
            'id_bolo.exists' => 'O bolo selecionado é inválido.',
        ];
    }
}
