<?php

namespace App\Observers;

use App\Models\Email;
use App\Services\EmailService;
use App\Services\BoloService;

class EmailObserver
{
    protected $emails;
    protected $bolos;

    public function __construct(EmailService $emails, BoloService $bolos)
    {
        $this->emails = $emails;
        $this->bolos = $bolos;
    }

    /**
     * Handle the Email "created" event.
     *
     * @param  \App\Models\Email  $email
     * @return void
     */
    public function created(Email $email)
    {
        $bolo_desejado_disponivel = $this->bolos->is_available($email->id_bolo);
        if ($bolo_desejado_disponivel)
            $this->emails->sendEmail($email);
    }

    /**
     * Handle the Email "updated" event.
     *
     * @param  \App\Models\Email  $email
     * @return void
     */
    public function updated(Email $email)
    {
        //
    }

    /**
     * Handle the Email "deleted" event.
     *
     * @param  \App\Models\Email  $email
     * @return void
     */
    public function deleted(Email $email)
    {
        //
    }

    /**
     * Handle the Email "restored" event.
     *
     * @param  \App\Models\Email  $email
     * @return void
     */
    public function restored(Email $email)
    {
        //
    }

    /**
     * Handle the Email "force deleted" event.
     *
     * @param  \App\Models\Email  $email
     * @return void
     */
    public function forceDeleted(Email $email)
    {
        //
    }
}
