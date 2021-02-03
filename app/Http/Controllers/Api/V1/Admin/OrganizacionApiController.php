<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrganizacionRequest;
use App\Http\Requests\UpdateOrganizacionRequest;
use App\Http\Resources\Admin\OrganizacionResource;
use App\Organizacion;
use Gate;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrganizacionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('organizacion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrganizacionResource(Organizacion::all());
    }

    public function store(StoreOrganizacionRequest $request)
    {
        $organizacion = Organizacion::create($request->all());

        return (new OrganizacionResource($organizacion))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Organizacion $organizacion)
    {
        abort_if(Gate::denies('organizacion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrganizacionResource($organizacion);
    }

    public function update(UpdateOrganizacionRequest $request, Organizacion $organizacion)
    {
        $organizacion->update($request->all());

        return (new OrganizacionResource($organizacion))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Organizacion $organizacion)
    {
        abort_if(Gate::denies('organizacion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organizacion->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    //Pablo CRUD
    public function getAllOrganization()
    {
        return new OrganizacionResource(Organizacion::all());
    }
    public function getOrganization($id){
        return new OrganizacionResource(Organizacion::select(['id','id_usuario','nombre','tipo','sector','fecha','superficie','direccion','empleados'])->where('id_usuario',$id)->get());
    }
    public function getFootId($id){
        $selectHardware = DB::table('huellas')
        ->leftjoin('organizacions', 'organizacions.id', '=', 'huellas.usuario_id')
        ->select('huellas.id','huellas.alcance_uno','huellas.alcance_dos')
        ->where([
            ["organizacions.id_usuario","=",$id],
        ])
        ->get();
        return $selectHardware;
    }
    public function storeOrganization(Request $request)
    {
        $request->validate([
           'id_usuario' => 'required|string',
           'nombre' => 'required|string',
           'tipo' => 'required|string',
           'sector' => 'required|string',
           'fecha' => 'required|date',
           'superficie' => 'required|between:0,19',
           'direccion' => 'required|string',
           'empleados' => 'required|integer',
         ]);
         return Organizacion::create($request->all());
    }
    public function updateOrganization(Request $request, $id_organizacion)
    {
      $request->validate([
           'nombre' => 'string',
           'tipo' => 'string',
           'sector' => 'string',
           'fecha' => 'date',
           'superficie' => 'between:0,19',
           'direccion' => 'string',
           'empleados' => 'integer',
       ]);

       $organizacion = Organizacion::findOrFail($id_organizacion);
       $organizacion ->update($request->all());

       return $organizacion;
    }
    public function deleteOrganization($id_organizacion)
    {
        $organizacion = Organizacion::findOrFail($id_organizacion);
        $organizacion->delete();
      return 204;
    }
}
