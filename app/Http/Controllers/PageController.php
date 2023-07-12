<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Log;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Log::query();
        // searching
        $query->when($request->input('q'), function(Builder $query, string $q) {
            $query->where('title', 'like', "%$q%")
            ->orWhere('content', 'like', "%$q%");
        });
        // sorting & pagination
        $sort = 'updated_at';
        $logs = $query->latest($sort)->paginate(10)->withQueryString();
        return view('guest.index', compact('logs'));

    }
    public function tag(Request $request, Tag $tag)
    {
        // copy & paste from controller code
        $query = $tag->logs();
        // searching
        $query->where(function ($query) use ($request) {
            // Logical grouping, VERY critical

            $query->when($request->input('q'), function ($query, string $q) {
                $query->where('title', 'like', "%$q%")
                    ->orWhere('content', 'like', "%$q%");
            });
        });
        // dd($query->dd());
        // sorting & pagination
        $sort = 'updated_at';
        $logs = $query->latest($sort)->paginate(10)->withQueryString();
        return view('guest.index', compact('logs'));
    }

    public function category(Request $request, Category $category)
    {
        // copy & paste from controller code
        $query = $category->logs();
        // searching
        $query->where(function ($query) use ($request) {
            // Logical grouping, VERY critical

            $query->when($request->input('q'), function ($query, string $q) {
                $query->where('title', 'like', "%$q%")
                    ->orWhere('content', 'like', "%$q%");
            });
        });
        // dd($query->dd());
        // sorting & pagination
        $sort = 'updated_at';
        $logs = $query->latest($sort)->paginate(10)->withQueryString();
        return view('guest.index', compact('logs'));
    }

    public function log(Request $request, Log $log)
    {
        return view('guest.log', compact('log'));
    }
}
