<?php

namespace App\Http\Controllers;

use App\Mail\InformativeMail;
use App\Mail\NewPostMail;
use App\Models\Category;
use App\Models\Email;
use App\Models\Image;
use App\Models\Log;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CoffeeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $query = Log::with(['category', 'tags']);
        dd($query->withCount('emails')->get());
        // $subscribers = Email::query()->where('subscribed_at')->get();
        return route('email.unsub', ['email' => 'shit', 'token' => 'slkdsfd']);
        $email = Email::first();
        Mail::to($email->address)->later(now()->addSeconds(30), new InformativeMail('success', 'Subscription success' , $email));
        // dd($subscribers[0]);
        // $image = Image::first();
        // $img = asset(Storage::url($image->uri));
        // return view('beer', compact('img'));
        // $arr = ['coffee', 'tea', 'coffee'];
        // return array_unique($arr);
        // $log = Log::find(1);
        // dd($log);
        // $images = Image::all();
        // return view('image', compact('images'));
        // dd($request);
        // $apple = 'shit';
        // $q = Log::query()
        // ->when($request->has('shit'), function(Builder $query, string $apple) {
        //     dd($apple);
        // });
        // ->where('title', 'like', "%$q%")
        // ->orWhere('content', 'like', "%$q%")
        // ->get();
        // dd($logs);
        //
        // $world_logs = Category::findOrFail(16)->logs()->count('id');
        // dd($world_logs);
        return "This route is for testing stuffs.";
    }
}
