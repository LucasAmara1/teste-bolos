<?php

namespace App\Http\Controllers;

use App\Http\Resources\BoloResource;
use App\Services\BoloService;
use Illuminate\Http\Request;

class BoloController extends Controller
{
    protected $bolos;

    public function __construct(BoloService $bolos)
    {
        $this->bolos = $bolos;
    }

    public function index()
    {
        $bolos = $this->bolos->index();
        return BoloResource::collection($bolos);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $dados_bolo = $request->all();
        $bolo = $this->bolos->store($dados_bolo);
        return new BoloResource($bolo);
    }

    public function show(Int $id)
    {
        $bolo = $this->bolos->show($id);
        return new BoloResource($bolo);
    }

    public function edit(Int $id)
    {
        $bolo = $this->bolos->show($id);
        return new BoloResource($bolo);
    }

    public function update(Request $request, Int $id)
    {
        $dados_bolo = $request->all();
        $bolo = $this->bolos->update($dados_bolo, $id);
        return new BoloResource($bolo);
    }

    public function destroy(Int $id)
    {
        $bolo = $this->bolos->destroy($id);
        return new BoloResource($bolo);
    }
}
