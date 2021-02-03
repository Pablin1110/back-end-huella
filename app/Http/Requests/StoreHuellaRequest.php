<?php

namespace App\Http\Requests;

use App\Huella;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHuellaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('huella_create');
    }

    public function rules()
    {
        return [
            'usuario_id'  => [
                'required',
                'integer',
            ],
            'alcance_uno' => [
                'numeric',
                'required',
            ],
            'alcance_dos' => [
                'numeric',
                'required',
            ],
        ];
    }
}
