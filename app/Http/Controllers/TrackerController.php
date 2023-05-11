<?php

namespace App\Http\Controllers;

use App\Models\Tracker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Tracker::with('categories.groupTypes')->get();
        $tracker = Tracker::with('category', 'groupType')->whereUserId(Auth::user()->id)->get();

        return response()->json($tracker);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['user_id'] = Auth::user()->id;
        $tracker = Tracker::create($request->all())->whereUserId(Auth::user()->id);        
        return response()->json($tracker, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tracker $tracker)
    {
        return Tracker::find($tracker)->whereUserId(Auth::user()->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tracker $tracker)
    {
        $tracker->update($request->all());
        return response()->json($tracker, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tracker $tracker)
    {
        $tracker::whereUserId(Auth::user()->id)->where('id', $tracker->id)->delete();        
        return response()->json(null, 204);
    }
}
