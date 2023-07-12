<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function index()
    {
        $query = Log::paginate(10);
        return view('guest.index', compact('logs'));

    }
    public function tag($tag)
    {
        return "You are at /tag";

    }
    public function category()
    {
        return "You are at /index";

    }
    public function log()
    {
        return "You are at /index";

    }
}
