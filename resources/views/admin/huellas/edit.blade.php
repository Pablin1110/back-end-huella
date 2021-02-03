@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.huella.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.huellas.update", [$huella->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="usuario_id">{{ trans('cruds.huella.fields.usuario') }}</label>
                <select class="form-control select2 {{ $errors->has('usuario') ? 'is-invalid' : '' }}" name="usuario_id" id="usuario_id" required>
                    @foreach($usuarios as $id => $usuario)
                        <option value="{{ $id }}" {{ (old('usuario_id') ? old('usuario_id') : $huella->usuario->id ?? '') == $id ? 'selected' : '' }}>{{ $usuario }}</option>
                    @endforeach
                </select>
                @if($errors->has('usuario'))
                    <div class="invalid-feedback">
                        {{ $errors->first('usuario') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.huella.fields.usuario_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="alcance_uno">{{ trans('cruds.huella.fields.alcance_uno') }}</label>
                <input class="form-control {{ $errors->has('alcance_uno') ? 'is-invalid' : '' }}" type="number" name="alcance_uno" id="alcance_uno" value="{{ old('alcance_uno', $huella->alcance_uno) }}" step="0.01" required>
                @if($errors->has('alcance_uno'))
                    <div class="invalid-feedback">
                        {{ $errors->first('alcance_uno') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.huella.fields.alcance_uno_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="alcance_dos">{{ trans('cruds.huella.fields.alcance_dos') }}</label>
                <input class="form-control {{ $errors->has('alcance_dos') ? 'is-invalid' : '' }}" type="number" name="alcance_dos" id="alcance_dos" value="{{ old('alcance_dos', $huella->alcance_dos) }}" step="0.01" required>
                @if($errors->has('alcance_dos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('alcance_dos') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.huella.fields.alcance_dos_helper') }}</span>
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