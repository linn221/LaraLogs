<?php

namespace App\Observers;

use App\Mail\NewPostMail;
use App\Models\Email;
use App\Models\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class LogObserver
{
    /**
     * Handle the Log "created" event.
     */
    public function created(Log $log): void
    {
        // send email notification
        $subscribers = Email::whereNot('subscribed_at')->get();
        foreach($subscribers as $subscriber) {
            Mail::to($subscriber->address)->send(new NewPostMail($log, $subscriber));
        }
        // foreach($subscribers as $subscriber) {
        //     Mail::to($subscriber)->send(new NewPostMail($log));
        // }
        
    }

    /**
     * Handle the Log "updated" event.
     */
    public function updated(Log $log): void
    {
        // $followers = ['fingerman8910@gmail.com', 'khantzinlinn221@gmail.com'];
        // foreach($followers as $follower) {
        //     Mail::to($follower)->send(new NewPostMail($log));
        // }
        // follwers
        //
    }

    /**
     * Handle the Log "deleted" event.
     */
    public function deleted(Log $log): void
    {
        $followers = ['fingerman8910@gmail.com', 'khantzinlinn221@gmail.com'];
        // foreach($followers as $follower) {
        //     Mail::to($follower)->send(new NewPostMail($log));
        // }
        // follwers
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
