<?php

namespace App\Http\Requests;

use App\Organizacion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOrganizacionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('organizacion_edit');
    }

    public function rules()
    {
        return [
            'id_usuario' => [
                'string',
                'required',
            ],
            'nombre'     => [
                'string',
                'required',
            ],
            'tipo'       => [
                'string',
                'required',
            ],
            'sector'     => [
                'string',
                'required',
            ],
            'fecha'      => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'superficie' => [
                'numeric',
                'required',
            ],
            'direccion'  => [
                'string',
                'required',
            ],
            'empleados'  => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
