<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\peripecias;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use App\Http\Controllers;

class peripeciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dadosperipecias = peripecias::All();
        $contador = $dadosperipecias->count();

        return 'Músicas: '.$contador.  $dadosperipecias. Response()->json([], Response::HTTP_NO_CONTENT);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dadosperipecias = $request->All();

        $valida = Validator::make($dadosperipecias, [
            'nomeperipecias'=> 'required',
            'marcaperipecias'=> 'required',
        ]);

        if($valida->fails()){
            return 'Dados inválidos'.$valida->errors(true). 500;
        }
            $peripeciasbd = peripecias::create($dadosperipecias);
        if($peripeciasbd){
            return 'peripecias cadastrado '.Response()->json([], Response::HTTP_NO_CONTENT); 
        }else{
            return 'peripecias não cadastrado '.Response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $peripeciasbd = peripecias::find($id);
        $contador = $peripecias->count();

        if($peripeciasdb){
            return 'peripeciass encontrados: '.$contador.' - '.$peripeciasdb.response()->json([],Response::HTTP_NO_CONTENT); 
        }else{
            return 'peripecias não localizado.'.response()->json([],Response::HTTP_NO_CONTENT); 
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $peripeciasbd = $request->All();

        $valida = Validator::make($peripecias,[
            'nomeperipecias'=> 'required',
            'marcaperipecias'=> 'required',
        ]);

        if($valida->fails()){
            return 'Dados incompletos'.$valida->errors(true). 500;
        }

        $peripeciasbd = peripecias::find($id);
        $peripeciasbd->nomeperipecias = $peripeciasDados['nomeperipecias'];
        $peripeciasbd->nomeperipecias = $peripeciasDados['nomeperipecias'];

        $Registrosperipecias = $peripeciasdb->save();
        if($Registrosperipecias){
            return 'Dados alterados com sucesso.'.Response()->json([], Response::HTTP_NO_CONTENT);
        }else{  
            return 'Dados não alterados no banco de dados'.Response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peripeciasbd = peripecias::find($id);
        if($peripeciasbd){
            $peripeciasbd->delete();
            return 'As peripecias foram deletadas com sucesso.'.response()->json([],Response::HTTP_NO_CONTENT); 
        }else{
            return 'As peripecias Não foram deletadas com sucesso.'.response()->json([],Response::HTTP_NO_CONTENT); 
        }
    }
}