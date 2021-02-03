<?php

namespace App\Http\Requests;

use App\Alcancedo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAlcancedoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('alcancedo_edit');
    }

    public function rules()
    {
        return [
            'usuario_id'        => [
                'required',
                'integer',
            ],
            'periodo_inicial'   => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'periodo_final'     => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'ubicacion'         => [
                'string',
                'required',
            ],
            'nombre'            => [
                'string',
                'required',
            ],
            'consumo'           => [
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
