<?php

namespace App\Http\Requests;

use App\Http\Requests\CustomFormRequest;

class AlunoRequestUpdate extends CustomFormRequest
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
            'cpf' => 'required|string|size:11',
            'email' => 'required|email|max:255',
            'nome' => 'required|string|max:255',
        ];
    }
}
