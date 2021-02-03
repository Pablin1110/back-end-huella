<?php

namespace App\Http\Requests;

use App\Alcanceuno;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAlcanceunoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('alcanceuno_edit');
    }

    public function rules()
    {
        return [
            'usuario_id'        => [
                'required',
                'integer',
            ],
            'lugar'             => [
                'string',
                'nullable',
            ],
            'equipo'            => [
                'string',
                'required',
            ],
            'tipo'              => [
                'string',
                'required',
            ],
            'cantidad_inicial'  => [
                'numeric',
                'required',
            ],
            'cantidad_anual'    => [
                'numeric',
            ],
            'factor_emision'    => [
                'numeric',
                'required',
            ],
            'emisiones_totales' => [
                'numeric',
                'required',
            ],
        ];
    }
}
