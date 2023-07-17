<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLogRequest;
use App\Http\Requests\UpdateLogRequest;
use App\Models\Image;
use App\Models\Log;
use App\Models\Tag;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Log::query();
        // searching
        $query->when($request->input('q'), function (Builder $query, string $q) {
            $query->where('title', 'like', "%$q%")
                ->orWhere('content', 'like', "%$q%");
        });
        // sorting & pagination
        $sort = 'updated_at';
        $logs = $query->latest($sort)->paginate(10)->withQueryString();
        return view('logs.index', compact('logs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('logs.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLogRequest $request)
    {
        $log = new Log;
        $log->title = $request->input('title');
        $log->content = $request->input('content');
        $log->category_id = $request->input('cat');
        $log->save();
        // tags
        if ($request->has('tags')) {
            $log->tags()->attach($request->input('tags'));
        }
        // images
        if ($temp_images = Log::find(1)->images) {
            foreach ($temp_images as $image) {
                $image->log_id = $log->id;
                $image->save();
            }
        }
        // i want to use like a status object, with message, and action, and model class, but dumpy string for now
        $status = "Log created at #$log->id: ".
        "<a href='". route('logs.show', $log->id) . "' class=' text-decoration-none'>Show</a> ".
        "<a href='". route('logs.edit', $log->id) . "' class=' text-decoration-none'>Edit</a> "
        ;
        return redirect()->route('logs.index')
            ->with(['status' => $status]);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Log $log)
    {
        return view('logs.show', compact('log'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Log $log)
    {
        return view('logs.edit', compact('log'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLogRequest $request, Log $log)
    {
        $log->title = $request->input('title');
        $log->content = $request->input('content');
        $log->category_id = $request->input('cat');
        $log->save();
        $log->tags()->sync($request->input('tags'));
        // return redirect()->route('logs.index');
        $status = "Log updated at #$log->id: ".
        "<a href='". route('logs.show', $log->id) . "' class=' text-decoration-none'>Show</a> ".
        "<a href='". route('logs.edit', $log->id) . "' class=' text-decoration-none'>Edit</a> "
        ;
        return redirect()->route('logs.index')
            ->with(['status' => $status, 'status-color' => 'warning']);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Log $log)
    {
        $id = $log->id;
        $log->delete();
        $status = "Log deleted at #$log->id: Restore button";
        return redirect()->route('logs.index')
            ->with(['status' => $status, 'status-color' => 'danger']);
        // return redirect()->route('logs.index');
        //
    }
}
