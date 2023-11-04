{{-- CreateCategoryModal --}}
<div class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
	data-te-modal-init
	id="modalCreateCategory"
	tabindex="-1"
	aria-labelledby="modalCreateCategoryLabel"
	aria-hidden="true">
	<div class="pointer-events-none relative w-auto m-1 translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]"
		data-te-modal-dialog-ref>
		<div class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
			<div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
				<!--Modal title-->
				<h5 class="flex items-center gap-2 font-medium leading-normal uppercase text-neutral-800 dark:text-neutral-200"
					id="modalCreateCategoryLabel">
					<i class="bx bx-carousel text-xl"></i>
					<span class="text-sm">{{ __('kategori baru') }}</span>
				</h5>
				<div class="flex gap-2">
					<button class="btn-secondary inline-block"
						type="button"
						data-te-modal-dismiss
						data-te-ripple-init
						aria-label="Close">
						<i class="bx bx-x"></i>
						<span>{{ __('tutup') }}</span>
					</button>
				</div>
			</div>
			<div class="p-3">
				<div class="w-full">
					<form action="{{ route('blog-category.store') }}" method="post" class="to-store">
						@csrf
						<div class="relative mt-3 mb-1" 
							data-te-input-wrapper-init>
							<input class="peer form-control"
								type="text"
								name="category_title" 
								id="category_title" 
								value="{{ old('category_title') }}" 
								placeholder="Kategori" 
								required>
							<label class="control-label"
								for="category_title">
								{{ __('Kategori Baru') }}
								@error('category_title')
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
								<i class="bx bx-plus"></i>
								{{ __('Buat kategori baru') }}
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>