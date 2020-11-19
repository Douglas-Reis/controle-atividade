<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateActivityRequest extends FormRequest
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
        $id = $this->segment(2);

        return [
            'name' => "required|min:3|max:255|unique:activities,name,{$id},id",
            'description' => 'required|min:3|max:10000',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatório.',
            'name.unique' => 'Esté nome de atividade já existe.',
            'name.min' => 'Digite um nome com mais de 3 caracteres.',
            'description.required' => 'Descrição é obrigatória.',
            'description.min' => 'Digite uma descrição que tenha mais de 3 caracteres.',
        ];
    }
}
