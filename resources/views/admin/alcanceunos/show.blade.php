@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.alcanceuno.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.alcanceunos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.alcanceuno.fields.id') }}
                        </th>
                        <td>
                            {{ $alcanceuno->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alcanceuno.fields.usuario') }}
                        </th>
                        <td>
                            {{ $alcanceuno->usuario->id_usuario ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alcanceuno.fields.lugar') }}
                        </th>
                        <td>
                            {{ $alcanceuno->lugar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alcanceuno.fields.equipo') }}
                        </th>
                        <td>
                            {{ $alcanceuno->equipo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alcanceuno.fields.tipo') }}
                        </th>
                        <td>
                            {{ $alcanceuno->tipo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alcanceuno.fields.cantidad_inicial') }}
                        </th>
                        <td>
                            {{ $alcanceuno->cantidad_inicial }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alcanceuno.fields.cantidad_anual') }}
                        </th>
                        <td>
                            {{ $alcanceuno->cantidad_anual }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alcanceuno.fields.factor_emision') }}
                        </th>
                        <td>
                            {{ $alcanceuno->factor_emision }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alcanceuno.fields.emisiones_totales') }}
                        </th>
                        <td>
                            {{ $alcanceuno->emisiones_totales }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.alcanceunos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection