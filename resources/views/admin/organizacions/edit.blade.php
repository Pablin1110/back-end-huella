@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.organizacion.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.organizacions.update", [$organizacion->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="id_usuario">{{ trans('cruds.organizacion.fields.id_usuario') }}</label>
                <input class="form-control {{ $errors->has('id_usuario') ? 'is-invalid' : '' }}" type="text" name="id_usuario" id="id_usuario" value="{{ old('id_usuario', $organizacion->id_usuario) }}" required>
                @if($errors->has('id_usuario'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_usuario') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.organizacion.fields.id_usuario_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nombre">{{ trans('cruds.organizacion.fields.nombre') }}</label>
                <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre', $organizacion->nombre) }}" required>
                @if($errors->has('nombre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.organizacion.fields.nombre_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tipo">{{ trans('cruds.organizacion.fields.tipo') }}</label>
                <input class="form-control {{ $errors->has('tipo') ? 'is-invalid' : '' }}" type="text" name="tipo" id="tipo" value="{{ old('tipo', $organizacion->tipo) }}" required>
                @if($errors->has('tipo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tipo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.organizacion.fields.tipo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sector">{{ trans('cruds.organizacion.fields.sector') }}</label>
                <input class="form-control {{ $errors->has('sector') ? 'is-invalid' : '' }}" type="text" name="sector" id="sector" value="{{ old('sector', $organizacion->sector) }}" required>
                @if($errors->has('sector'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sector') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.organizacion.fields.sector_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha">{{ trans('cruds.organizacion.fields.fecha') }}</label>
                <input class="form-control date {{ $errors->has('fecha') ? 'is-invalid' : '' }}" type="text" name="fecha" id="fecha" value="{{ old('fecha', $organizacion->fecha) }}" required>
                @if($errors->has('fecha'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fecha') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.organizacion.fields.fecha_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="superficie">{{ trans('cruds.organizacion.fields.superficie') }}</label>
                <input class="form-control {{ $errors->has('superficie') ? 'is-invalid' : '' }}" type="number" name="superficie" id="superficie" value="{{ old('superficie', $organizacion->superficie) }}" step="0.01" required>
                @if($errors->has('superficie'))
                    <div class="invalid-feedback">
                        {{ $errors->first('superficie') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.organizacion.fields.superficie_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="direccion">{{ trans('cruds.organizacion.fields.direccion') }}</label>
                <input class="form-control {{ $errors->has('direccion') ? 'is-invalid' : '' }}" type="text" name="direccion" id="direccion" value="{{ old('direccion', $organizacion->direccion) }}" required>
                @if($errors->has('direccion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('direccion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.organizacion.fields.direccion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="empleados">{{ trans('cruds.organizacion.fields.empleados') }}</label>
                <input class="form-control {{ $errors->has('empleados') ? 'is-invalid' : '' }}" type="number" name="empleados" id="empleados" value="{{ old('empleados', $organizacion->empleados) }}" step="1" required>
                @if($errors->has('empleados'))
                    <div class="invalid-feedback">
                        {{ $errors->first('empleados') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.organizacion.fields.empleados_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection