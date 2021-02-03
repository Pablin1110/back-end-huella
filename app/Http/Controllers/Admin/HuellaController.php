<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHuellaRequest;
use App\Http\Requests\StoreHuellaRequest;
use App\Http\Requests\UpdateHuellaRequest;
use App\Huella;
use App\Organizacion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HuellaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('huella_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $huellas = Huella::with(['usuario'])->get();

        return view('admin.huellas.index', compact('huellas'));
    }

    public function create()
    {
        abort_if(Gate::denies('huella_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = Organizacion::all()->pluck('id_usuario', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.huellas.create', compact('usuarios'));
    }

    public function store(StoreHuellaRequest $request)
    {
        $huella = Huella::create($request->all());

        return redirect()->route('admin.huellas.index');
    }

    public function edit(Huella $huella)
    {
        abort_if(Gate::denies('huella_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = Organizacion::all()->pluck('id_usuario', 'id')->prepend(trans('global.pleaseSelect'), '');

        $huella->load('usuario');

        return view('admin.huellas.edit', compact('usuarios', 'huella'));
    }

    public function update(UpdateHuellaRequest $request, Huella $huella)
    {
        $huella->update($request->all());

        return redirect()->route('admin.huellas.index');
    }

    public function show(Huella $huella)
    {
        abort_if(Gate::denies('huella_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $huella->load('usuario');

        return view('admin.huellas.show', compact('huella'));
    }

    public function destroy(Huella $huella)
    {
        abort_if(Gate::denies('huella_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $huella->delete();

        return back();
    }

    public function massDestroy(MassDestroyHuellaRequest $request)
    {
        Huella::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
