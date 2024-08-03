<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgendamentoRequest extends FormRequest
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
            //
            'data' => ['required'],
            'cliente_nome' => ['required'],
            'cliente_telefone' => ['required'],
            'imovel_id' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'data.required' => 'Uma data é obrigatória',
            'cliente_nome.required' => 'Um nome do cliente é obrigatório',
            'cliente_telefone.required' => 'Um telefone do cliente é obrigatório',
            'imovel_id.required' => 'Um id do imóvel é obrigatório'
        ];
    }
}
