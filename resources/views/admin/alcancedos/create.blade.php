@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.alcancedo.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.alcancedos.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="usuario_id">{{ trans('cruds.alcancedo.fields.usuario') }}</label>
                <select class="form-control select2 {{ $errors->has('usuario') ? 'is-invalid' : '' }}" name="usuario_id" id="usuario_id" required>
                    @foreach($usuarios as $id => $usuario)
                        <option value="{{ $id }}" {{ old('usuario_id') == $id ? 'selected' : '' }}>{{ $usuario }}</option>
                    @endforeach
                </select>
                @if($errors->has('usuario'))
                    <div class="invalid-feedback">
                        {{ $errors->first('usuario') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alcancedo.fields.usuario_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="periodo_inicial">{{ trans('cruds.alcancedo.fields.periodo_inicial') }}</label>
                <input class="form-control date {{ $errors->has('periodo_inicial') ? 'is-invalid' : '' }}" type="text" name="periodo_inicial" id="periodo_inicial" value="{{ old('periodo_inicial') }}" required>
                @if($errors->has('periodo_inicial'))
                    <div class="invalid-feedback">
                        {{ $errors->first('periodo_inicial') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alcancedo.fields.periodo_inicial_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="periodo_final">{{ trans('cruds.alcancedo.fields.periodo_final') }}</label>
                <input class="form-control date {{ $errors->has('periodo_final') ? 'is-invalid' : '' }}" type="text" name="periodo_final" id="periodo_final" value="{{ old('periodo_final') }}" required>
                @if($errors->has('periodo_final'))
                    <div class="invalid-feedback">
                        {{ $errors->first('periodo_final') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alcancedo.fields.periodo_final_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ubicacion">{{ trans('cruds.alcancedo.fields.ubicacion') }}</label>
                <input class="form-control {{ $errors->has('ubicacion') ? 'is-invalid' : '' }}" type="text" name="ubicacion" id="ubicacion" value="{{ old('ubicacion', '') }}" required>
                @if($errors->has('ubicacion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ubicacion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alcancedo.fields.ubicacion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nombre">{{ trans('cruds.alcancedo.fields.nombre') }}</label>
                <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre', '') }}" required>
                @if($errors->has('nombre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alcancedo.fields.nombre_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="consumo">{{ trans('cruds.alcancedo.fields.consumo') }}</label>
                <input class="form-control {{ $errors->has('consumo') ? 'is-invalid' : '' }}" type="number" name="consumo" id="consumo" value="{{ old('consumo', '') }}" step="0.01">
                @if($errors->has('consumo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('consumo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alcancedo.fields.consumo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="factor_emision">{{ trans('cruds.alcancedo.fields.factor_emision') }}</label>
                <input class="form-control {{ $errors->has('factor_emision') ? 'is-invalid' : '' }}" type="number" name="factor_emision" id="factor_emision" value="{{ old('factor_emision', '') }}" step="0.01" required>
                @if($errors->has('factor_emision'))
                    <div class="invalid-feedback">
                        {{ $errors->first('factor_emision') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alcancedo.fields.factor_emision_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="emisiones_totales">{{ trans('cruds.alcancedo.fields.emisiones_totales') }}</label>
                <input class="form-control {{ $errors->has('emisiones_totales') ? 'is-invalid' : '' }}" type="number" name="emisiones_totales" id="emisiones_totales" value="{{ old('emisiones_totales', '') }}" step="0.01" required>
                @if($errors->has('emisiones_totales'))
                    <div class="invalid-feedback">
                        {{ $errors->first('emisiones_totales') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alcancedo.fields.emisiones_totales_helper') }}</span>
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