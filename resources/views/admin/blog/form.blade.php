@extends('layouts.admin')
@section('title', Str::title($data['title']))
@section('content')
<div class="min-h-screen p-3 pb-20">
    @include('layouts.component.breadcrumb', ['breadcrumb'=>$data['breadcrumb']])
	<form action="{{ $data['form']['action'] }}" class="{{ $data['form']['class'] }}" method="post" enctype="multipart/form-data">
		<div class="flex justify-between mb-3 pb-3">
			<a class="btn-secondary inline-block"
				href="{{ $data['back'] }}"
				data-te-ripple-init>
				<i class="bx bx-left-arrow-alt"></i>
				<span>{{ __('kembali') }}</span>
			</a>
			<button class="btn-primary btn-ux-primary ml-1 inline-block"
				type="submit"
				data-te-ripple-init
				data-te-ripple-color="light">
				<i class="bx bx-save"></i>
				<span>{{ __('simpan') }}</span>
			</button>
		</div>
		<div class="mb-3">
			<div class="relative bg-white mb-6"
				data-te-input-wrapper-init>
				<input class="invalid peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.5] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
					type="text"
					id="title"
					name="title"
					value="{{ $blog->title ?? old('title') }}"
					placeholder="Judul berita"
					data-te-input-showcounter="true"
					maxlength="150" />
				<label class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate leading-[3] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
					for="title">
					Judul berita
					<sup for="title" class="text-danger hidden">*</sup>
				</label>
				<div class="absolute w-full text-xs text-neutral-500 peer-focus:text-primary dark:text-neutral-200 dark:peer-focus:text-primary"
					data-te-input-helper-ref></div>
			</div>
			<div class="flex flex-col lg:flex-row-reverse gap-4">
				<div class="w-full lg:w-4/5">
					<div class="relative mb-3">
						<textarea class="mce w-full"
							id="content"
							name="content">{!! $blog->content ?? null !!}</textarea>
					</div>
				</div>
				<div class="w-full lg:w-1/4">
					<div class="bg-white shadow-[0_4px_9px_-4px] shadow-slate-300 rounded p-2 mb-2">
						<label for="file" class="capitalize pl-1">
							gambar
							<sup for="file_method" class="text-danger hidden">*</sup>
						</label>
						<input type="file" name="file" id="file" class="choose-image absolute z-0 scale-0" data-an-input="browse-file" data-an-target="#thumbnail" accept="image/png,image/jpeg,image/jpg">
						<div class="pt-2">
							<div class="flex justify-between rounded-md shadow-lg"
								role="group">
								<label class="block w-full rounded-l bg-neutral-50 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-center text-neutral-800 transition duration-150 ease-in-out hover:cursor-pointer hover:bg-neutral-100 focus:bg-neutral-100 focus:outline-none focus:ring-0 active:bg-neutral-200"
									for="file"
									role="button"
									data-te-ripple-init
									data-te-ripple-color="light">
									<i class="bx bx-image-add text-lg"></i>
								</label>
								<button class="block w-full rounded-r bg-neutral-50 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-center text-neutral-800 transition duration-150 ease-in-out hover:bg-neutral-100 focus:bg-neutral-100 focus:outline-none focus:ring-0 active:bg-neutral-200"
									type="button"
									data-te-toggle="modal"
									data-te-target="#modalStorage"
									data-te-ripple-init
									data-te-ripple-color="light">
									<i class="bx bx-images text-lg"></i>
								</button>
							</div>
						</div>
						<figure id="thumbnail" class="w-full mt-2">
							<div class="flex flex-col">
								<img class="bg-zinc-50 h-auto w-full object-cover rounded" src="{{ url('storage/'.$blog->file) }}" alt="{{ $blog->file ?? null }}" alt="">
								<div class="w-full p-2">
									<div id="file_temp_name" class="mb-1 hidden">
										<small class="text-xs text-slate-400 capitalize">nama file</small>
										<span class="block break-all">{{ $blog->file ?? null }}</span>
									</div>
									<div id="file_temp_size" class="mb-1 hidden">
										<small class="text-xs text-slate-400 capitalize">ukuran file</small>
										<span class="block"></span>
									</div>
									<div id="file_temp_modified" class="mb-1 hidden">
										<small class="text-xs text-slate-400 capitalize">modifikasi</small>
										<span class="block"></span>
									</div>
								</div>
							</div>
							<input type="hidden" name="file_method" id="file_method" value="{{ ($blog->file) ? 'storage' : null }}">
							<input type="hidden" name="file_storage" id="file_storage" value="{{ $blog->file ?? null }}">
							<div class="relative" data-te-input-wrapper-init>
								<input class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
									type="text"
									id="file_source"
									name="file_source"
									value="{{ $blog->file_source ?? null }}"
									placeholder="Deskripsi gambar" />
								</label>
							</div>
						</figure>
					</div>
					<div class="bg-white shadow-[0_4px_9px_-4px] shadow-slate-300 rounded p-2 mb-2">
						<div class="relative mb-2">
							<input class="mr-2 mt-[0.3rem] h-3.5 w-8 appearance-none rounded-[0.4375rem] bg-neutral-300 before:pointer-events-none before:absolute before:h-3.5 before:w-3.5 before:rounded-full before:bg-transparent before:content-[''] after:absolute after:z-[2] after:-mt-[0.1875rem] after:h-5 after:w-5 after:rounded-full after:border-none after:bg-neutral-100 after:shadow-[0_0px_3px_0_rgb(0_0_0_/_7%),_0_2px_2px_0_rgb(0_0_0_/_4%)] after:transition-[background-color_0.2s,transform_0.2s] after:content-[''] checked:bg-primary checked:after:absolute checked:after:z-[2] checked:after:-mt-[3px] checked:after:ml-[1.0625rem] checked:after:h-5 checked:after:w-5 checked:after:rounded-full checked:after:border-none checked:after:bg-primary checked:after:shadow-[0_3px_1px_-2px_rgba(0,0,0,0.2),_0_2px_2px_0_rgba(0,0,0,0.14),_0_1px_5px_0_rgba(0,0,0,0.12)] checked:after:transition-[background-color_0.2s,transform_0.2s] checked:after:content-[''] hover:cursor-pointer focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[3px_-1px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-5 focus:after:w-5 focus:after:rounded-full focus:after:content-[''] checked:focus:border-primary checked:focus:bg-primary checked:focus:before:ml-[1.0625rem] checked:focus:before:scale-100 checked:focus:before:shadow-[3px_-1px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:bg-neutral-600 dark:after:bg-neutral-400 dark:checked:bg-primary dark:checked:after:bg-primary dark:focus:before:shadow-[3px_-1px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[3px_-1px_0px_13px_#3b71ca]"
								type="checkbox"
								role="switch"
								id="publish"
								name="publish"
								value="publish"
								@checked(($blog->publish=='publish')) />
							<label class="inline-block pl-[0.15rem] hover:cursor-pointer"
								for="publish">
								Rilis
							</label>
						</div>
						<div class="relative">
							<input class="mr-2 mt-[0.3rem] h-3.5 w-8 appearance-none rounded-[0.4375rem] bg-neutral-300 before:pointer-events-none before:absolute before:h-3.5 before:w-3.5 before:rounded-full before:bg-transparent before:content-[''] after:absolute after:z-[2] after:-mt-[0.1875rem] after:h-5 after:w-5 after:rounded-full after:border-none after:bg-neutral-100 after:shadow-[0_0px_3px_0_rgb(0_0_0_/_7%),_0_2px_2px_0_rgb(0_0_0_/_4%)] after:transition-[background-color_0.2s,transform_0.2s] after:content-[''] checked:bg-primary checked:after:absolute checked:after:z-[2] checked:after:-mt-[3px] checked:after:ml-[1.0625rem] checked:after:h-5 checked:after:w-5 checked:after:rounded-full checked:after:border-none checked:after:bg-primary checked:after:shadow-[0_3px_1px_-2px_rgba(0,0,0,0.2),_0_2px_2px_0_rgba(0,0,0,0.14),_0_1px_5px_0_rgba(0,0,0,0.12)] checked:after:transition-[background-color_0.2s,transform_0.2s] checked:after:content-[''] hover:cursor-pointer focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[3px_-1px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-5 focus:after:w-5 focus:after:rounded-full focus:after:content-[''] checked:focus:border-primary checked:focus:bg-primary checked:focus:before:ml-[1.0625rem] checked:focus:before:scale-100 checked:focus:before:shadow-[3px_-1px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:bg-neutral-600 dark:after:bg-neutral-400 dark:checked:bg-primary dark:checked:after:bg-primary dark:focus:before:shadow-[3px_-1px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[3px_-1px_0px_13px_#3b71ca]"
								type="checkbox"
								role="switch"
								id="schedule"
								name="schedule"
								value="schedule"
								data-an-switch="#schedule_date"
								@checked(($blog->publish=='schedule')) />
							<label class="inline-block pl-[0.15rem] hover:cursor-pointer"
								for="schedule">
								Jadwalkan
							</label>
						</div>
						<div class="relative mt-3 {{ (($blog->publish=='schedule')) ? null : 'hidden' }}"
							id="schedule_date"
							data-te-disable-past="true"
							data-te-confirm-date-on-select="true"
							data-te-format="yyyy-mm-dd"
							data-te-datepicker-init
							data-te-input-wrapper-init>
							<input class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
								type="text"
								id="schedule_date_picker"
								name="schedule_date_picker"
								value="{{ date('Y-m-d', strtotime($blog->schedule_time ?? now())) }}"
								placeholder="Pilih tanggal" />
							<label class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
								for="schedule_date_picker">
								Pilih tanggal
							</label>
						</div>
					</div>
					<div id="data-blog-accordion">
						<div class="rounded bg-white shadow-[0_4px_9px_-4px] shadow-slate-300 mb-2">
							<h2 class="mb-0" id="headingCategory">
								<button class="group relative flex w-full items-center rounded-t-[15px] border-0 p-2 text-left capitalize text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400"
									type="button"
									data-te-collapse-init
									data-te-target="#collapseCategory"
									aria-expanded="true"
									aria-controls="collapseCategory">
									<span class="pl-1">
										kategori
										<sup for="blog_category" class="text-danger hidden">*</sup>
									</span>
									<span class="ml-auto shrink-0 fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
										</svg>
									</span>
								</button>
							</h2>
							<div class="!visible"
								id="collapseCategory"
								data-te-collapse-item
								data-te-collapse-show
								aria-labelledby="headingCategory"
								data-te-parent="#data-blog-accordion">
								<div class="p-2">
									@if (count($blog_category)>0)
									<select
										id="blog_category"
										name="blog_category"
										data-te-select-init
										data-te-select-option-height="52">
										@forelse ($blog_category as $item)
										<option value="{{ $item->id }}"
											@selected(($blog->blog_category_id==$item->id))
											data-te-select-secondary-text="{{ $item->blogs_count }} blog">
											{{ $item->title }}
										</option>
										@empty
										@endforelse
									</select>
									@else
									<div class="empty">{{ __('belum ada ketegori') }}</div>
									@endif
								</div>
							</div>
						</div>
						{{-- Date --}}
						<div class="rounded bg-white shadow-[0_4px_9px_-4px] shadow-slate-300 mb-2">
							<h2 class="mb-0" id="headingDate">
								<button class="group relative flex w-full items-center rounded-t-[15px] border-0 p-2 text-left capitalize text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400"
									type="button"
									data-te-collapse-init
									data-te-collapse-collapsed
									data-te-target="#collapseDate"
									aria-expanded="false"
									aria-controls="collapseDate">
									<span class="pl-1">
										waktu &amp; tanggal
										<sup for="date_picker" class="text-danger hidden">*</sup>
									</span>
									<span
										class="ml-auto shrink-0 fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
										</svg>
									</span>
								</button>
							</h2>
							<div class="!visible hidden"
								id="collapseDate"
								data-te-collapse-item
								aria-labelledby="headingDate"
								data-te-parent="#data-article-accordion">
								<div class="p-2">
									<div class="relative mb-3"
										data-te-datepicker-init
										data-te-format="yyyy-mm-dd"
										data-te-confirm-date-on-select="true"
										data-te-input-wrapper-init>
										<input class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
											type="text"
											id="date_picker"
											name="date_picker"
											value="{{ date('Y-m-d', strtotime($blog->datetime ?? now())) }}"
											placeholder="Pilih tanggal" />
										<label class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
											for="date_picker">
											Pilih tanggal
											<sup for="date_picker" class="text-danger hidden">*</sup>
										</label>
									</div>
									<div class="relative"
										data-te-format24="true"
										data-te-timepicker-init
										data-te-input-wrapper-init>
										<input class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
											type="text"
											data-te-toggle="timepicker"
											value="{{ date('H:i', strtotime($blog->datetime ?? now())) }}"
											name="time_picker"
											id="time_picker" />
										<label class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
											for="time_picker">
											Pilih waktu
											<sup for="time_picker" class="text-danger hidden">*</sup>
										</label>
									</div>
								</div>
							</div>
						</div>
						{{-- end of Date --}}
						{{-- Description --}}
						<div class="rounded bg-white shadow-[0_4px_9px_-4px] shadow-slate-300 mb-2">
							<h2 class="mb-0" id="headingTag">
								<button class="group relative flex w-full items-center rounded-t-[15px] border-0 p-2 text-left capitalize text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400"
									type="button"
									data-te-collapse-init
									data-te-collapse-collapsed
									data-te-target="#collapseDescription"
									aria-expanded="false"
									aria-controls="collapseDescription">
									<span class="pl-1">
										deskripsi
										<sup for="description" class="text-danger hidden">*</sup>
									</span>
									<span class="ml-auto shrink-0 fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
										</svg>
									</span>
								</button>
							</h2>
							<div class="!visible hidden"
								id="collapseDescription"
								data-te-collapse-item
								aria-labelledby="headingDescription"
								data-te-parent="#data-article-accordion">
								<div class="p-2">
									<div class="relative mb-4" data-te-input-wrapper-init>
										<textarea class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
											id="description"
											name="description"
											rows="4"
											placeholder="Deskripsi">{!! $blog->description ?? old('description') !!}</textarea>
										<label class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
											for="content">
											Deskripsi
											<sup for="description" class="text-danger hidden">*</sup>
										</label>
									</div>
								</div>
							</div>
						</div>
						{{-- end of Description --}}
						{{-- Author --}}
						<div class="rounded bg-white shadow-[0_4px_9px_-4px] shadow-slate-300 mb-2">
							<h2 class="mb-0" id="headingTag">
								<button class="group relative flex w-full items-center rounded-t-[15px] border-0 p-2 text-left capitalize text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400"
									type="button"
									data-te-collapse-init
									data-te-collapse-collapsed
									data-te-target="#collapseAuthor"
									aria-expanded="false"
									aria-controls="collapseAuthor">
									<span class="pl-1">
										penulis
										<sup for="author" class="text-danger hidden">*</sup>
									</span>
									<span class="ml-auto shrink-0 fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
										</svg>
									</span>
								</button>
							</h2>
							<div class="!visible hidden"
								id="collapseAuthor"
								data-te-collapse-item
								aria-labelledby="headingAuthor"
								data-te-parent="#data-article-accordion">
								<div class="p-2">
									<div class="relative mb-4" data-te-input-wrapper-init>
										<input class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
											type="text"
											id="author"
											name="author"
											value="{!! $blog->author ?? old('author') !!}"
											placeholder="Penulis" />
										<label class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
											for="author">
											Penulis
											<sup for="author" class="text-danger hidden">*</sup>
										</label>
									</div>
								</div>
							</div>
						</div>
						{{-- end of Author --}}
						{{-- Tag --}}
						<div class="rounded bg-white shadow-[0_4px_9px_-4px] shadow-slate-300 mb-2">
							<h2 class="mb-0" id="headingTag">
								<button class="group relative flex w-full items-center rounded-t-[15px] border-0 p-2 text-left capitalize text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400"
									type="button"
									data-te-collapse-init
									data-te-collapse-collapsed
									data-te-target="#collapseTag"
									aria-expanded="false"
									aria-controls="collapseTag">
									<span class="pl-1">tagar</span>
									<span class="ml-auto shrink-0 fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
										</svg>
									</span>
								</button>
							</h2>
							<div class="!visible hidden"
								id="collapseTag"
								data-te-collapse-item
								aria-labelledby="headingTag"
								data-te-parent="#data-article-accordion">
								<div class="p-2">
									<div class="relative mb-4 flex flex-wrap items-stretch">
										<input class="relative m-0 -ml-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-r-0 border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:border-r-0 focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
											type="text"
											data-an-input="tag"
											placeholder="#Tagar"
											aria-label="#Tagar"/>
										<button class="z-[2] inline-block rounded-r border-2 border-primary px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:border-primary-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-primary-600 focus:z-[3] focus:border-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:border-primary-700 active:text-primary-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
											data-te-ripple-init
											data-an-button="tag"
											type="button">
											<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
												<path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
											</svg>
										</button>
									</div>
									<div id="area-tag" class="relative">
										@if (!empty($blog->tags))
										@foreach (json_decode($blog->tags) as $tag)
										<div class="[word-wrap: break-word] mb-1 inline-flex h-[30px] cursor-pointer items-center justify-between rounded-[16px] bg-[#eceff1] px-[12px] py-0 text-[13px] font-normal normal-case leading-loose text-[#4f4f4f] shadow-none transition-[opacity] duration-300 ease-linear hover:!shadow-none active:bg-[#cacfd1] dark:bg-neutral-600 dark:text-neutral-200"
											data-te-chip-init
											data-te-ripple-init>
											<span class="float-right cursor-pointer leading-none text-[20px] text-[#afafaf] opacity-[.53] transition-all duration-200 ease-in-out hover:text-[#8b8b8b] dark:text-neutral-400 dark:hover:text-neutral-100"
												data-te-chip-close>
												<i class="bx bx-x"></i>
											</span>
											<input type="hidden" name="tags[]" value="{{ $tag }}">
											<span class="text-primary">#{{ $tag }}</span>
										</div>
										@endforeach
										@endif
									</div>
								</div>
							</div>
						</div>
						{{-- end of Tag --}}
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection

@push('script')
@include('layouts.component.modal-strbox')
{{-- <script src="https://cdn.tiny.cloud/1/9itgriy90vlqq8utp58vwdgdp06frez49d36w3lv684grblh/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}
@endPush