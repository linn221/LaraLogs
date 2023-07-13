<?php

namespace App\Observers;

use App\Models\Log;
use Illuminate\Support\Facades\Storage;

class LogObserver
{
    /**
     * Handle the Log "created" event.
     */
    public function created(Log $log): void
    {
        //
    }

    /**
     * Handle the Log "updated" event.
     */
    public function updated(Log $log): void
    {
        //
    }

    /**
     * Handle the Log "deleted" event.
     */
    public function deleted(Log $log): void
    {
        foreach($log->images as $image) {
            Storage::delete($image);
        }
        //
    }

    /**
     * Handle the Log "restored" event.
     */
    public function restored(Log $log): void
    {
        //
    }

    /**
     * Handle the Log "force deleted" event.
     */
    public function forceDeleted(Log $log): void
    {
        //
    }
}
