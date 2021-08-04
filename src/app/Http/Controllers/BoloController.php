<?php

namespace App\Http\Controllers;

use App\Http\Resources\BoloResource;
use App\Models\Bolo;
use Illuminate\Http\Request;

class BoloController extends Controller
{
    public function index()
    {
        $bolos = Bolo::paginate(10);
        return BoloResource::collection($bolos);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $bolo = new Bolo();
        $bolo->nome = $request->nome;
        $bolo->peso = $request->peso;
        $bolo->valor = $request->valor;
        $bolo->quantidade = $request->quantidade;
        if($bolo->save()){
            return new BoloResource($bolo);
        }
    }

    public function show(Bolo $bolo)
    {
        //
    }

    public function edit(Bolo $bolo)
    {
        //
    }

    public function update(Request $request, Bolo $bolo)
    {
        //
    }

    public function destroy(Bolo $bolo)
    {
        //
    }
}
