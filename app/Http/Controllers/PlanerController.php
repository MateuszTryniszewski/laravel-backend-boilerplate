<?php

namespace App\Http\Controllers;

use App\Models\Planer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $planer = Planer::with('category', 'groupType')->whereUserId(Auth::user()->id)->get();
        return response()->json($planer);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['user_id'] = Auth::user()->id;
        $planer = Planer::create($request->all())->whereUserId(Auth::user()->id);        
        return response()->json($planer, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Planer $planer)
    {
        return Planer::find($planer)->whereUserId(Auth::user()->id);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Planer $planer)
    {
        $planer->update($request->all());
        return response()->json($planer, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Planer $planer)
    {
        $planer::whereUserId(Auth::user()->id)->where('id', $planer->id)->delete(); 
        return response()->json(null, 204);
    }
}
