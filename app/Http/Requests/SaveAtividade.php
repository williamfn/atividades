<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveAtividade extends FormRequest
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
            'nome' => 'required|max:255',
            'descricao' => 'required|max:600',
            'data_inicio' => 'required|date_format:d/m/Y',
            'data_fim' => 'required_if:status,4|nullable|date_format:d/m/Y',
            'status' => 'nullable|in:1,2,3,4',
            'situacao' => 'nullable|in:A,I'
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
            'required' => 'O campo :attribute é obrigatório',
            'max' => 'O campo :attribute não pode ter mais que :max caracteres',
            'date_format' => 'A :attribute não possui o formato DD/MM/YYYY',
            'data_fim.required_if' => 'O campo :attribute precisa ser preenchido quando o campo Status for igual a "Concluído"',
            'in' => 'O valor do campo :attribute é inválido',
        ];
    }

}
