@extends('layouts.admin')

@section('content')
<div class="min-h-screen p-3">
    <form action="{{ $data['form']['action'] }}" class="{{ $data['form']['class'] }}" method="post" enctype="multipart/form-data">
		<div class="flex items-center justify-between mb-3">
            <h2 class="mb-0"></h2>
			<button class="btn-primary btn-ux-primary ml-1 inline-block"
				type="submit"
				data-te-ripple-init
				data-te-ripple-color="light">
				<i class="bx bx-save"></i>
				<span>{{ __('simpan') }}</span>
			</button>
		</div>
        <div class="flex flex-col md:flex-row items-start gap-2">
			<ul class="bg-white shadow-[0_4px_9px_-4px] shadow-slate-300 rounded flex list-none flex-row md:flex-col flex-wrap gap-2 p-2"
				role="tablist"
				data-te-nav-ref>
				<li class="flex-grow text-center"
					role="presentation">
					<a class="block rounded bg-neutral-100 px-10 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 data-[te-nav-active]:!bg-primary-100 data-[te-nav-active]:text-primary-700 dark:bg-neutral-700 dark:text-white dark:data-[te-nav-active]:text-primary-700"
						href="#pills-location"
						id="pills-location-tab"
						data-te-toggle="pill"
						data-te-target="#pills-location"
						data-te-nav-active
						role="tab"
						aria-controls="pills-location"
						aria-selected="true">
						<i class="block bx bxs-map text-2xl"></i>
						Lokasi
					</a>
				</li>
				<li role="phone" class="flex-grow text-center">
					<a class="block rounded bg-neutral-100 px-10 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 data-[te-nav-active]:!bg-primary-100 data-[te-nav-active]:text-primary-700 dark:bg-neutral-700 dark:text-white dark:data-[te-nav-active]:text-primary-700"
						href="#pills-phone"
						id="pills-phone-tab"
						data-te-toggle="pill"
						data-te-target="#pills-phone"
						role="tab"
						aria-controls="pills-phone"
						aria-selected="false">
						<i class="block bx bx-phone text-2xl"></i>
						Telepon
					</a>
				</li>
				<li role="whatsapp" class="flex-grow text-center">
					<a class="block rounded bg-neutral-100 px-10 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 data-[te-nav-active]:!bg-primary-100 data-[te-nav-active]:text-primary-700 dark:bg-neutral-700 dark:text-white dark:data-[te-nav-active]:text-primary-700"
						href="#pills-whatsapp"
						id="pills-whatsapp-tab"
						data-te-toggle="pill"
						data-te-target="#pills-whatsapp"
						role="tab"
						aria-controls="pills-whatsapp"
						aria-selected="false">
						<i class="block bx bxl-whatsapp text-2xl"></i>
						Whatsapp
					</a>
				</li>
				<li role="email" class="flex-grow text-center">
					<a class="block rounded bg-neutral-100 px-10 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 data-[te-nav-active]:!bg-primary-100 data-[te-nav-active]:text-primary-700 dark:bg-neutral-700 dark:text-white dark:data-[te-nav-active]:text-primary-700"
						href="#pills-email"
						id="pills-email-tab"
						data-te-toggle="pill"
						data-te-target="#pills-email"
						role="tab"
						aria-controls="pills-email"
						aria-selected="false">
						<i class="block bx bx-envelope text-2xl"></i>
						Email
					</a>
				</li>
			</ul>
			<div class="w-full">
                <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
					id="pills-location"
					role="tabpanel"
					aria-labelledby="pills-location-tab"
					data-te-tab-active>
                    <div class="grid lg:grid-cols-1 gap-2 mb-2">
                        @forelse ($data['contact']['location'] as $item)
                        <div class="bg-white block border shadow-[0_4px_9px_-4px] shadow-slate-300 rounded p-2">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-2 bg-slate-50 rounded-full p-1 pr-2">
                                    <span class="icon inline-flex items-center justify-center bg-rose-50 text-rose-500 w-[30px] h-[30px] rounded-full">
                                        <i class="bx bx-map"></i>
                                    </span>
                                    <span class="capitalize text-neutral-600 text-sm">{{ $item->type }}</span>
                                </div>
                                <div class="relative">
                                    <input class="mr-2 mt-[0.3rem] h-3.5 w-8 appearance-none rounded-[0.4375rem] bg-neutral-300 before:pointer-events-none before:absolute before:h-3.5 before:w-3.5 before:rounded-full before:bg-transparent before:content-[''] after:absolute after:z-[2] after:-mt-[0.1875rem] after:h-5 after:w-5 after:rounded-full after:border-none after:bg-neutral-100 after:shadow-[0_0px_3px_0_rgb(0_0_0_/_7%),_0_2px_2px_0_rgb(0_0_0_/_4%)] after:transition-[background-color_0.2s,transform_0.2s] after:content-[''] checked:bg-primary checked:after:absolute checked:after:z-[2] checked:after:-mt-[3px] checked:after:ml-[1.0625rem] checked:after:h-5 checked:after:w-5 checked:after:rounded-full checked:after:border-none checked:after:bg-primary checked:after:shadow-[0_3px_1px_-2px_rgba(0,0,0,0.2),_0_2px_2px_0_rgba(0,0,0,0.14),_0_1px_5px_0_rgba(0,0,0,0.12)] checked:after:transition-[background-color_0.2s,transform_0.2s] checked:after:content-[''] hover:cursor-pointer focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[3px_-1px_0px_10px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-5 focus:after:w-5 focus:after:rounded-full focus:after:content-[''] checked:focus:border-primary checked:focus:bg-primary checked:focus:before:ml-[1.0625rem] checked:focus:before:scale-100 checked:focus:before:shadow-[3px_-1px_0px_10px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:bg-neutral-600 dark:after:bg-neutral-400 dark:checked:bg-primary dark:checked:after:bg-primary dark:focus:before:shadow-[3px_-1px_0px_10px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[3px_-1px_0px_10px_#3b71ca]"
                                        type="checkbox"
                                        role="switch"
                                        id="actived_{{ $item->id }}"
                                        name="actived[{{ $item->id }}]"
                                        value="1"
                                        @checked(($item->actived=='1')) />
                                    <label class="inline-block pl-[0.15rem] hover:cursor-pointer"
                                        for="actived_{{ $item->id }}">
                                    </label>
                                </div>
                            </div>
                            <div class="rounded mt-3">
								<div class="relative mb-2">
                                    <input class="peer block min-h-[auto] w-full rounded border-0 bg-slate-50 text-sm px-3 py-[0.24rem] leading-[1.75] outline-none transition-all duration-200 ease-linear placeholder:text-slate-300 focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200"
                                        type="text"
                                        id="title_{{ $item->id }}"
                                        name="title[{{ $item->id }}]"
                                        value="{{ $item->title ?? null }}"
                                        placeholder="Keterangan" />
                                </div>
                                <div class="relative rounded bg-slate-50">
                                    <textarea class="peer block min-h-[auto] w-full bg-slate-50 border-0 px-2 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear placeholder:text-slate-300 focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200"
                                        type="text"
                                        id="content_{{ $item->id }}"
                                        name="content[{{ $item->id }}]"
                                        placeholder="Ketik disini">{{ $item->content ?? null }}</textarea>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="empty">belum ada lokasi</div>
                        @endforelse
                    </div>
                </div>
                <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
					id="pills-phone"
					role="tabpanel"
					aria-labelledby="pills-phone-tab">
					<div class="grid lg:grid-cols-2 gap-2 mb-2">
                        @forelse ($data['contact']['phone'] as $item)
                        <div class="bg-white block border shadow-[0_4px_9px_-4px] shadow-slate-300 rounded p-2">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-2 bg-slate-50 rounded-full p-1 pr-2">
                                    <span class="icon inline-flex items-center justify-center bg-sky-50 text-sky-500 w-[30px] h-[30px] rounded-full">
                                        <i class="bx bx-phone"></i>
                                    </span>
                                    <span class="capitalize text-neutral-600 text-sm">{{ $item->type }}</span>
                                </div>
                                <div class="relative">
                                    <input class="mr-2 mt-[0.3rem] h-3.5 w-8 appearance-none rounded-[0.4375rem] bg-neutral-300 before:pointer-events-none before:absolute before:h-3.5 before:w-3.5 before:rounded-full before:bg-transparent before:content-[''] after:absolute after:z-[2] after:-mt-[0.1875rem] after:h-5 after:w-5 after:rounded-full after:border-none after:bg-neutral-100 after:shadow-[0_0px_3px_0_rgb(0_0_0_/_7%),_0_2px_2px_0_rgb(0_0_0_/_4%)] after:transition-[background-color_0.2s,transform_0.2s] after:content-[''] checked:bg-primary checked:after:absolute checked:after:z-[2] checked:after:-mt-[3px] checked:after:ml-[1.0625rem] checked:after:h-5 checked:after:w-5 checked:after:rounded-full checked:after:border-none checked:after:bg-primary checked:after:shadow-[0_3px_1px_-2px_rgba(0,0,0,0.2),_0_2px_2px_0_rgba(0,0,0,0.14),_0_1px_5px_0_rgba(0,0,0,0.12)] checked:after:transition-[background-color_0.2s,transform_0.2s] checked:after:content-[''] hover:cursor-pointer focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[3px_-1px_0px_10px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-5 focus:after:w-5 focus:after:rounded-full focus:after:content-[''] checked:focus:border-primary checked:focus:bg-primary checked:focus:before:ml-[1.0625rem] checked:focus:before:scale-100 checked:focus:before:shadow-[3px_-1px_0px_10px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:bg-neutral-600 dark:after:bg-neutral-400 dark:checked:bg-primary dark:checked:after:bg-primary dark:focus:before:shadow-[3px_-1px_0px_10px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[3px_-1px_0px_10px_#3b71ca]"
                                        type="checkbox"
                                        role="switch"
                                        id="actived_{{ $item->id }}"
                                        name="actived[{{ $item->id }}]"
                                        value="1"
                                        @checked(($item->actived=='1')) />
                                    <label class="inline-block pl-[0.15rem] hover:cursor-pointer"
                                        for="actived_{{ $item->id }}">
                                    </label>
                                </div>
                            </div>
                            <div class="rounded mt-3">
                                <div class="flex items-center relative rounded bg-slate-50 mb-2">
                                    <i class="bx bx-paperclip px-2"></i>
                                    <input class="peer block min-h-[auto] w-full bg-slate-50 border-0 px-2 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear placeholder:text-slate-300 focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200"
                                        type="text"
                                        id="content_{{ $item->id }}"
                                        name="content[{{ $item->id }}]"
                                        value="{{ $item->content ?? null }}"
                                        placeholder="Ketik disini" />
                                </div>
                                <div class="relative">
                                    <input class="peer block min-h-[auto] w-full rounded border-0 bg-slate-50 text-sm px-3 py-[0.24rem] leading-[1.75] outline-none transition-all duration-200 ease-linear placeholder:text-slate-300 focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200"
                                        type="text"
                                        id="title_{{ $item->id }}"
                                        name="title[{{ $item->id }}]"
                                        value="{{ $item->title ?? null }}"
                                        placeholder="Keterangan" />
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="empty">belum ada telepon</div>
                        @endforelse
                    </div>
                </div>
                <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
					id="pills-whatsapp"
					role="tabpanel"
					aria-labelledby="pills-whatsapp-tab">
					<div class="grid lg:grid-cols-2 gap-2 mb-2">
                        @forelse ($data['contact']['whatsapp'] as $item)
                        <div class="bg-white block border shadow-[0_4px_9px_-4px] shadow-slate-300 rounded p-2">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-2 bg-slate-50 rounded-full p-1 pr-2">
                                    <span class="icon inline-flex items-center justify-center bg-emerald-50 text-emerald-500 w-[30px] h-[30px] rounded-full">
                                        <i class="bx bxl-whatsapp"></i>
                                    </span>
                                    <span class="capitalize text-neutral-600 text-sm">{{ $item->type }}</span>
                                </div>
                                <div class="relative">
                                    <input class="mr-2 mt-[0.3rem] h-3.5 w-8 appearance-none rounded-[0.4375rem] bg-neutral-300 before:pointer-events-none before:absolute before:h-3.5 before:w-3.5 before:rounded-full before:bg-transparent before:content-[''] after:absolute after:z-[2] after:-mt-[0.1875rem] after:h-5 after:w-5 after:rounded-full after:border-none after:bg-neutral-100 after:shadow-[0_0px_3px_0_rgb(0_0_0_/_7%),_0_2px_2px_0_rgb(0_0_0_/_4%)] after:transition-[background-color_0.2s,transform_0.2s] after:content-[''] checked:bg-primary checked:after:absolute checked:after:z-[2] checked:after:-mt-[3px] checked:after:ml-[1.0625rem] checked:after:h-5 checked:after:w-5 checked:after:rounded-full checked:after:border-none checked:after:bg-primary checked:after:shadow-[0_3px_1px_-2px_rgba(0,0,0,0.2),_0_2px_2px_0_rgba(0,0,0,0.14),_0_1px_5px_0_rgba(0,0,0,0.12)] checked:after:transition-[background-color_0.2s,transform_0.2s] checked:after:content-[''] hover:cursor-pointer focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[3px_-1px_0px_10px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-5 focus:after:w-5 focus:after:rounded-full focus:after:content-[''] checked:focus:border-primary checked:focus:bg-primary checked:focus:before:ml-[1.0625rem] checked:focus:before:scale-100 checked:focus:before:shadow-[3px_-1px_0px_10px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:bg-neutral-600 dark:after:bg-neutral-400 dark:checked:bg-primary dark:checked:after:bg-primary dark:focus:before:shadow-[3px_-1px_0px_10px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[3px_-1px_0px_10px_#3b71ca]"
                                        type="checkbox"
                                        role="switch"
                                        id="actived_{{ $item->id }}"
                                        name="actived[{{ $item->id }}]"
                                        value="1"
                                        @checked(($item->actived=='1')) />
                                    <label class="inline-block pl-[0.15rem] hover:cursor-pointer"
                                        for="actived_{{ $item->id }}">
                                    </label>
                                </div>
                            </div>
                            <div class="rounded mt-3">
                                <div class="flex items-center relative rounded bg-slate-50 mb-2">
                                    <i class="bx bx-paperclip px-2"></i>
                                    <input class="peer block min-h-[auto] w-full bg-slate-50 border-0 px-2 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear placeholder:text-slate-300 focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200"
                                        type="text"
                                        id="content_{{ $item->id }}"
                                        name="content[{{ $item->id }}]"
                                        value="{{ $item->content ?? null }}"
                                        placeholder="Ketik disini" />
                                </div>
                                <div class="relative">
                                    <input class="peer block min-h-[auto] w-full rounded border-0 bg-slate-50 text-sm px-3 py-[0.24rem] leading-[1.75] outline-none transition-all duration-200 ease-linear placeholder:text-slate-300 focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200"
                                        type="text"
                                        id="title_{{ $item->id }}"
                                        name="title[{{ $item->id }}]"
                                        value="{{ $item->title ?? null }}"
                                        placeholder="Keterangan" />
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="empty">belum ada whatsapp</div>
                        @endforelse
                    </div>
                </div>
                <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
					id="pills-email"
					role="tabpanel"
					aria-labelledby="pills-email-tab">
					<div class="grid lg:grid-cols-2 gap-2 mb-2">
                        @forelse ($data['contact']['email'] as $item)
                        <div class="bg-white block border shadow-[0_4px_9px_-4px] shadow-slate-300 rounded p-2">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-2 bg-slate-50 rounded-full p-1 pr-2">
                                    <span class="icon inline-flex items-center justify-center bg-amber-50 text-amber-500 w-[30px] h-[30px] rounded-full">
                                        <i class="bx bx-envelope"></i>
                                    </span>
                                    <span class="capitalize text-neutral-600 text-sm">{{ $item->type }}</span>
                                </div>
                                <div class="relative">
                                    <input class="mr-2 mt-[0.3rem] h-3.5 w-8 appearance-none rounded-[0.4375rem] bg-neutral-300 before:pointer-events-none before:absolute before:h-3.5 before:w-3.5 before:rounded-full before:bg-transparent before:content-[''] after:absolute after:z-[2] after:-mt-[0.1875rem] after:h-5 after:w-5 after:rounded-full after:border-none after:bg-neutral-100 after:shadow-[0_0px_3px_0_rgb(0_0_0_/_7%),_0_2px_2px_0_rgb(0_0_0_/_4%)] after:transition-[background-color_0.2s,transform_0.2s] after:content-[''] checked:bg-primary checked:after:absolute checked:after:z-[2] checked:after:-mt-[3px] checked:after:ml-[1.0625rem] checked:after:h-5 checked:after:w-5 checked:after:rounded-full checked:after:border-none checked:after:bg-primary checked:after:shadow-[0_3px_1px_-2px_rgba(0,0,0,0.2),_0_2px_2px_0_rgba(0,0,0,0.14),_0_1px_5px_0_rgba(0,0,0,0.12)] checked:after:transition-[background-color_0.2s,transform_0.2s] checked:after:content-[''] hover:cursor-pointer focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[3px_-1px_0px_10px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-5 focus:after:w-5 focus:after:rounded-full focus:after:content-[''] checked:focus:border-primary checked:focus:bg-primary checked:focus:before:ml-[1.0625rem] checked:focus:before:scale-100 checked:focus:before:shadow-[3px_-1px_0px_10px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:bg-neutral-600 dark:after:bg-neutral-400 dark:checked:bg-primary dark:checked:after:bg-primary dark:focus:before:shadow-[3px_-1px_0px_10px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[3px_-1px_0px_10px_#3b71ca]"
                                        type="checkbox"
                                        role="switch"
                                        id="actived_{{ $item->id }}"
                                        name="actived[{{ $item->id }}]"
                                        value="1"
                                        @checked(($item->actived=='1')) />
                                    <label class="inline-block pl-[0.15rem] hover:cursor-pointer"
                                        for="actived_{{ $item->id }}">
                                    </label>
                                </div>
                            </div>
                            <div class="rounded mt-3">
                                <div class="flex items-center relative rounded bg-slate-50 mb-2">
                                    <i class="bx bx-paperclip px-2"></i>
                                    <input class="peer block min-h-[auto] w-full bg-slate-50 border-0 px-2 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear placeholder:text-slate-300 focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200"
                                        type="text"
                                        id="content_{{ $item->id }}"
                                        name="content[{{ $item->id }}]"
                                        value="{{ $item->content ?? null }}"
                                        placeholder="Ketik disini" />
                                </div>
                                <div class="relative">
                                    <input class="peer block min-h-[auto] w-full rounded border-0 bg-slate-50 text-sm px-3 py-[0.24rem] leading-[1.75] outline-none transition-all duration-200 ease-linear placeholder:text-slate-300 focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200"
                                        type="text"
                                        id="title_{{ $item->id }}"
                                        name="title[{{ $item->id }}]"
                                        value="{{ $item->title ?? null }}"
                                        placeholder="Keterangan" />
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="empty">belum ada email</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('style')
@endpush

@push('script')
@endpush