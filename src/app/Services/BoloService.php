<?php

namespace App\Services;

use App\Models\Bolo;
use Illuminate\Http\Request;

class BoloService
{

    public function index()
    {
        return Bolo::paginate(10);
    }

    public function store(Array $dados_bolo)
    {
        return Bolo::create($dados_bolo);
    }

    public function show(int $id)
    {
        $bolo = Bolo::find($id, ['nome', 'peso', 'valor', 'quantidade']);
        return $bolo;
    }

    public function update(Array $dados_bolo, int $id)
    {
        $bolo = Bolo::find($id, ['id']);
        $bolo->update($dados_bolo);
        return Bolo::find($id);
    }

    public function destroy(int $id)
    {
        $bolo = Bolo::find($id);
        $bolo->delete();
        return $bolo;
    }
}
