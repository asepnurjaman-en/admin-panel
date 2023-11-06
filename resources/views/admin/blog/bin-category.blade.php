@extends('layouts.admin')
@section('title', Str::title($data['title']))
@section('content')
<div class="min-h-screen p-3">
    @include('layouts.component.breadcrumb', ['breadcrumb'=>$data['breadcrumb']])
	<div class="flex flex-wrap justify-between gap-2 mb-3">
		<a class="btn-secondary inline-block"
			href="{{ $data['back'] }}"
			data-te-ripple-init>
			<i class="bx bx-left-arrow-alt"></i>
			<span>{{ __('kembali') }}</span>
		</a>
		@if (count($blog_category)>0)			
		<a class="btn-danger to-clear"
			href="{{ $data['delete']['action'] }}"
			data-message="{{ $data['delete']['message'] }}"
			data-te-ripple-init>
			<i class="bx bxs-trash-alt"></i>
			<span>{{ __('kosongkan sampah') }}</span>
		</a>
		@endif
	</div>
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
			@forelse ($blog_category as $item)
			<div class="flex items-center justify-between rounded-lg bg-white p-4 shadow-lg dark:bg-neutral-700">
                <div>
                    <h5 class="text-sm lg:text-xl font-medium leading-tight text-neutral-800 mb-2 mr-2 dark:text-neutral-50">
                        {{ $item->title }}
                    </h5>
                    <p class="mb-2 text-xs text-neutral-600 dark:text-neutral-200">
                        <span class="text-slate-400">Dihapus</span>
                        {{ dated_id($item->deleted_at) }}
                    </p>
                </div>
                <div>
                    <a class="to-restore btn-secondary flex items-center gap-2"
                        href="{{ route('blog-category.bin.restore', $item->id) }}"
                        data-te-ripple-init
                        data-te-ripple-color="light">
                        <i class="bx bx-refresh"></i>
                        <span>{{ __('pulihkan') }}</span>
                    </a>
                </div>
			</div>
			@empty
			<div class="empty col-span-3 text-slate-400 text-center py-10 w-full">{{ __('kosong') }}</div>
			@endforelse
		</div>
		<div class="mt-4">
			{{ $blog_category->links('pagination::simple-tailwind') }}
		</div>
</div>
@endsection

@push('style')
@endpush

@push('script')
@endpush