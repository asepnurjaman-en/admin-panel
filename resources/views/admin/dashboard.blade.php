@extends('layouts.admin')
@section('title', Str::title($data['title']))
@section('content')
<section class="min-h-screen p-3 pb-20">
    @include('layouts.component.breadcrumb', ['breadcrumb'=>$data['breadcrumb']])
    <div class="flex gap-3 mb-3">
        <div class="w-full md:w-1/3">
            <div class="flex flex-col items-center justify-center gap-3 bg-sky-500 rounded shadow-md shadow-black/5 py-10">
                <i class="bx bx-user-circle text-white text-5xl mb-1"></i>
                <span class="capitalize text-center text-white">
                    {{ __('selamat datang') }}
                    <b class="block text-xl">{{ Auth::user()->name }}</b>
                </span>
            </div>
        </div>
        <div class="w-full md:w-1/5">
            <div class="flex flex-col items-center justify-center gap-3 bg-white rounded shadow-md shadow-black/5 py-8">
                <b class="flex items-center justify-center bg-slate-100 rounded-full text-xl w-[50px] h-[50px]">{{ $blog['count'] }}</b>
                <span class="capitalize text-center">
                    {{ __('blog') }}
                </span>
                <a class="btn-secondary"
                    href="{{ $blog['url'] }}">
                    {{ __('lihat semua') }}
                </a>
            </div>
        </div>
    </div>
    <div class="flex">
        <div class="w-full">
            <div class="flex flex-col items-center justify-center gap-3 bg-white rounded shadow-md shadow-black/5 py-8">
                chart
            </div>
        </div>
    </div>
</section>
@endsection
