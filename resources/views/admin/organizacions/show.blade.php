@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.organizacion.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.organizacions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.organizacion.fields.id') }}
                        </th>
                        <td>
                            {{ $organizacion->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizacion.fields.id_usuario') }}
                        </th>
                        <td>
                            {{ $organizacion->id_usuario }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizacion.fields.nombre') }}
                        </th>
                        <td>
                            {{ $organizacion->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizacion.fields.tipo') }}
                        </th>
                        <td>
                            {{ $organizacion->tipo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizacion.fields.sector') }}
                        </th>
                        <td>
                            {{ $organizacion->sector }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizacion.fields.fecha') }}
                        </th>
                        <td>
                            {{ $organizacion->fecha }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizacion.fields.superficie') }}
                        </th>
                        <td>
                            {{ $organizacion->superficie }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizacion.fields.direccion') }}
                        </th>
                        <td>
                            {{ $organizacion->direccion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizacion.fields.empleados') }}
                        </th>
                        <td>
                            {{ $organizacion->empleados }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.organizacions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#usuario_alcanceunos" role="tab" data-toggle="tab">
                {{ trans('cruds.alcanceuno.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#usuario_alcancedos" role="tab" data-toggle="tab">
                {{ trans('cruds.alcancedo.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#usuario_huellas" role="tab" data-toggle="tab">
                {{ trans('cruds.huella.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="usuario_alcanceunos">
            @includeIf('admin.organizacions.relationships.usuarioAlcanceunos', ['alcanceunos' => $organizacion->usuarioAlcanceunos])
        </div>
        <div class="tab-pane" role="tabpanel" id="usuario_alcancedos">
            @includeIf('admin.organizacions.relationships.usuarioAlcancedos', ['alcancedos' => $organizacion->usuarioAlcancedos])
        </div>
        <div class="tab-pane" role="tabpanel" id="usuario_huellas">
            @includeIf('admin.organizacions.relationships.usuarioHuellas', ['huellas' => $organizacion->usuarioHuellas])
        </div>
    </div>
</div>

@endsection