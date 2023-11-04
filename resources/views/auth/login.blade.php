@extends('layouts.auth')
@section('title', Str::title('autentifikasi'))
@section('content')
<section class="bg-slate-50 h-screen">
	<div class="h-full w-full px-6">
		<div class="flex h-full flex-wrap items-center justify-center lg:justify-between">
			<div class="w-full md:w-8/12 lg:ml-6 lg:w-5/12">
				<div class="bg-white rounded-lg shadow-2xl max-w-[500px] mx-auto p-7">
					<div class="text-slate-700 text-3xl uppercase font-light mb-6">{{ __('Masuk') }}</div>
					<div>
						<form method="POST" action="{{ route('login') }}">
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
							<div class="my-3 block min-h-[1.5rem] pl-[1.5rem]">
								<input class="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:checked:border-primary dark:checked:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
									type="checkbox"
									name="remember"
									id="remember"
									{{ old('remember') ? 'checked' : '' }} />
								<label class="inline-block pl-[0.15rem] hover:cursor-pointer"
									for="remember">
									{{ __('Ingat saya') }}
								</label>
							</div>
							<div class="mb-6">
								<button class="btn-primary w-full"
									type="submit" 
									data-te-ripple-init data-te-ripple-color="light">
								{{ __('masuk') }}
								</button>
							</div>
						</form>
					</div>
					<div class="text-center">
						Belum punya akun? 
						<a class="font-bold text-blue-500 hover:text-blue-700"
							href="{{ route('register') }}">Daftar</a>
						@if (Route::has('password.request'))
						<div class="mt-2">
							<a class="text-blue-400 hover:text-blue-700 text-sm" href="{{ route('password.request') }}">
								{{ __('Lupa kata sandi?') }}</a>
						</div>
						@endif
					</div>
				</div>
			</div>
			<div class="hidden lg:block mb-12 md:mb-0 md:w-8/12 lg:w-6/12">
				<div class="bg-white w-full h-[90vh] relative p-10">
					<h1 class="text-slate-800 text-5xl leading-base uppercase font-light mb-3">{{ __('autentifikasi') }}</h1>
					<h2 class="text-slate-700 text-5xl leading-base uppercase font-light mb-5">{{ __('hak akses') }}</h2>
					<p class="text-slate-600 text-md pt-5 pb-3">{{ __('Tetaplah selalu berpegang pada prinsip menjaga kerahasiaan email dan kata sandi Anda dengan sangat ketat. Keamanan akun Anda bergantung pada dua hal ini. Email dan kata sandi merupakan kunci akses ke berbagai layanan online, termasuk email, media sosial, dan bahkan akun bank Anda. Jika seseorang berhasil mendapatkan akses ke email atau kata sandi Anda, mereka dapat mengakses informasi pribadi Anda, melakukan tindakan yang merugikan Anda, atau bahkan mencuri identitas Anda.') }}</p>
					<p class="text-slate-600 text-md pt-2 pb-5">{{ __('Kerentanan terhadap kebocoran email dan kata sandi dapat mengakibatkan berbagai masalah, termasuk kehilangan privasi, pencurian identitas, penipuan keuangan, dan banyak kerugian lainnya.') }}</p>
					<div class="absolute bottom-0 right-0 text-xs p-10">
						Dibuat oleh <a href="https://github.com/asepnurjaman-en" class="text-blue-500 hover:text-blue-700" target="_BLANK">asepnurjaman</a> 2023.
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
