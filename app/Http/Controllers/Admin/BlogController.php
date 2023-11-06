<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Strbox;
use App\Models\BlogComment;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Models\Activity;

class BlogController extends Controller
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
		$blog_category = BlogCategory::withCount('blogs')->latest()->get();
		$data = [
			'title' => 'blog',
			'breadcrumb' => [
                ['title' => 'Dasbor', 'url' => route('admin.dashboard')],
                ['title' => 'Blog', 'url' => '#'],
            ],
			'list'	=> route('blog.datatable'),
			'uncategorized'	=> route('blog.uncategorized'),
			'bin'	=> route('blog.bin'),
			'create'=> ['action' => route('blog.create')],
			'delete'=> ['message' => 'Hapus berita?'],
			'comment' => ['action' => route('blog-comment.index'), 'show' => true],
			'comment_count' => BlogComment::wherePublish('draft')->count()
		];

		return response()->view('admin.blog.index', compact('data', 'blog_category'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$blog = json_decode(json_encode([
            'file'=>null, 'publish'=>'publish', 'blog_category_id'=>0
        ]));
        $blog_category = BlogCategory::withCount('blogs')->latest()->get();
        $data = [
			'title'	=> 'buat blog',
			'breadcrumb' => [
                ['title' => 'Dasbor', 'url' => route('admin.dashboard')],
                ['title' => 'Blog', 'url' => route('blog.index')],
                ['title' => 'Blog baru', 'url' => '#'],
            ],
            'back'  => route('blog.index'),
			'form'	=> ['action' => route('blog.store'), 'class' => 'to-store']
		];

        return response()->view('admin.blog.form', compact('data', 'blog', 'blog_category'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request) : JsonResponse
	{
		$request->validate([
            'title' => 'required|max:150',
            'content' => 'required',
            'file_method' => 'required',
            'date_picker' => 'required',
            'time_picker' => 'required',
            'description' => 'required',
            'author' => 'required',
            'blog_category' => 'required',
        ]);
        $column = [
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'content' => $request->input('content'),
            'description' => $request->input('description'),
            'datetime' => date('Y-m-d H:i:s', strtotime($request->input('date_picker').' '.$request->input('time_picker'))),
            'author' => $request->input('author'),
            'blog_category_id' => $request->input('blog_category'),
            'file_type' => 'image',
            'file_source' => $request->input('file_source'),
        ];
        if ($request->input('schedule')=='schedule') :
            $column['publish'] = 'schedule';
            $column['schedule_time'] = date('Y-m-d H:i:s', strtotime($request->input('schedule_date_picker')));
        elseif ($request->input('publish')=='publish') :
            $column['publish'] = 'publish';
        else :
            $column['publish'] = 'draft';
        endif;
        if (count($request->input('tags') ?? [])>0) :
            $column['tags'] = json_encode($request->input('tags'));
        endif;
        if ($request->input('file_method')=='upload') :
            $this->validate($request, [
                'file' => 'required|image|mimes:jpg,jpeg,png'
            ]);
            $file_name = $request->file('file')->hashName();
            $column['file'] = $file_name;
            Storage::disk('public')->put($file_name, file_get_contents($request->file('file')));
            image_reducer(file_get_contents($request->file('file')), $file_name);
            Strbox::create([
                'file' => $file_name,
                'file_type' => 'image',
                'file_source' => $request->input('file_source'),
            ]);
        elseif ($request->input('file_method')=='storage') :
            $this->validate($request, [
                'file_storage' => 'required'
            ]);
            $column['file'] = $request->input('file_storage');
        endif;
        Blog::create($column);

        return response()->json([
            'toast' => ['icon'=>'success', 'title'=>'Data disimpan', 'text'=>$request->input('title').' berhasil disimpan.'],
			'callback' => ['type'=>'redirect', 'url'=>route('blog.index')]
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
	public function edit(string $id) : Response
	{
		$blog_category = BlogCategory::withCount('blogs')->latest()->get();
		$blog = Blog::findOrFail($id);
        $data = [
			'title'	=> 'edit blog',
			'breadcrumb' => [
                ['title' => 'Dasbor', 'url' => route('admin.dashboard')],
                ['title' => 'Blog', 'url' => route('blog.index')],
                ['title' => 'Edit blog', 'url' => '#'],
            ],
            'back'  => route('blog.index'),
			'form'	=> ['action' => route('blog.update', $blog->id), 'class' => 'to-update']
		];

        return response()->view('admin.blog.form', compact('data', 'blog', 'blog_category'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id) : JsonResponse
	{
		$request->validate([
            'title' => 'required|max:150',
            'content' => 'required',
            'file_method' => 'required',
            'date_picker' => 'required',
            'time_picker' => 'required',
            'description' => 'required',
            'author' => 'required',
            'blog_category' => 'required',
        ]);
        $column = [
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'content' => $request->input('content'),
            'description' => $request->input('description'),
            'datetime' => date('Y-m-d H:i:s', strtotime($request->input('date_picker').' '.$request->input('time_picker'))),
            'author' => $request->input('author'),
            'blog_category_id' => $request->input('blog_category'),
            'file_type' => 'image',
            'file_source' => $request->input('file_source'),
        ];
        if ($request->input('schedule')=='schedule') :
            $column['publish'] = 'schedule';
            $column['schedule_time'] = date('Y-m-d H:i:s', strtotime($request->input('schedule_date_picker')));
        elseif ($request->input('publish')=='publish') :
            $column['publish'] = 'publish';
        else :
            $column['publish'] = 'draft';
        endif;
        if (count($request->input('tags') ?? [])>0) :
            $column['tags'] = json_encode($request->input('tags'));
        endif;
        if ($request->input('file_method')=='upload') :
            $this->validate($request, [
                'file' => 'required|image|mimes:jpg,jpeg,png'
            ]);
            $file_name = $request->file('file')->hashName();
            $column['file'] = $file_name;
            Storage::disk('public')->put($file_name, file_get_contents($request->file('file')));
            image_reducer(file_get_contents($request->file('file')), $file_name);
            StrBox::create([
                'file' => $file_name,
                'file_type' => 'image',
                'file_source' => $request->input('file_source')
            ]);
        elseif ($request->input('file_method')=='storage') :
            $this->validate($request, [
                'file_storage' => 'required'
            ]);
            $column['file'] = $request->input('file_storage');
        endif;
		$blog = Blog::findOrFail($id);
        $blog->update($column);

        return response()->json([
            'toast' => ['icon'=>'success', 'title'=>'Data disimpan', 'text'=>$request->input('title').' berhasil disimpan.'],
			'callback' => ['type'=>'redirect', 'url'=>route('blog.index')]
        ]);
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		$blog = Blog::findOrFail($id);
		$blog->delete();
		
		return response()->json([
			'toast' => ['icon'=>'success', 'title'=>'Blog dihapus', 'text'=> $blog->title.' dipindahkan ke keranjang sampah.']
		]);
	}

	/**
	 * Call to datatable
	 */
	public function datatable() : JsonResponse
	{
		$data = Blog::select('id', 'title', 'reads', 'publish', 'blog_category_id')->has('category')->withCount('comments')->latest();
		$data = $data->get();
		$collection = $data->map(function($item) {
			$item['edit'] = route('blog.edit', $item->id);
			$item['log'] = route('blog.log', $item->id);
			$item['delete'] = route('blog.destroy', $item->id);
			$item['message'] = "{$item->title} dipindahkan ke keranjang sampah";
			if ($item->publish=='publish') :
				$item->status_text = "Rilis";
				$item->status_color = "blue";
			elseif ($item->publish=='draft') :
				$item->status_text = "Draft";
				$item->status_color = "amber";
			elseif ($item->publish=='schedule') :
				$item->status_text = "Dijadwalkan";
				$item->status_color = "emerald";
			endif;
			$item['title'] = "<strong class=\"block\" data-an-edit=\"{$item['edit']}\">
								{$item->title}
							</strong>
							<small class=\"leading-none font-semibold uppercase whitespace-nowrap bg-slate-100 text-{$item->status_color}-700 p-1 mr-2\">
								{$item->status_text}
							</small>
							<small class=\"leading-none text-slate-600 mr-2\">{$item->category->title}</small>
							<small class=\"leading-none text-slate-400 underline mr-2\"><a href=\"".route('blog-comment.show', $item->id)."\">{$item->comments_count} komentar</a></small>
							<small class=\"leading-none text-slate-400 mr-2\">{$item->reads} dilihat</small>";
			return $item;
		});
		return response()->json($collection);
	}

	/**
	 * Uncategorized Display a listing of the resource.
	 */
	public function uncategorized() : Response
	{
		$data = [
			'title' => 'blog tak terorganisasi',
			'breadcrumb' => [
                ['title' => 'Dasbor', 'url' => route('admin.dashboard')],
                ['title' => 'Blog', 'url' => route('blog.index')],
                ['title' => 'Blog tak terorganisasi', 'url' => '#'],
            ],
			'list'	=> route('blog.uncategorized.datatable'),
			'back'  => route('blog.index'),
			'delete'=> ['message' => 'Hapus berita?'],
		];

		return response()->view('admin.blog.uncategorized', compact('data'));
	}

	/**
	 * Call to datatable
	 */
	public function uncategorized_datatable() : JsonResponse
	{
		$data = Blog::select('id', 'title', 'reads', 'publish')->doesntHave('category')->withCount('comments')->latest();
		$data = $data->get();
		$collection = $data->map(function($item) {
			$item['edit'] = route('blog.edit', $item->id);
			$item['log'] = route('blog.log', $item->id);
			$item['delete'] = route('blog.destroy', $item->id);
			$item['message'] = "{$item->title} dipindahkan ke keranjang sampah";
			if ($item->publish=='publish') :
				$item->status_text = "Rilis";
			elseif ($item->publish=='draft') :
				$item->status_text = "Draft";
			elseif ($item->publish=='schedule') :
				$item->status_text = "Dijadwalkan";
			endif;
			$item['title'] = "<strong class=\"block text-slate-400\" data-an-edit=\"{$item['edit']}\">
								{$item->title}
							</strong>
							<small class=\"leading-none font-semibold uppercase whitespace-nowrap bg-slate-100 text-slate-400 p-1 mr-2\">
								{$item->status_text}
							</small>
							<small class=\"leading-none text-slate-400 mr-2\">[uncategorized]</small>
							<small class=\"leading-none text-slate-400 underline mr-2\"><a href=\"".route('blog-comment.show', $item->id)."\">{$item->comments_count} komentar</a></small>
							<small class=\"leading-none text-slate-400 mr-2\">{$item->reads} dilihat</small>";
			return $item;
		});
		return response()->json($collection);
	}

	/**
	 * Activity log
	 */
	public function log(int $id): JsonResponse
	{
		$blog = Blog::find($id);
		$log = Activity::forSubject($blog)->latest()->get();
		$response = "<ol class=\"border-l border-neutral-300 dark:border-neutral-500 pb-2\">";
		foreach ($log as $key => $item) :
			if ($item->event=='created') :
				$item->title = "Dibuat";
				$item->color = "emerald";
			elseif ($item->event=='updated') :
				$item->title = "Diubah";
				$item->color = "sky";
			elseif ($item->event=='deleted') :
				$item->title = "Dihapus";
				$item->color = "red";
			endif;
			$item->causer = optional($item->causer)->name;
			$item->date = date_id($item->created_at);
			$log->property = json_decode($item->properties);
			$response .= "<li>";
			$response .= "<div class=\"flex-start flex items-center pt-2\">";
			$response .= "<div class=\"-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bg-neutral-300 dark:bg-neutral-500\"></div>";
			$response .= "<p class=\"text-sm text-neutral-500 dark:text-neutral-300\"><span class=\"text-{$item->color}-700 font-bold\">{$item->title}</span> {$item->date} oleh <span class=\"font-bold\">{$item->causer}</span></p>";
			$response .= "</div>";
			$response .= "<div class=\"block mb-4 ml-4 mt-2\">";
			$response .= "<table class=\"w-full border\">";
			foreach ($log->property->attributes ?? [] as $col => $val) :
				$response .= "<tr>";
				$response .= "<th class=\"text-sm bg-slate-100 font-thin py-1 px-2 w-[20px]\">{$col}</th>";
				$response .= "<td class=\"text-sm break-all py-1 px-2\">{$val}</td>";
				$response .= "</tr>";
			endforeach;
			$response .= "</table>";
			$response .= "<table class=\"w-full bg-gray-50 border mt-1 text-neutral-400\">";
			foreach ($log->property->old ?? [] as $col => $val) :
				$response .= "<tr>";
				$response .= "<th class=\"text-sm bg-gray-200 font-thin py-1 px-2 w-[20px]\">{$col}</th>";
				$response .= "<td class=\"text-sm break-all py-1 px-2\">{$val}</td>";
				$response .= "</tr>";
			endforeach;
			$response .= "</table>";
			$response .= "</div>";
			$response .= "</li>";
		endforeach;
		$response .= "</ol>";
		
		return response()->json($response);
	}
	/**
	 * Recycle Bin
	 */
	public function bin(): Response
	{
		$blog = Blog::onlyTrashed()->paginate(30);
		$data = [
			'title' => 'sampah blog',
			'breadcrumb' => [
                ['title' => 'Dasbor', 'url' => route('admin.dashboard')],
                ['title' => 'Blog', 'url' => route('blog.index')],
                ['title' => 'Keranjang sampah', 'url' => '#'],
            ],
            'back'  => route('blog.index'),
			'delete'=> ['action' => route('blog.bin.clear'), 'message' => 'Blog akan dihapus permanen']
		];
		
		return response()->view('admin.blog.bin', compact('data', 'blog'));
	}
	/**
	 * Restore bin.
	 */
	public function bin_restore(int $id): JsonResponse
	{
		$blog = Blog::whereId($id);
		$blog->restore();

		return response()->json([
			'toast' => ['icon'=>'success', 'title'=>'Blog dipulihkan', 'text'=> 'Blog telah dipulihkan.'],
			'callback' => ['type'=>'reload']
		]);
	}
	/**
	 * Remove permanently from bin.
	 */
	public function bin_clear(): JsonResponse
	{
		Blog::onlyTrashed()->forceDelete();
		
		return response()->json([
			'toast' => ['icon'=>'success', 'title'=>'Keranjang sampah bersih', 'text'=>'Blog sudah dihapus permanen.'],
			'callback' => ['type'=>'reload']
		]);
	}
}
