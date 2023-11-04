@extends('layouts.auth')
@section('title', Str::title('atur ulang kata sandi'))
@section('content')
<div class="h-screen">
    <div class="h-full flex items-center justify-center">
        <div class="bg-white w-full max-w-[500px]">
            <div class="text-center">
                <h4>{{ __('Atur ulang kata sandi') }}</h4>
                <p class="text-sm text-slate-500">{{ __('Link akan dikirim ke emial kamu') }}</p>
            </div>

            <div class="block text-center">
                @if (session('status'))
                    <div class="bg-emerald-500 text-white text-center w-full rounded shadow p-3" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="relative mt-3 mb-1" 
                        data-te-input-wrapper-init>
                        <input class="peer form-control"
                            type="email"
                            name="email" 
                            id="email" 
                            value="{{ old('email') }}" 
                            placeholder="Email" 
                            required autocomplete="email">
                        <label class="control-label"
                            for="email">
                            {{ __('Email') }}
                            @error('email')
                            <span class="text-red-700">*</span>
                            @enderror
                        </label>
                    </div>
                    @error('email')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
                    <div class="mt-2 mb-6">
                        <button class="btn-primary w-full"
                            type="submit" 
                            data-te-ripple-init data-te-ripple-color="light">
                        {{ __('kirim link ke email') }}
                        </button>
                    </div>
                </form>
                <a href="{{ route('login') }}" class="text-blue-400 hover:text-blue-700 text-sm text-center">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
