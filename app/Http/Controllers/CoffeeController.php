<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Log;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;

class CoffeeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // $log = Log::find(1);
        // dd($log);
        $images = Image::all();
        return view('image', compact('images'));
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
