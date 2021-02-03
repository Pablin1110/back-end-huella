<?php

namespace App\Http\Requests;

use App\Alcanceuno;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAlcanceunoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('alcanceuno_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:alcanceunos,id',
        ];
    }
}
