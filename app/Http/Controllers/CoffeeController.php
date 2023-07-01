<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CoffeeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        $world_logs = Category::findOrFail(16)->logs()->count('id');
        dd($world_logs);
        return "This route is for testing stuffs.";
    }
}
