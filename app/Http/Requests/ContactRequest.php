<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|max:255',
            'email' => 'required|email',
            'comentario' => 'required|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo Nombre es obligatorio',
            'nombre.max' => 'El campo Nombre no puede exceder los 255 caracteres',

            'email.required' => 'El campo Email es obligatorio',
            'email.email' => 'El campo Email debe tener un formato correcto',

            'comentario.required' => 'El campo "comentario" es obligatorio',
            'comentario.max' => 'El campo "comentario" no debe exceder los 1000 caracteres',
        ];
    }
}
