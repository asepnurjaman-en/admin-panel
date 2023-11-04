@extends('layouts.auth')
@section('title', Str::title('pendaftaran'))
@section('content')
<section class="bg-slate-50 h-screen">
	<div class="h-full w-full px-6">
		<div class="flex h-full flex-wrap items-center justify-center lg:justify-between">
			<div class="hidden lg:block mb-12 md:mb-0 md:w-8/12 lg:w-6/12">
				<div class="bg-white w-full h-[90vh] relative p-10">
					<h1 class="text-slate-800 text-5xl leading-base uppercase font-light mb-3">{{ __('daftarkan') }}</h1>
					<h2 class="text-slate-700 text-5xl leading-base uppercase font-light mb-5">{{ __('hak akses') }}</h2>
					<p class="text-slate-600 text-md pt-5 pb-3">{{ __('Tetaplah selalu berpegang pada prinsip menjaga kerahasiaan email dan kata sandi Anda dengan sangat ketat. Keamanan akun Anda bergantung pada dua hal ini. Email dan kata sandi merupakan kunci akses ke berbagai layanan online, termasuk email, media sosial, dan bahkan akun bank Anda. Jika seseorang berhasil mendapatkan akses ke email atau kata sandi Anda, mereka dapat mengakses informasi pribadi Anda, melakukan tindakan yang merugikan Anda, atau bahkan mencuri identitas Anda.') }}</p>
					<p class="text-slate-600 text-md pt-2 pb-5">{{ __('Kerentanan terhadap kebocoran email dan kata sandi dapat mengakibatkan berbagai masalah, termasuk kehilangan privasi, pencurian identitas, penipuan keuangan, dan banyak kerugian lainnya.') }}</p>
				</div>
			</div>
			<div class="w-full md:w-8/12 lg:ml-6 lg:w-5/12">
				<div class="bg-white rounded-lg shadow-2xl max-w-[500px] mx-auto p-7">
					<div class="text-slate-700 text-3xl uppercase font-light mb-6">{{ __('Daftar') }}</div>
					<div>
						<form method="POST" action="{{ route('register') }}">
							@csrf
							<div class="relative mt-3 mb-1" 
								data-te-input-wrapper-init>
								<input class="peer form-control"
									type="text" 
									name="name" 
									id="name" 
									value="{{ old('name') }}" 
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
							<div class="relative mt-3 mb-5" 
								data-te-input-wrapper-init>
								<input class="peer form-control"
									type="password" 
									name="password_confirmation" 
									id="password-confirm" 
									value="{{ old('password-confirm') }}" 
									placeholder="Kata sandi" 
									required>
								<label class="control-label"
									for="password-confirm">
									{{ __('Ulangi') }}
								</label>
							</div>
							<div class="mb-6">
								<button class="btn-primary w-full"
									type="submit" 
									data-te-ripple-init data-te-ripple-color="light">
								{{ __('daftar') }}
								</button>
							</div>
						</form>
					</div>
					<div class="text-center">
						Sudah punya akun? 
						<a class="font-bold text-blue-500 hover:text-blue-700"
							href="{{ route('login') }}">Masuk</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
