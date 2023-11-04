@extends('layouts.admin')
@section('title', Str::title($data['title']))
@section('content')
<section class="min-h-screen p-3">
	<div class="flex flex-wrap justify-between gap-2 mb-3">
		<div class="flex gap-2">
			<a class="btn-secondary inline-block"
				href="{{ $data['back'] }}"
				data-te-ripple-init>
				<i class="bx bx-left-arrow-alt"></i>
				<span>kembali</span>
			</a>
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
@endsection

@push('style')
@endpush

@push('script')
@include('layouts.component.modal-log')
@endpush