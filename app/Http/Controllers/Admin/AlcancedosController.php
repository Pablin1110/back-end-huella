<?php

namespace App\Http\Controllers\Admin;

use App\Alcancedo;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAlcancedoRequest;
use App\Http\Requests\StoreAlcancedoRequest;
use App\Http\Requests\UpdateAlcancedoRequest;
use App\Organizacion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AlcancedosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('alcancedo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $alcancedos = Alcancedo::with(['usuario'])->get();

        return view('admin.alcancedos.index', compact('alcancedos'));
    }

    public function create()
    {
        abort_if(Gate::denies('alcancedo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = Organizacion::all()->pluck('id_usuario', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.alcancedos.create', compact('usuarios'));
    }

    public function store(StoreAlcancedoRequest $request)
    {
        $alcancedo = Alcancedo::create($request->all());

        return redirect()->route('admin.alcancedos.index');
    }

    public function edit(Alcancedo $alcancedo)
    {
        abort_if(Gate::denies('alcancedo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = Organizacion::all()->pluck('id_usuario', 'id')->prepend(trans('global.pleaseSelect'), '');

        $alcancedo->load('usuario');

        return view('admin.alcancedos.edit', compact('usuarios', 'alcancedo'));
    }

    public function update(UpdateAlcancedoRequest $request, Alcancedo $alcancedo)
    {
        $alcancedo->update($request->all());

        return redirect()->route('admin.alcancedos.index');
    }

    public function show(Alcancedo $alcancedo)
    {
        abort_if(Gate::denies('alcancedo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $alcancedo->load('usuario');

        return view('admin.alcancedos.show', compact('alcancedo'));
    }

    public function destroy(Alcancedo $alcancedo)
    {
        abort_if(Gate::denies('alcancedo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $alcancedo->delete();

        return back();
    }

    public function massDestroy(MassDestroyAlcancedoRequest $request)
    {
        Alcancedo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
