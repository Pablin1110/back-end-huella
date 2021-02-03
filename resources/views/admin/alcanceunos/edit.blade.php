@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.alcanceuno.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.alcanceunos.update", [$alcanceuno->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="usuario_id">{{ trans('cruds.alcanceuno.fields.usuario') }}</label>
                <select class="form-control select2 {{ $errors->has('usuario') ? 'is-invalid' : '' }}" name="usuario_id" id="usuario_id" required>
                    @foreach($usuarios as $id => $usuario)
                        <option value="{{ $id }}" {{ (old('usuario_id') ? old('usuario_id') : $alcanceuno->usuario->id ?? '') == $id ? 'selected' : '' }}>{{ $usuario }}</option>
                    @endforeach
                </select>
                @if($errors->has('usuario'))
                    <div class="invalid-feedback">
                        {{ $errors->first('usuario') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alcanceuno.fields.usuario_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lugar">{{ trans('cruds.alcanceuno.fields.lugar') }}</label>
                <input class="form-control {{ $errors->has('lugar') ? 'is-invalid' : '' }}" type="text" name="lugar" id="lugar" value="{{ old('lugar', $alcanceuno->lugar) }}">
                @if($errors->has('lugar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lugar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alcanceuno.fields.lugar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="equipo">{{ trans('cruds.alcanceuno.fields.equipo') }}</label>
                <input class="form-control {{ $errors->has('equipo') ? 'is-invalid' : '' }}" type="text" name="equipo" id="equipo" value="{{ old('equipo', $alcanceuno->equipo) }}" required>
                @if($errors->has('equipo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('equipo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alcanceuno.fields.equipo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tipo">{{ trans('cruds.alcanceuno.fields.tipo') }}</label>
                <input class="form-control {{ $errors->has('tipo') ? 'is-invalid' : '' }}" type="text" name="tipo" id="tipo" value="{{ old('tipo', $alcanceuno->tipo) }}" required>
                @if($errors->has('tipo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tipo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alcanceuno.fields.tipo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cantidad_inicial">{{ trans('cruds.alcanceuno.fields.cantidad_inicial') }}</label>
                <input class="form-control {{ $errors->has('cantidad_inicial') ? 'is-invalid' : '' }}" type="number" name="cantidad_inicial" id="cantidad_inicial" value="{{ old('cantidad_inicial', $alcanceuno->cantidad_inicial) }}" step="0.01" required>
                @if($errors->has('cantidad_inicial'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cantidad_inicial') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alcanceuno.fields.cantidad_inicial_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cantidad_anual">{{ trans('cruds.alcanceuno.fields.cantidad_anual') }}</label>
                <input class="form-control {{ $errors->has('cantidad_anual') ? 'is-invalid' : '' }}" type="number" name="cantidad_anual" id="cantidad_anual" value="{{ old('cantidad_anual', $alcanceuno->cantidad_anual) }}" step="0.01">
                @if($errors->has('cantidad_anual'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cantidad_anual') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alcanceuno.fields.cantidad_anual_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="factor_emision">{{ trans('cruds.alcanceuno.fields.factor_emision') }}</label>
                <input class="form-control {{ $errors->has('factor_emision') ? 'is-invalid' : '' }}" type="number" name="factor_emision" id="factor_emision" value="{{ old('factor_emision', $alcanceuno->factor_emision) }}" step="0.01" required>
                @if($errors->has('factor_emision'))
                    <div class="invalid-feedback">
                        {{ $errors->first('factor_emision') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alcanceuno.fields.factor_emision_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="emisiones_totales">{{ trans('cruds.alcanceuno.fields.emisiones_totales') }}</label>
                <input class="form-control {{ $errors->has('emisiones_totales') ? 'is-invalid' : '' }}" type="number" name="emisiones_totales" id="emisiones_totales" value="{{ old('emisiones_totales', $alcanceuno->emisiones_totales) }}" step="0.01" required>
                @if($errors->has('emisiones_totales'))
                    <div class="invalid-feedback">
                        {{ $errors->first('emisiones_totales') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alcanceuno.fields.emisiones_totales_helper') }}</span>
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