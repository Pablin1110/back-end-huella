@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.alcancedo.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.alcancedos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.alcancedo.fields.id') }}
                        </th>
                        <td>
                            {{ $alcancedo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alcancedo.fields.usuario') }}
                        </th>
                        <td>
                            {{ $alcancedo->usuario->id_usuario ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alcancedo.fields.periodo_inicial') }}
                        </th>
                        <td>
                            {{ $alcancedo->periodo_inicial }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alcancedo.fields.periodo_final') }}
                        </th>
                        <td>
                            {{ $alcancedo->periodo_final }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alcancedo.fields.ubicacion') }}
                        </th>
                        <td>
                            {{ $alcancedo->ubicacion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alcancedo.fields.nombre') }}
                        </th>
                        <td>
                            {{ $alcancedo->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alcancedo.fields.consumo') }}
                        </th>
                        <td>
                            {{ $alcancedo->consumo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alcancedo.fields.factor_emision') }}
                        </th>
                        <td>
                            {{ $alcancedo->factor_emision }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alcancedo.fields.emisiones_totales') }}
                        </th>
                        <td>
                            {{ $alcancedo->emisiones_totales }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.alcancedos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection