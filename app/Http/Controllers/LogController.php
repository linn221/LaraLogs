<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLogRequest;
use App\Http\Requests\UpdateLogRequest;
use App\Models\Log;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logs = Log::all();
        return view('logs.index', compact('logs'));
        //
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
        return redirect()->route('logs.index');
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
        return redirect()->route('logs.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Log $log)
    {
        $log->delete();
        return redirect()->route('logs.index');
        //
    }
}
