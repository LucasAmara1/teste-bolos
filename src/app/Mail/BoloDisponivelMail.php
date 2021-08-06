<?php

namespace App\Mail;

use App\Models\Email;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BoloDisponivelMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $email;
    protected $nome_bolo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Email $email, String $nome_bolo)
    {
        $this->email = $email;
        $this->nome_bolo = $nome_bolo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Seu bolo está disponível!');
        $this->to($this->email->endereco_email, 'Teste');

        return $this->view('mail.boloDisponivel', [
            'nome_bolo' => $this->nome_bolo
        ]);
    }
}
