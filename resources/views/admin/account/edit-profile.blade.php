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
                    <label class="flex items-center justify-center bg-slate-200 shadow-lg rounded-full h-[40px] w-[40px] absolute bottom-[.5em] right-[.5em] cursor-pointer transition hover:bg-slate-300 focus:bg-slate-400 active:bg-slate-400"
                        for="avatar">
                        <i class="bx bx-camera"></i>
                    </label>
                    <input class="appearance-none" 
                        type="file" 
                        name="avatar" 
                        id="avatar" 
                        onchange="previewBackground(event)"
                        accept=".jpg,.jpeg,.png"
                        style="transform: scale(0,0)">
                </div>
            </div>
            <div class="w-full md:w-4/6 lg:w-7/10">
                <form method="POST" action="{{ $data['form']['action'] }}" class="{{ $data['form']['class'] }}">
                    @csrf
                    <div class="relative mt-3 mb-5" 
                        data-te-input-wrapper-init>
                        <input class="peer form-control"
                            type="text" 
                            name="name" 
                            id="name" 
                            value="{{ old('name') ?? Auth::user()->name }}" 
                            placeholder="Nama" 
                            required autocomplete="name" autofocus>
                        <label class="control-label"
                            for="name">
                            {{ __('Nama') }}
                            @error('name')
                            <span class="text-red-700">*</span>
                            @enderror
                        </label>
                    </div>
                    @error('name')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
                    <div class="relative mt-3 mb-2" 
                        data-te-input-wrapper-init>
                        <input class="peer form-control"
                            type="email"
                            name="email" 
                            id="email" 
                            value="{{ old('email') ?? Auth::user()->email }}" 
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
                    <div class="relative mb-1">
                        <label class="block text-xs px-3 py-1">{{ __('Akses') }}</label>
                        <span class="bg-emerald-50 rounded font-bold uppercase text-sm p-2">
                            {{ Auth::user()->role }}
                        </span>
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
<script>
    const previewBackground = async (e) => {
		document.getElementById('avatar-preview').setAttribute('src', URL.createObjectURL(e.target.files[0]))
	};
</script>
@endpush