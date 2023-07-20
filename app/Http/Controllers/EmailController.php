<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmailRequest;
use App\Http\Requests\UpdateEmailRequest;
use App\Mail\InformativeMail;
use App\Mail\NewPostMail;
use App\Models\Email;
use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * Store a newly created resource in storage.
    */
    public function subscribe(StoreEmailRequest $request)
    {
        $email = new Email;
        $email->address = $request->input('email-address');
        $email->token = fake()->password(18);
        $email->save();
        // send email on observer
        Mail::to($email->address)->send(new InformativeMail('success', 'Subscription success' , $email));
        return redirect()->back()->with(['status' => 'YOu now have active scription to new posts. You can unsubscribe from the link in the email']);
        // return redirect()->back()->with(['status' => 'YOu now have active scription to new posts. You can unsubscribe from the link in the email but be cautious becuase you can only subscribe again by the re-subscribe link for non-verified accounts']);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function cancel(UpdateEmailRequest $request)
    {
        $email = Email::where('address', $request->query('email'))->first();
        // die($email);
        if ($email->token == $request->query('token')) {
            $email->subscribed_at = null;
            $email->token = fake()->password(18);
            $email->save();
            Mail::to($email->address)->send(new InformativeMail('cancel', 'Cancel subscription success' ,$email));
            return redirect()->route('page.index')->with(['status' => 'subscription successfully canceled']);
            // return redirect()->route('page.index')->with(['status' => 'scription successfully canceled. find link to re-subscribe again at new email, which is the only way to restore subscription for non-verified addresses']);
        }

        return redirect()->route('page.index')->with(['status' => 'Invalid validation request']);
    }

    public function resubscribe(UpdateEmailRequest $request)
    {
        $email = Email::where('address', $request->query('email'))->first();
        // die($email);
        if ($email->token == $request->query('token')) {
            $email->subscribed_at = now();
            $email->token = fake()->password(18);
            $email->save();
            Mail::to($email->address)->send(new InformativeMail('resub', 'Subscription success', $email));
            return redirect()->route('page.index')->with(['status' => 'subscription successfully restored']);
            // return redirect()->route('page.index')->with(['status' => 'scription successfully canceled. find link to re-subscribe again at new email, which is the only way to restore subscription for non-verified addresses']);
        }

        return redirect()->route('page.index')->with(['status' => 'Invalid validation request']);
    }

    public function follow(Request $request) {
        $request->validate([
            'post-id' => "required|exists:logs,id",
            'email-address' => 'required'
        ]);
        // create email if it doesn't exist on subscribers
        $email = Email::where('address', $request->input('email-address'))->firstOr(function() {
            $email = new Email;
            $email->address = request()->input('email-address');
            $email->subscribed_at = null;
            $email->token = fake()->password(16);
            $email->save();
            return $email;
        });

        $email->logs()->attach($request->input('post-id'));
        return redirect()->back()->with(['status' => 'subscription success']);
    }
}
