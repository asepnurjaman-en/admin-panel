@extends('layouts.admin')
@section('title', Str::title($data['title']))
@section('content')
<section class="h-screen p-3">
    @include('layouts.component.breadcrumb', ['breadcrumb'=>$data['breadcrumb']])
    <div class="bg-white rounded shadow p-4">
        <div class="grid lg:grid-cols-2 gap-2 mb-2">
            <div class="p-4">
                <div class="flex flex-col lg:flex-row gap-2">
                    <div class="w-full md:w-2/5 lg:w-3/10">
                        <img class="block rounded-full h-[180px] w-[180px] mx-auto"
                            src="https://tecdn.b-cdn.net/img/new/avatars/2.jpg"
                            alt=""
                            loading="lazy" />
                    </div>
                    <div class="w-full md:w-3/5 lg:w-7/10">
                        <ul class="[&>li]:mb-3 [&>li>span]:block [&>li>span]:break-all [&>li>span]:text-xs [&>li>span]:text-slate-500">
                            <li>
                                <span>Nama</span>
                                <b>{{ Auth::user()->name }}</b>
                            </li>
                            <li>
                                <span>Email</span>
                                <b>{{ Auth::user()->email }}</b>
                            </li>
                            <li>
                                <span>Akses</span>
                                <b class="inline-block bg-emerald-50 rounded text-xs uppercase p-2">{{ Auth::user()->role }}</b>
                            </li>
                            <li class="flex gap-2">
                                <a class="btn-secondary"
                                    data-te-ripple-init
                                    href="{{ route('profile.edit') }}">
                                    <i class="bx bx-edit"></i>
                                    <span>{{ __('edit profil') }}</span>
                                </a>
                                <a class="btn-secondary"
                                    data-te-ripple-init
                                    href="{{ route('profile.edit-password') }}">
                                    <i class="bx bx-lock"></i>
                                    <span>{{ __('ganti kata sandi') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="p-3">
                <div class="border rounded-lg">
                    <h2 class="text-2xl p-3">
                        <i class="bx bx-edit"></i>
                        {{ __('Data') }}
                    </h2>
                    <ul class="[&>li>span]:capitalize [&>li]:border-b">
                        <li class="p-3">
                            <b>10</b>
                            <span>{{ __('blog') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
