<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
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
        $blog_category = BlogCategory::findOrFail($id);
        $data = [
			'title'	=> $blog_category->title,
			'breadcrumb' => [
                ['title' => 'Dasbor', 'url' => route('admin.dashboard')],
                ['title' => 'Blog', 'url' => route('blog.index')],
                ['title' => 'Edit kategori', 'url' => '#'],
            ],
            'back'  => route('blog.index'),
			'form'	=> ['action' => route('blog-category.update', $blog_category->id), 'class' => 'to-update'],
            'delete'=> ['action' => route('blog-category.destroy', $blog_category->id), 'message' => 'Kategori akan dipindahkan ke keranjang sampah.']
		];

        return response()->view('admin.blog.category', compact('data', 'blog_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_title' => 'required|string|unique:blog_categories,title,'.$id.',id',
            'category_slug' => 'required|string|unique:blog_categories,slug,'.$id.',id',
        ]);
        $blog_category = BlogCategory::findOrFail($id);
        $blog_category->update([
            'title' => $request->category_title,
            'slug' => Str::slug($request->category_title)
        ]);

        return response()->json([
            'toast' => ['icon'=>'success', 'title'=>'Perubahan kategori disimpan', 'text'=>$blog_category->title.' berhasil diubah.'],
			'callback' => ['type'=>'reload']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog_category = BlogCategory::findOrFail($id);
		$blog_category->delete();
		
		return response()->json([
			'toast' => ['icon'=>'success', 'title'=>'Blog dihapus', 'text'=> $blog_category->title.' dipindahkan ke keranjang sampah.'],
            'callback' => ['type'=>'redirect', 'url'=>route('blog.index')]
		]);
    }

    /**
	 * Recycle Bin
	 */
	public function bin(): Response
	{
		$blog_category = BlogCategory::onlyTrashed()->paginate(30);
		$data = [
			'title' => 'sampah kategori',
			'breadcrumb' => [
                ['title' => 'Dasbor', 'url' => route('admin.dashboard')],
                ['title' => 'Blog', 'url' => route('blog.index')],
                ['title' => 'Keranjang sampah', 'url' => '#'],
            ],
            'back'  => route('blog.index'),
			'delete'=> ['action' => route('blog-category.bin.clear'), 'message' => 'Kategori akan dihapus permanen']
		];
		
		return response()->view('admin.blog.bin-category', compact('data', 'blog_category'));
	}
	/**
	 * Restore bin.
	 */
	public function bin_restore(int $id): JsonResponse
	{
		$blog_category = BlogCategory::whereId($id);
		$blog_category->restore();

		return response()->json([
			'toast' => ['icon'=>'success', 'title'=>'Blog dipulihkan', 'text'=> 'Kategori telah dipulihkan.'],
			'callback' => ['type'=>'reload']
		]);
	}
	/**
	 * Remove permanently from bin.
	 */
	public function bin_clear(): JsonResponse
	{
		BlogCategory::onlyTrashed()->forceDelete();
		
		return response()->json([
			'toast' => ['icon'=>'success', 'title'=>'Keranjang sampah bersih', 'text'=>'Kategori sudah dihapus permanen.'],
			'callback' => ['type'=>'reload']
		]);
	}
}
