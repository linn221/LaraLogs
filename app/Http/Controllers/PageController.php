<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PageController extends Controller
{
    //
    public function index(Request $request)
    {
        $this->validate($request, [
            'sort' => [Rule::in(['category_id', 'title', 'created_at'])]
        ]);
        $query = Log::with(['category', 'tags'])->withCount('emails');
        // searching
        $query->when($request->input('q'), function($query, string $q) {
            $query->search($q);
        });
        // sorting & pagination
        $sort = $request->query('sort') ?? 'updated_at';
        $order = $request->query('order') ?? 'desc';
        $logs = $query->orderBy($sort, $order)
            ->paginate(10)->withQueryString();
        // $recent_logs = Log::orderBy('updated_at')->limit(3)->get();
        return view('guest.index', compact('logs'));
    }

    public function tag(Request $request, Tag $tag)
    {
        // copy & paste from controller code
        // $query = $tag->logs();
        $query = $tag->logs()->with(['category', 'tags']);
        // searching
        $query->where(function ($query) use ($request) {
            // Logical grouping, VERY critical

            $query->when($request->input('q'), function ($query, string $q) {
                $query->search($q);
            });
        });
        // dd($query->dd());
        $sort = $request->query('sort') ?? 'updated_at';
        $order = $request->query('order') ?? 'desc';
        $logs = $query->orderBy($sort, $order)
        ->paginate(10)->withQueryString();
        return view('guest.index', compact('logs'));
    }

    public function category(Request $request, Category $category)
    {
        // copy & paste from controller code
        $query = $category->logs()->with(['category', 'tags']);
        // searching
        $query->where(function ($query) use ($request) {
            // Logical grouping, VERY critical

            $query->when($request->input('q'), function ($query, string $q) {
                $query->search($q);
            });
        });
        // dd($query->dd());
        // sorting & pagination
        $sort = $request->query('sort') ?? 'updated_at';
        $order = $request->query('order') ?? 'desc';
        $logs = $query->orderBy($sort, $order)
        ->paginate(10)->withQueryString();
        return view('guest.index', compact('logs'));
    }

    public function log(Request $request, Log $log)
    {
        return view('guest.log', compact('log'));
    }
}
