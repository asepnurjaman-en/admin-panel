@extends('layouts.admin')
@section('title', Str::title($data['title']))
@section('content')
<section class="h-screen p-3">
    @include('layouts.component.breadcrumb', ['breadcrumb'=>$data['breadcrumb']])
    <div class="flex flex-wrap justify-between gap-2 mb-3">
		<a class="btn-secondary inline-block"
			href="{{ $data['back'] }}"
			data-te-ripple-init>
			<i class="bx bx-left-arrow-alt"></i>
			<span>{{ __('kembali') }}</span>
		</a>
    </div>
    <div class="bg-white rounded shadow p-4">
        <div class="flex flex-col lg:flex-row gap-2">
            <div class="w-full md:w-2/6 lg:w-3/10">
                <div class="relative h-[200px] w-[200px] mx-auto mt-5">
                    <img class="block h-[200px] w-[200px] object-cover rounded-full"
                        id="avatar-preview"
                        src="https://tecdn.b-cdn.net/img/new/avatars/2.jpg"
                        alt=""
                        loading="lazy" />
                </div>
            </div>
            <div class="w-full md:w-4/6 lg:w-7/10">
                <form method="POST" action="{{ $data['form']['action'] }}" class="{{ $data['form']['class'] }}">
                    @csrf
                    <div class="relative mt-3 mb-5" 
                        data-te-input-wrapper-init>
                        <input class="peer form-control"
                            type="password" 
                            name="password" 
                            id="password" 
                            value="" 
                            placeholder="Kata sandi" 
                            required autocomplete="password" autofocus>
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
                    <div class="relative mt-3 mb-5" 
                        data-te-input-wrapper-init>
                        <input class="peer form-control"
                            type="password" 
                            name="password_confirmation" 
                            id="password_confirmation" 
                            value="" 
                            placeholder="Konfirmasi kata sandi" 
                            required autocomplete="password" autofocus>
                        <label class="control-label"
                            for="password_confirmation">
                            {{ __('Konfirmasi kata sandi') }}
                        </label>
                    </div>
                    <div class="mt-10">
                        <button class="btn-primary btn-ux-primary inline-block"
                            type="submit"
                            data-te-ripple-init
                            data-te-ripple-color="light">
                            <i class="bx bx-save"></i>
                            <span>{{ __('simpan') }}</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
@endpush