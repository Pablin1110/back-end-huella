<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHuellaRequest;
use App\Http\Requests\UpdateHuellaRequest;
use App\Http\Resources\Admin\HuellaResource;
use App\Huella;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HuellaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('huella_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HuellaResource(Huella::with(['usuario'])->get());
    }

    public function store(StoreHuellaRequest $request)
    {
        $huella = Huella::create($request->all());

        return (new HuellaResource($huella))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Huella $huella)
    {
        abort_if(Gate::denies('huella_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HuellaResource($huella->load(['usuario']));
    }

    public function update(UpdateHuellaRequest $request, Huella $huella)
    {
        $huella->update($request->all());

        return (new HuellaResource($huella))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Huella $huella)
    {
        abort_if(Gate::denies('huella_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $huella->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
      //Pablo CRUD
      public function getAllFoot()
      {
          return new HuellaResource(Huella::all());
      }
      public function getFoot($id){
        return new HuellaResource(Huella::select(['id','usuario_id','alcance_uno','alcance_dos'])->where('usuario_id',$id)->get());
    }
    public function getFootID($id){
        return new HuellaResource(Huella::select(['huellas.id','organizacions.nombre','organizacions.tipo','organizacions.sector','organizacions.fecha',
        'huellas.alcance_uno','huellas.alcance_dos'])
        ->leftjoin('organizacions', 'organizacions.id', '=', 'huellas.usuario_id')
        ->where('organizacions.id_usuario',$id)
        ->get());
    }
    public function getFootIDInfo($id){
        return new HuellaResource(Huella::select(['huellas.id','organizacions.nombre','organizacions.tipo','organizacions.sector','organizacions.fecha',
        'huellas.alcance_uno','huellas.alcance_dos'])
        ->leftjoin('organizacions', 'organizacions.id', '=', 'huellas.usuario_id')
        ->where('organizacions.id',$id)
        ->get());
    }
    public function getScopeoneCarbon($id){
        return new HuellaResource(Huella::select(['alcance_uno','alcance_dos'])->where('usuario_id',$id)->get());
     }
    public function storeFoot(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|integer',
            'alcance_uno' =>  'required|between:0,19',
            'alcance_dos' =>  'required|between:0,19',
         ]);
         return Huella::create($request->all());
    }
    public function updateFoot(Request $request, $id_foot)
    {
      $request->validate([
        'alcance_uno' => 'between:0,19',
        'alcance_dos' => 'between:0,19',
       ]);

       $foot = Huella::where('usuario_id', '=',$id_foot)
       ->update($request->all());

       return $foot;
    }
    public function deleteFoot($id_foot)
    {
        $foot = Huella::where('usuario_id', '=',$id_foot)
        ->delete();
      return 204;
    }
}
