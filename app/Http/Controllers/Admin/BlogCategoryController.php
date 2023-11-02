<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogCategoryController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_title' => 'required|string|unique:blog_categories,title'
        ]);
        BlogCategory::create([
            'title' => $request->category_title,
            'slug' => Str::slug($request->category_title)
        ]);

        return response()->json([
            'toast' => ['icon'=>'success', 'title'=>'Kategori disimpan', 'text'=>$request->input('category_title').' berhasil ditambahkan.'],
			'callback' => ['type'=>'reload']
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
