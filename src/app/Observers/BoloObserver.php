<?php

namespace App\Observers;

use App\Models\Bolo;

class BoloObserver
{
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
        //
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
