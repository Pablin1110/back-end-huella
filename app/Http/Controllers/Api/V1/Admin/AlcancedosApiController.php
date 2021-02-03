<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Alcancedo;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlcancedoRequest;
use App\Http\Requests\UpdateAlcancedoRequest;
use App\Http\Resources\Admin\AlcancedoResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AlcancedosApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('alcancedo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AlcancedoResource(Alcancedo::with(['usuario'])->get());
    }

    public function store(StoreAlcancedoRequest $request)
    {
        $alcancedo = Alcancedo::create($request->all());

        return (new AlcancedoResource($alcancedo))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Alcancedo $alcancedo)
    {
        abort_if(Gate::denies('alcancedo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AlcancedoResource($alcancedo->load(['usuario']));
    }

    public function update(UpdateAlcancedoRequest $request, Alcancedo $alcancedo)
    {
        $alcancedo->update($request->all());

        return (new AlcancedoResource($alcancedo))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Alcancedo $alcancedo)
    {
        abort_if(Gate::denies('alcancedo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $alcancedo->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    //Pablo CRUD
    public function getAllScopetwo()
    {
        return new AlcancedoResource(Alcancedo::all());
    }
    public function getScopetwo($id){
        return new AlcancedoResource(Alcancedo::select(['id','usuario_id', 'periodo_inicial','periodo_final','ubicacion','nombre','consumo','factor_emision','emisiones_totales'])->where('usuario_id',$id)->get());
    }
    public function getScopetwoInfo($id){
        return new AlcancedoResource(Alcancedo::select(['id','usuario_id', 'periodo_inicial','periodo_final','ubicacion','nombre','consumo','factor_emision','emisiones_totales'])->where('id',$id)->get());
    }
    public function getSumScopetwo($id){
        return new AlcancedoResource(Alcancedo::select(['emisiones_totales'])
        ->where('usuario_id',$id)
        ->get());
     }
    public function storeScopetwo(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|integer',
            'periodo_inicial' => 'required|date',
            'periodo_final' => 'required|date',
            'ubicacion' =>  'required|string',
            'nombre' =>  'required|string',
            'consumo' => 'required|between:0,19',
            'factor_emision' => 'required|between:0,19',
            'emisiones_totales' =>  'required|between:0,19',
            
         ]);
         return Alcancedo::create($request->all());
    }
    public function updateScopetwo(Request $request, $id_scopetwo)
    {
      $request->validate([
          'periodo_inicial' => 'date',
          'periodo_final' => 'date',
          'ubicacion' => 'string',
          'nombre' => 'string',
          'consumo' => 'between:0,19',
          'factor_emision' =>  'between:0,19',
          'emisiones_totales' =>  'between:0,19',
       ]);
       $scopetwo = Alcancedo::findOrFail($id_scopetwo);
       $scopetwo ->update($request->all());

       return $scopetwo;
    }
    public function deleteScopetwo($id_scopetwo)
    {
        $scopetwo = Alcancedo::findOrFail($id_scopetwo);
        $scopetwo->delete();
      return 204;
    }
    public function deleteAllScopetwo($id_scopetwo)
    {
        $scopetwo = Alcancedo:: where('usuario_id', '=',($id_scopetwo))
        ->delete();
        return 204;
    }
}
