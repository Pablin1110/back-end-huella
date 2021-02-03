@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.huella.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.huellas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.huella.fields.id') }}
                        </th>
                        <td>
                            {{ $huella->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.huella.fields.usuario') }}
                        </th>
                        <td>
                            {{ $huella->usuario->id_usuario ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.huella.fields.alcance_uno') }}
                        </th>
                        <td>
                            {{ $huella->alcance_uno }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.huella.fields.alcance_dos') }}
                        </th>
                        <td>
                            {{ $huella->alcance_dos }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.huellas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection