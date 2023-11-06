@extends('layouts.admin')
@section('title', Str::title($data['title']))
@section('content')
<div class="min-h-screen p-3 pb-20">
    @include('layouts.component.breadcrumb', ['breadcrumb'=>$data['breadcrumb']])
    <div class="flex justify-between mb-3 pb-3">
        <a class="btn-secondary inline-block"
            href="{{ $data['back'] }}"
            data-te-ripple-init>
            <i class="bx bx-left-arrow-alt"></i>
            <span>{{ __('kembali') }}</span>
        </a>
    </div>
    <div class="grid lg:grid-cols-2 gap-2 mb-2">
        <div class="bg-white rounded shadow-lg py-5 px-3">
            <form action="{{ $data['form']['action'] }}" class="{{ $data['form']['class'] }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="relative mt-3 mb-1" 
                    data-te-input-wrapper-init>
                    <input class="peer form-control"
                        type="text"
                        name="category_title" 
                        id="category_title" 
                        value="{{ $blog_category->title ?? old('category_title') }}" 
                        placeholder="Kategori" 
                        required>
                    <label class="control-label"
                        for="category_title">
                        {{ __('Nama kategori') }}
                        @error('category_title')
                        <span class="text-red-700">*</span>
                        @enderror
                    </label>
                </div>
                @error('category_title')
                <small class="text-red-500">{{ $message }}</small>
                @enderror
                <div class="relative mt-3 mb-1" 
                    data-te-input-wrapper-init>
                    <input class="peer form-control"
                        type="text"
                        name="category_slug" 
                        id="category_slug" 
                        value="{{ $blog_category->slug ?? old('category_slug') }}" 
                        placeholder="Slug" 
                        required>
                    <label class="control-label"
                        for="category_slug">
                        {{ __('Slug') }}
                        @error('category_slug')
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
                        data-te-ripple-init data-te-ripple-color="light">
                        <i class="bx bx-save"></i>
                        {{ __('simpan') }}
                    </button>
                </div>
            </form>
        </div>
        <div class="text-center py-10 px-3">
            <h4 class="capitalize text-lg font-semibold mb-2">{{ __('hapus `'.$blog_category->title.'`?') }}</h4>
            <p class="text-sm text-slate-500">{{ __('Blog terkait dengan kategori '.$blog_category->title.' akan dipindahkan ke tak terorganisasi.') }}</p>
            <a class="btn-danger inline-block to-clear my-5"
                href="{{ $data['delete']['action'] }}"
			    data-message="{{ $data['delete']['message'] }}"
                data-te-ripple-init
                data-te-ripple-color="light">
                <i class="bx bx-trash"></i>
                <span>{{ __('hapus kategori') }}</span>
            </a>
        </div>
    </div>
</div>
@endsection

@push('script')
@endPush
