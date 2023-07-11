<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function index()
    {
        return "You are at /index";

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
