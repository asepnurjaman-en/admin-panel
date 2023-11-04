@extends('layouts.auth')
@section('title', Str::title('konfirmasi kata sandi'))
@section('content')
<div class="h-screen">
    <div class="h-full flex items-center justify-center">
        <div class="bg-white w-full max-w-[500px]">
            <div class="[&>h4]:uppercase text-center">
                <h4>{{ __('konfirmasi kata sandi') }}</h4>
                <p class="text-sm text-slate-500">{{ __('Ulangi kata sandi kamu untuk masuk ke panel.') }}</p>
            </div>
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <div class="relative mt-3 mb-1" 
                    data-te-input-wrapper-init>
                    <input class="peer form-control"
                        type="password" 
                        name="password" 
                        id="password" 
                        value="{{ old('password') }}" 
                        placeholder="Kata sandi" 
                        required>
                    <label class="control-label"
                        for="password">
                        {{ __('Kata sandi') }}
                        @error('password')
                        <span class="text-red-700">*</span>
                        @enderror
                    </label>
                </div>
                @error('password')
                <small class="text-red-500">{{ $message }}</small>
                @enderror
                <div class="mt-2 mb-6">
                    <button class="btn-primary w-full"
                        type="submit"
                        data-te-ripple-init data-te-ripple-color="light">
                        {{ __('konfirmasi kata sandi') }}
                    </button>

                    @if (Route::has('password.request'))
                    <div class="text-center mt-2">
                        <a class="text-blue-400 hover:text-blue-700 text-sm" href="{{ route('password.request') }}">
                            {{ __('Lupa kata sandi?') }}</a>
                    </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
