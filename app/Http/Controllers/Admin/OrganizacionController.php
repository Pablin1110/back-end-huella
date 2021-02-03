<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrganizacionRequest;
use App\Http\Requests\StoreOrganizacionRequest;
use App\Http\Requests\UpdateOrganizacionRequest;
use App\Organizacion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OrganizacionController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('organizacion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Organizacion::query()->select(sprintf('%s.*', (new Organizacion)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'organizacion_show';
                $editGate      = 'organizacion_edit';
                $deleteGate    = 'organizacion_delete';
                $crudRoutePart = 'organizacions';

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
            $table->editColumn('id_usuario', function ($row) {
                return $row->id_usuario ? $row->id_usuario : "";
            });
            $table->editColumn('nombre', function ($row) {
                return $row->nombre ? $row->nombre : "";
            });
            $table->editColumn('tipo', function ($row) {
                return $row->tipo ? $row->tipo : "";
            });
            $table->editColumn('sector', function ($row) {
                return $row->sector ? $row->sector : "";
            });

            $table->editColumn('superficie', function ($row) {
                return $row->superficie ? $row->superficie : "";
            });
            $table->editColumn('direccion', function ($row) {
                return $row->direccion ? $row->direccion : "";
            });
            $table->editColumn('empleados', function ($row) {
                return $row->empleados ? $row->empleados : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.organizacions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('organizacion_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.organizacions.create');
    }

    public function store(StoreOrganizacionRequest $request)
    {
        $organizacion = Organizacion::create($request->all());

        return redirect()->route('admin.organizacions.index');
    }

    public function edit(Organizacion $organizacion)
    {
        abort_if(Gate::denies('organizacion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.organizacions.edit', compact('organizacion'));
    }

    public function update(UpdateOrganizacionRequest $request, Organizacion $organizacion)
    {
        $organizacion->update($request->all());

        return redirect()->route('admin.organizacions.index');
    }

    public function show(Organizacion $organizacion)
    {
        abort_if(Gate::denies('organizacion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organizacion->load('usuarioAlcanceunos', 'usuarioAlcancedos', 'usuarioHuellas');

        return view('admin.organizacions.show', compact('organizacion'));
    }

    public function destroy(Organizacion $organizacion)
    {
        abort_if(Gate::denies('organizacion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organizacion->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrganizacionRequest $request)
    {
        Organizacion::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
