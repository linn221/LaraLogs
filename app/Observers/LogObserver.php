<?php

namespace App\Observers;

use App\Mail\NewPostMail;
use App\Mail\UpdatePostMail;
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
            Mail::to($subscriber->address)->
            later(now()->addSeconds(30), new NewPostMail($log, $subscriber));
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
        $followers = $log->emails;
        foreach($followers as $follower) {
            Mail::to($follower->address)->later(now()->addSeconds(4), new UpdatePostMail($log, $follower, 'updated'));
        }

        // $followers = ['fingerman8910@gmail.com', 'khantzinlinn221@gmail.com'];
        // follwers
        //
    }

    /**
     * Handle the Log "deleted" event.
     */
    public function deleted(Log $log): void
    {
        $followers = $log->emails;
        foreach($followers as $follower) {
            Mail::to($follower->address)->later(now()->addSeconds(4), new UpdatePostMail($log, $follower, 'deleted'));
        }
        // $followers = $log->emails->pluck('address');
        // foreach($followers as $follower) {
        //     Mail::to($follower)->later(now()->addSeconds(4), new UpdatePostMail($log, 'deleted'));
        // }
        //
    }

    /**
     * Handle the Log "restored" event.
     */
    public function restored(Log $log): void
    {
        $followers = $log->emails;
        foreach($followers as $follower) {
            Mail::to($follower->address)->later(now()->addSeconds(4), new UpdatePostMail($log, $follower, 'restored previously deleted'));
        }
        // $followers = $log->emails->pluck('address');
        // foreach($followers as $follower) {
        //     Mail::to($follower)->later(now()->addSeconds(4), new UpdatePostMail($log, 'restored previously deleted'));
        // }
        //
    }

    /**
     * Handle the Log "force deleted" event.
     */
    public function forceDeleted(Log $log): void
    {
        // idea: makes a downloadable link to the post for a week or some time
        $followers = $log->emails;
        foreach($log->images as $image) {
            Storage::delete($image->uri);
        }

        foreach($followers as $follower) {
            Mail::to($follower->address)->later(now()->addSeconds(4), new UpdatePostMail($log, $follower, 'permanently deleted'));
        }
        //
    }
}
