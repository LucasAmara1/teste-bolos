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
     * Handle the Bolo "updating" event.
     *
     * @param  \App\Models\Bolo  $bolo
     * @return void
     */
    public function updating(Bolo $novos_dados_bolo)
    {
        $bolo_desejado_disponivel = $this->bolos->is_available($novos_dados_bolo->id);
        if (!$bolo_desejado_disponivel && $novos_dados_bolo->quantidade > 0)
            $this->emails->send_to_group($novos_dados_bolo->id);
    }

    /**
     * Handle the Bolo "updated" event.
     *
     * @param  \App\Models\Bolo  $bolo
     * @return void
     */
    public function updated(Bolo $bolo)
    {
        // $bolo_desejado_disponivel = $this->bolos->is_available($bolo->id);
        // if ($bolo_desejado_disponivel)
        //     $this->emails->send_to_group($bolo->id);
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
