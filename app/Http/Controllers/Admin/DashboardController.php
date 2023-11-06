<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Strbox;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

    public function index() : Response
    {
        $blog = [
            'count' => Blog::count(),
            'url' => route('blog.index'),
        ];
        $data = [
            'title' => 'selamat datang '.Auth::user()->name,
            'breadcrumb' => [
                ['title' => 'Dasbor', 'url' => '#'],
            ],
        ];
        return response()->view('admin.dashboard', compact('data', 'blog'));
    }

    public function strbox_datatable() : JsonResponse
    {
        $data = Strbox::select('id', 'file', 'file_source')->latest()->get();
        $collection = $data->map(function($item) {
            $item['edit'] = null;
            $item['delete'] = null;
            $item['file'] = "<img src=\"".url('storage/xs/'.$item->file)."\" class=\"rounded h-8 w-8 object-cover\" alt=\"{$item->file}\">";
            $item['title'] = "<div data-an-edit=\"{$item['edit']}\" class=\"flex items-center gap-2\">{$item['file']}<span>{$item->file_source}</span></div>";
            return $item;
        });
		return response()->json($collection);
    }
}
