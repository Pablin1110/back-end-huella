<?php

namespace App\Http\Controllers\Admin;

use App\Alcanceuno;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAlcanceunoRequest;
use App\Http\Requests\StoreAlcanceunoRequest;
use App\Http\Requests\UpdateAlcanceunoRequest;
use App\Organizacion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AlcanceunoController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('alcanceuno_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Alcanceuno::with(['usuario'])->select(sprintf('%s.*', (new Alcanceuno)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'alcanceuno_show';
                $editGate      = 'alcanceuno_edit';
                $deleteGate    = 'alcanceuno_delete';
                $crudRoutePart = 'alcanceunos';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->addColumn('usuario_id_usuario', function ($row) {
                return $row->usuario ? $row->usuario->id_usuario : '';
            });

            $table->editColumn('usuario.nombre', function ($row) {
                return $row->usuario ? (is_string($row->usuario) ? $row->usuario : $row->usuario->nombre) : '';
            });
            $table->editColumn('lugar', function ($row) {
                return $row->lugar ? $row->lugar : "";
            });
            $table->editColumn('equipo', function ($row) {
                return $row->equipo ? $row->equipo : "";
            });
            $table->editColumn('tipo', function ($row) {
                return $row->tipo ? $row->tipo : "";
            });
            $table->editColumn('cantidad_inicial', function ($row) {
                return $row->cantidad_inicial ? $row->cantidad_inicial : "";
            });
            $table->editColumn('cantidad_anual', function ($row) {
                return $row->cantidad_anual ? $row->cantidad_anual : "";
            });
            $table->editColumn('factor_emision', function ($row) {
                return $row->factor_emision ? $row->factor_emision : "";
            });
            $table->editColumn('emisiones_totales', function ($row) {
                return $row->emisiones_totales ? $row->emisiones_totales : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'usuario']);

            return $table->make(true);
        }

        return view('admin.alcanceunos.index');
    }

    public function create()
    {
        abort_if(Gate::denies('alcanceuno_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = Organizacion::all()->pluck('id_usuario', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.alcanceunos.create', compact('usuarios'));
    }

    public function store(StoreAlcanceunoRequest $request)
    {
        $alcanceuno = Alcanceuno::create($request->all());

        return redirect()->route('admin.alcanceunos.index');
    }

    public function edit(Alcanceuno $alcanceuno)
    {
        abort_if(Gate::denies('alcanceuno_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = Organizacion::all()->pluck('id_usuario', 'id')->prepend(trans('global.pleaseSelect'), '');

        $alcanceuno->load('usuario');

        return view('admin.alcanceunos.edit', compact('usuarios', 'alcanceuno'));
    }

    public function update(UpdateAlcanceunoRequest $request, Alcanceuno $alcanceuno)
    {
        $alcanceuno->update($request->all());

        return redirect()->route('admin.alcanceunos.index');
    }

    public function show(Alcanceuno $alcanceuno)
    {
        abort_if(Gate::denies('alcanceuno_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $alcanceuno->load('usuario');

        return view('admin.alcanceunos.show', compact('alcanceuno'));
    }

    public function destroy(Alcanceuno $alcanceuno)
    {
        abort_if(Gate::denies('alcanceuno_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $alcanceuno->delete();

        return back();
    }

    public function massDestroy(MassDestroyAlcanceunoRequest $request)
    {
        Alcanceuno::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
