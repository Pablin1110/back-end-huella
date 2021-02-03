<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Alcanceuno;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlcanceunoRequest;
use App\Http\Requests\UpdateAlcanceunoRequest;
use App\Http\Resources\Admin\AlcanceunoResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AlcanceunoApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('alcanceuno_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AlcanceunoResource(Alcanceuno::with(['usuario'])->get());
    }

    public function store(StoreAlcanceunoRequest $request)
    {
        $alcanceuno = Alcanceuno::create($request->all());

        return (new AlcanceunoResource($alcanceuno))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Alcanceuno $alcanceuno)
    {
        abort_if(Gate::denies('alcanceuno_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AlcanceunoResource($alcanceuno->load(['usuario']));
    }

    public function update(UpdateAlcanceunoRequest $request, Alcanceuno $alcanceuno)
    {
        $alcanceuno->update($request->all());

        return (new AlcanceunoResource($alcanceuno))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Alcanceuno $alcanceuno)
    {
        abort_if(Gate::denies('alcanceuno_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $alcanceuno->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
     //Pablo CRUD
     public function getAllScopeone()
     {
         return new AlcanceunoResource(Alcanceuno::all());
     }
     public function getScopeone($id){
         return new AlcanceunoResource(Alcanceuno::select(['id','usuario_id','lugar','equipo','tipo','cantidad_inicial','cantidad_anual','factor_emision','emisiones_totales'])->where('usuario_id',$id)->get());
     }
     public function getScopeoneInfo($id){
        return new AlcanceunoResource(Alcanceuno::select(['id','usuario_id','lugar','equipo','tipo','cantidad_inicial','cantidad_anual','factor_emision','emisiones_totales'])->where('id',$id)->get());
    }
     public function getSumScopeone($id){
        return new AlcanceunoResource(Alcanceuno::select(['emisiones_totales'])
        ->where('usuario_id',$id)
        ->get());
     }
     public function storeScopeone(Request $request)
     {
         $request->validate([
             'usuario_id' => 'required|integer',
             'lugar' => 'required|string',
             'equipo' => 'required|string',
             'cantidad_inicial' =>  'required|between:0,19',
             'cantidad_anual' =>  'required|between:0,19',
             'factor_emision' => 'required|between:0,19',
             'emisiones_totales' =>  'required|between:0,19',
          ]);
          return Alcanceuno::create($request->all());
     }
     public function updateScopeone(Request $request, $id_scopeone)
     {
       $request->validate([
         'lugar' => 'string',
         'equipo' => 'string',
         'tipo' => 'string',
         'cantidad_inicial' => 'between:0,19',
         'cantidad_anual' => 'between:0,19',
         'factor_emision' =>  'between:0,19',
         'emisiones_totales' =>  'between:0,19',
        ]);
 
        $scopeone = Alcanceuno::findOrFail($id_scopeone);
        $scopeone ->update($request->all());
 
        return $scopeone;
     }
     public function deleteScopeone($id_scopeone)
     {
         $scopeone = Alcanceuno::findOrFail($id_scopeone);
         $scopeone->delete();
       return 204;
     }
     public function deleteAllScopeone($id_scopeone)
    {
        $scopeone = Alcanceuno:: where('usuario_id', '=',($id_scopeone))
        ->delete();
        return 204;
    }

}
