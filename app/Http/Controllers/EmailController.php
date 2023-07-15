<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmailRequest;
use App\Http\Requests\UpdateEmailRequest;
use App\Mail\InformativeMail;
use App\Mail\NewPostMail;
use App\Models\Email;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    private function mail($action, $link, $email) {
        logger("$action email for $email->address with $link link");
    }

    public function subscribe(StoreEmailRequest $request)
    {
        $email = new Email;
        $email->address = $request->input('email-address');
        $email->token = fake()->password(18);
        $email->save();
        // send email on observer
        // Mail::to($email->address)->send();
        Mail::to($email->address)->send(new InformativeMail($email->token, "Subscripion success to " . env('APP_NAME')));
        // Mail::to('linncoffeee@gmail.com')->send(new InformativeMail('shit', 'hello world'));
        // $this->mail('subscribe', 'unsubscribe', $email);
        return redirect()->back()->with(['status' => 'YOu now have active scription to new posts. You can unsubscribe from the link in the email but be cautious becuase you can only subscribe again by the re-subscribe link for non-verified accounts']);
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function verify(UpdateEmailRequest $request, Email $email)
    {
        // yellow, will be better to do it in Requests
        if ($email->token == $request->input('token')) {
            $email->token = fake()->password(16);
            $email->verfied_at = now();
            $this->mail('verification success', 'delete email', $email);
            return redirect()->back();
        }
        return redirect()->back()->with(['status' => 'Invalid verification request']);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function cancel(UpdateEmailRequest $request)
    {
        return 'You are ready to cancel your subscription '. $request->query('token');
        return $request;
        // if ($email->token == $request->input('token')) {
        //     $email->subscribed_at = null;
        //     $email->token = fake()->password(16);
        //     $email->save();
        //     $this->mail('canceled email', 're-subscribe', $email);
        //     return redirect()->back();
        // }
        // return redirect()->back()->with(['status' => 'Invalid verification request']);
        //
    }

    public function resubscribe(UpdateEmailRequest $request, Email $email)
    {
        if ($email->token == $request->input('token')) {
            $email->subscribed_at = now();
            $email->verified = now();
            $email->token = fake()->password(16);
            $email->save();
            $this->mail('verification success', 'delete email', $email);
            return redirect()->back()->with(['status' => 'You have resubscribed and verified your email address. you may delete the subscription by link in new email, thanks']);
        }
        return redirect()->back()->with(['status' => 'Invalid verification request']);
    }
}
