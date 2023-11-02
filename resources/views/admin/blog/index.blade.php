@extends('layouts.admin')

@section('content')
<section class="min-h-screen p-3">
	<div class="flex flex-wrap justify-between gap-2 mb-3">
		<div class="flex gap-2">
			<a class="btn-primary btn-ux-primary inline-block"
				href="{{ $data['create']['action'] }}"
				data-te-ripple-init
				data-te-ripple-color="light">
				<i class="bx bx-plus"></i>
				<span>tulis blog</span>
			</a>
			<button class="btn-secondary inline-block"
				type="button"
				data-te-offcanvas-toggle
  				data-te-target="#offcanvasBlogCategory"
				data-te-ripple-init
				data-te-ripple-color="light">
				<i class="bx bx-carousel"></i>
				<span>kategori</span>
			</button>
		</div>
		<div class="flex gap-2">
			<a class="btn-secondary"
				href="{{ $data['bin'] }}"
				data-te-ripple-init
				data-te-ripple-color="light">
				<i class="bx bx-trash"></i>
				<span>keranjang sampah</span>
			</a>
			@if ($data['comment']['show']===true)			
			<a class="btn-secondary relative"
				href="{{ $data['comment']['action'] }}"
				data-te-ripple-init
				data-te-ripple-color="light">
				@if ($data['comment_count']>0)				
				<div class="absolute bottom-auto left-auto right-0 top-0 z-10 block -translate-y-1/2 translate-x-2/4 rotate-0 skew-x-0 skew-y-0 scale-75 rounded-full bg-red-600 p-1 h-5 min-w-[1.25rem] leading-none text-white text-center text-xs">
					{{ $data['comment_count'] }}
				</div>
				@endif
				<i class="bx bx-message-square-dots"></i>
				<span>komentar</span>
			</a>
			@endif
		</div>
	</div>
	<div class="bg-white rounded shadow-2xl mb-3">
		<div class="relative p-4 mb-2 flex w-full flex-wrap items-stretch">
			<span class="flex items-center whitespace-nowrap rounded-l border border-r-0 pl-4 pr-2 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-neutral-700 dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200"
				data-te-input-group-text-ref>
				<i class="bx bx-search"></i>
			</span>
			<input class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-r border border-l-0 bg-transparent bg-clip-padding px-3 py-[1rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:text-neutral-700 focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
				id="dataLive-search"
				type="search"
				placeholder="Cari judul blog"
				aria-label="Cari judul blog"
				aria-describedby="search" />
		</div>
		<div id="dataLive" data-an-fetch="{{ $data['list'] }}" data-te-clickable-rows="true"></div>
	</div>
</section>
<div class="invisible fixed bottom-0 right-0 top-0 z-[1045] flex w-96 max-w-full translate-x-full flex-col border-none bg-white bg-clip-padding text-neutral-700 shadow-sm outline-none transition duration-300 ease-in-out dark:bg-neutral-800 dark:text-neutral-200 [&[data-te-offcanvas-show]]:transform-none"
	tabindex="-1"
	id="offcanvasBlogCategory"
	aria-labelledby="offcanvasBlogCategoryLabel"
	data-te-offcanvas-init>
	<div class="flex items-center justify-between px-4 py-3">
		<h5 class="mb-0 uppercase leading-normal"
			id="offcanvasBlogCategoryLabel">
			<i class="bx bx-carousel"></i>
			{{ __('Kategori') }}
		</h5>
		<button class="box-content rounded-none border-none opacity-50 hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
			type="button"
			data-te-offcanvas-dismiss>
			<span class="w-[1em] focus:opacity-100 disabled:pointer-events-none disabled:select-none disabled:opacity-25 [&.disabled]:pointer-events-none [&.disabled]:select-none [&.disabled]:opacity-25">
				<svg xmlns="http://www.w3.org/2000/svg"
					fill="none"
					viewBox="0 0 24 24"
					stroke-width="1.5"
					stroke="currentColor"
					class="h-6 w-6">
					<path
						stroke-linecap="round"
						stroke-linejoin="round"
						d="M6 18L18 6M6 6l12 12" />
				</svg>
			</span>
		</button>
	</div>
	<div class="offcanvas-body flex-grow overflow-y-auto px-3 py-2">
		<div class="rounded shadow-lg p-3">
			<form action="{{ route('blog-category.store') }}" method="post" class="to-store">
				@csrf
				<div class="relative mt-3 mb-1" 
					data-te-input-wrapper-init>
					<input class="peer form-control"
						type="text"
						name="category_title" 
						id="category_title" 
						value="{{ old('category_title') }}" 
						placeholder="Kategori" 
						required>
					<label class="control-label"
						for="category_title">
						{{ __('Kategori Baru') }}
						@error('category_title')
						<span class="text-red-700">*</span>
						@enderror
					</label>
				</div>
				@error('category_title')
				<small class="text-red-500">{{ $message }}</small>
				@enderror
				<div class="mt-4 flex items-center justify-between">
					<button class="btn-primary w-full"
						type="submit" 
						data-te-ripple-init data-te-ripple-color="light">Buat kategori baru</button>
				</div>
			</form>
		</div>
		<hr class="my-2">
		@forelse ($blog_category as $item)
		<a class="flex justify-between items-center bg-white rounded shadow p-3 my-2 transition hover:bg-slate-100"
			data-te-ripple-init
			data-te-ripple-color="dark"
			href="#">
			<div>
				<h5 class="font-bold text-base mb-0">{{ $item->title }}</h5>
				<span class="text-slate-300 text-sm">{{ __($item->blogs_count.' Blog') }}</span>
			</div>
			<span>
				<i class="bx bx-chevron-right"></i>
			</span>
		</a>
		@empty
		<div class="empty">Belum ada kategori</div>
		@endforelse
	</div>
	<div class="offcanvas-footer p-3">
		<a class="btn-secondary block w-full text-center"
			href="{{ $data['bin'] }}"
			data-te-ripple-init
			data-te-ripple-color="light">
			<i class="bx bxs-carousel"></i>
			<span>kelola kategori</span>
		</a>
	</div>
</div>
@endsection

@push('style')
@endpush

@push('script')
@include('layouts.component.modal-log')
@endpush