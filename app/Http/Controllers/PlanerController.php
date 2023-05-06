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
        $planer = Planer::with('category', 'groupType')->get();
        return response()->json($planer);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['user_id'] = Auth::user()->id;
        $planer = Planer::create($request->all());        
        return response()->json($planer, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Planer $planer)
    {
        return Planer::find($planer);
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
        $planer->delete();
        return response()->json(null, 204);
    }
}
