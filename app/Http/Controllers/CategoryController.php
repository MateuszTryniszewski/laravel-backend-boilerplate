<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Category::whereUserId(Auth::user()->id)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['user_id'] = Auth::user()->id;
        $category = Category::create($request->all())->whereUserId(Auth::user()->id);        
        return response()->json($category, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return Category::find($category)->whereUserId(Auth::user()->id);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return response()->json($category, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category::whereUserId(Auth::user()->id)->where('id', $category->id)->delete();        
        return response()->json(null, 204);
    }
}
