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
    public function subscribe(StoreEmailRequest $request)
    {
        $email = new Email;
        $email->address = $request->input('email-address');
        $email->token = fake()->password(18);
        $email->save();
        // send email on observer
        Mail::to($email->address)->send(new InformativeMail("Subscripion success", 'success', $email));
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
            Mail::to($email->address)->send(new InformativeMail("Subscripion canceled.", 'cancel'));
            return redirect()->route('page.index')->with(['status' => 'subscription successfully canceled']);
            // return redirect()->route('page.index')->with(['status' => 'scription successfully canceled. find link to re-subscribe again at new email, which is the only way to restore subscription for non-verified addresses']);
        }

        return redirect()->back()->with(['status' => 'Invalid verification request']);
    }
    /**
     * Update the specified resource in storage.
     */
    // public function verify(UpdateEmailRequest $request)
    // {
    //     // yellow, will be better to do it in Requests
    //     $email = Email::find($request->query('email'));
    //     if ($email->token == $request->query('token')) {
    //         $email->token = fake()->password(18);
    //         $email->verfied_at = now();
    //         Mail::to($email->address)->send(new InformativeMail("Email Varified successfully", 'verified'));
    //         return redirect()->route('page.index')->with(['staus' => 'Email have been verified successfully']);
    //     }
    //     return redirect()->route('page.index')->with(['status' => 'Invalid verification request']);
    //     //
    // }
}