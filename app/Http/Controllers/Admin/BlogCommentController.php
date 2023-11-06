<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class BlogCommentController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 */
	public function index() : Response
	{
		$blog_comments = Blog::whereHas('comments', function($query) {
            $query->wherePublish('draft');
        })->with(['comments' => function($query) {
            $query->wherePublish('draft');
        }])->latest()->get();
		$data = [
			'title' => 'komentar',
			'breadcrumb' => [
                ['title' => 'Dasbor', 'url' => route('admin.dashboard')],
                ['title' => 'Blog', 'url' => route('blog.index')],
                ['title' => 'Permintaan komentar', 'url' => '#'],
            ],
            'back'  => route('blog.index'),
		];

		return response()->view('admin.blog.comment', compact('data', 'blog_comments'));
	}

	/**
	 * Display a listing of the resource.
	 */
	public function show(int $id) : Response
	{
		$blog_comments = Blog::whereHas('comments')->whereId($id)->get();
		$data = [
			'title' => 'komentar',
			'breadcrumb' => [
                ['title' => 'Dasbor', 'url' => route('admin.dashboard')],
                ['title' => 'Blog', 'url' => route('blog.index')],
                ['title' => 'Komentar', 'url' => '#'],
            ],
            'back'  => route('blog.index'),
		];

		return response()->view('admin.blog.comment', compact('data', 'blog_comments'));
	}

    /**
	 * Update the specified resource in storage.
	 */
	public function update(string $id) : RedirectResponse
	{
        $blog_comment = BlogComment::findOrfail($id);
        $blog_comment->update(['publish'=>'publish']);

        return redirect()->back();
    }
}
