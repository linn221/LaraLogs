<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showSubscribers()
    {
        $subscribers = Email::whereNot('subscribed_at')->get();
        return view('subscribers', compact('subscribers'));
    }
}
