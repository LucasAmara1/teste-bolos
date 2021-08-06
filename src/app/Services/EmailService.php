<?php

namespace App\Services;

use App\Models\Email;
use App\Jobs\BoloDisponivelJob;

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
        $email = Email::find($id, ['id', 'endereco_email', 'id_bolo']);
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

    public function sendEmail(Email $email)
    {
        $nome_bolo = $email->bolo->nome;
        BoloDisponivelJob::dispatch($email, $nome_bolo)->delay(now()->addSeconds('5'));
    }

    public function send_to_group(int $id_bolo)
    {
        $emails =  Email::select(array(
            'id',
            'endereco_email',
            'id_bolo',
        ))
            ->where('id_bolo', $id_bolo)
            ->get();

        foreach ($emails as $email) {
            $this->sendEmail($email);
        }
    }
}
