<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
        //
    }


    public function showLogs(Request $request, Tag $tag)
    {
        $query = $tag->logs();
        $banner = '';
        $banner .= "Showing logs under #$tag->name";
        // searching
        $query->where(function ($query) use($banner, $request) {
            // Logical grouping, VERY critical

            $query->when($request->input('q'), function($query, string $q) use ($banner) {
                $banner .= " with '$q'";
                $query->where('title', 'like', "%$q%")
                ->orWhere('content', 'like', "%$q%");
            });
        });
        // dd($query->dd());
        // sorting & pagination
        $sort = 'updated_at';
        $logs = $query->latest($sort)->paginate(10)->withQueryString();
        $banner .= "(<strong>". $logs->count() . "</strong>)->";
        return view('logs.index', compact('logs', 'banner'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tags.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        $tag = Tag::create(['name' => $request->input('name')]);
        return redirect()->route('tags.index');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->name = $request->input('name');
        $tag->save();
        return redirect()->route('tags.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->back();
        //
    }
}
