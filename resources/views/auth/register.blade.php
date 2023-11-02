@extends('layouts.auth')

@section('content')
<section class="h-screen">
	<div class="container h-full px-6">
		<div class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-between">
			<div class="mb-12 md:mb-0 md:w-8/12 lg:w-6/12">
			</div>
			<div class="md:w-8/12 lg:ml-6 lg:w-5/12">
				<div class="text-3xl font-bold mb-6">{{ __('Daftar') }}</div>
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
						<div class="mb-6 flex items-center justify-between">
							<button class="btn-primary"
								type="submit" 
								data-te-ripple-init data-te-ripple-color="light">Daftar</button>
						</div>
					</form>
				</div>
				<div class="text-center">
					Sudah punya akun? 
					<a class="font-bold text-blue-700"
						href="{{ route('login') }}">Masuk</a>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
