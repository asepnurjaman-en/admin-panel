@extends('layouts.admin')
@section('title', Str::title($data['title']))
@section('content')
<div class="min-h-screen p-3">
	<div class="flex flex-wrap justify-between gap-2 mb-3">
		<a class="btn-secondary inline-block"
			href="{{ $data['back'] }}"
			data-te-ripple-init>
			<i class="bx bx-left-arrow-alt"></i>
			<span>kembali</span>
		</a>
	</div>
	<div class="mb-3">
		@forelse ($blog_comments as $item)			
		<section class="bg-white shadow-lg dark:bg-gray-900 mb-3 antialiased">
			<div class="p-4">
				<h4 class="text-xl">
					{{ $item->title }}
					<a href="{{ route('blog.edit', $item->id) }}" class="text-blue-500 hover:text-blue-600 focus:text-blue-700">
						<i class="bx bx-link-external"></i>
					</a>
				</h4>
				<p class="text-sm text-neutral-400">{{ $item->description }}</p>
			</div>
			<div class="w-full">
				@foreach ($item->comments as $sub_item)					
				<article class="p-6 text-base {{ ($sub_item->publish=='draft') ? "bg-neutral-50" : "bg-white" }} border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
					<div class="flex justify-between items-center mb-2">
						<div class="flex items-center gap-2">
							<p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
								<img class="mr-2 w-6 h-6 rounded-full"
									src="https://flowbite.com/docs/images/people/profile-picture-4.jpg"
									alt="Helene Engels">{{ $sub_item->user->name }}</p>
							<p class="text-sm text-gray-600 dark:text-gray-400">
								<time pubdate datetime="2022-06-23" title="June 23rd, 2022">Jun. 23, 2022</time>
							</p>
						</div>
					</div>
					<p class="text-gray-500 dark:text-gray-400">{{ $sub_item->comment }}</p>
					@if ($sub_item->publish=='draft')
					<div class="flex items-center mt-4 space-x-4">
						<a class="flex items-center text-sm [&>i]:text-green-500 hover:underline dark:text-gray-400 font-medium"
							data-te-ripple-init
							href="{{ route('blog-comment.update', $sub_item->id) }}">
							<i class="bx bx-check mr-2"></i>
							Setujui
						</a>
					</div>
					@endif
				</article>
				@endforeach
			</div>
		</section>
		@empty
		<div class="empty">{{ __('belum ada komentar baru') }}</div>
		@endforelse
	</div>
</div>
@endsection

@push('style')
@endpush

@push('script')
@endpush