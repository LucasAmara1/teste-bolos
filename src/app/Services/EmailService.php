<?php

namespace App\Services;

use App\Models\Email;

class EmailService
{
    public function index()
    {
        return Email::paginate(10);
    }

    public function store(array $dados_email)
    {
        return Email::create($dados_email);
    }

    public function show(int $id)
    {
        $email = Email::find($id, ['endereco_email', 'id_bolo']);
        return $email;
    }

    public function update(array $dados_email, int $id)
    {
        $email = Email::find($id, ['id']);
        $email->update($dados_email);
        return Email::find($id);
    }

    public function destroy(int $id)
    {
        $email = Email::find($id);
        $email->delete();
        return $email;
    }
}
