<?php

namespace App\Http\Controllers;

use App\Models\Harmonogram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HarmonogramController extends Controller
{
    public function index()
    {
        $harmonogram = Harmonogram::with('category', 'groupType')->whereUserId(Auth::user()->id)->get();
        return response()->json($harmonogram);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['user_id'] = Auth::user()->id;
        $harmonogram = Harmonogram::create($request->all())->whereUserId(Auth::user()->id);        
        return response()->json($harmonogram, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Harmonogram $harmonogram)
    {
        return Harmonogram::find($harmonogram)->whereUserId(Auth::user()->id);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Harmonogram $harmonogram)
    {
        $harmonogram->update($request->all());
        return response()->json($harmonogram, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Harmonogram $harmonogram)
    {
        $harmonogram::whereUserId(Auth::user()->id)->where('id', $harmonogram->id)->delete(); 
        return response()->json(null, 204);
    }
}
