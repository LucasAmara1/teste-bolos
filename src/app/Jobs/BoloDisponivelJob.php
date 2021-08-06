<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Email;
use App\Mail\BoloDisponivelMail;
use Illuminate\Support\Facades\Mail;

class BoloDisponivelJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    protected $email;
    protected $nome_bolo;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Email $email, String $nome_bolo)
    {
        $this->email = $email;
        $this->nome_bolo = $nome_bolo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send(new BoloDisponivelMail($this->email, $this->nome_bolo));
    }
}