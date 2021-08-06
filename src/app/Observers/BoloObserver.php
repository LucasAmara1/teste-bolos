<?php

namespace App\Observers;

use App\Models\Bolo;
use App\Services\EmailService;
use App\Services\BoloService;

class BoloObserver
{
    protected $emails;
    protected $bolos;

    public function __construct(EmailService $emails, BoloService $bolos)
    {
        $this->emails = $emails;
        $this->bolos = $bolos;
    }

    /**
     * Handle the Bolo "created" event.
     *
     * @param  \App\Models\Bolo  $bolo
     * @return void
     */
    public function created(Bolo $bolo)
    {
        //
    }

    /**
     * Handle the Bolo "updated" event.
     *
     * @param  \App\Models\Bolo  $bolo
     * @return void
     */
    public function updated(Bolo $bolo)
    {
        $bolo_desejado_disponivel = $bolo->quantidade > 0;
        if ($bolo_desejado_disponivel) {
            $email_destino = $this->emails->next_to_receive($bolo->id);
            if ($email_destino)
                $this->emails->sendEmail($bolo_desejado_disponivel, $email_destino);
        }
    }

    /**
     * Handle the Bolo "deleted" event.
     *
     * @param  \App\Models\Bolo  $bolo
     * @return void
     */
    public function deleted(Bolo $bolo)
    {
        //
    }

    /**
     * Handle the Bolo "restored" event.
     *
     * @param  \App\Models\Bolo  $bolo
     * @return void
     */
    public function restored(Bolo $bolo)
    {
        //
    }

    /**
     * Handle the Bolo "force deleted" event.
     *
     * @param  \App\Models\Bolo  $bolo
     * @return void
     */
    public function forceDeleted(Bolo $bolo)
    {
        //
    }
}
