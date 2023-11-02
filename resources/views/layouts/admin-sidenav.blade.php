@php
	$menu = [
		[
			'title' => 'berita',
			'menu'	=> [
				[
					'id'	=> ['blog.index', 'blog.create', 'blog.edit', 'blog.bin', 'blog-comment.show'],
					'title'	=> 'berita',
					'url'	=> route('blog.index'),
					'icon'	=> 'bx bx-news',
					'sub'	=> []
				],
			]
		],
		[
			'title' => 'produk',
			'menu'	=> [
				[
					'id'	=> ['product.index.publish', 'product.index.draft', 'product.index.schedule', 'product.create', 'product.edit', 'product.bin', 'product-variant.show'],
					'title'	=> 'produk',
					'url'	=> ('product.index.publish'),
					'icon'	=> 'bx bx-food-menu',
					'sub'	=> [
						[
							'id'	=> ['product.index.publish'],
							'title'	=> 'rilis',
							'url'	=> ('product.index.publish'),
						],
						[
							'id'	=> ['product.index.draft'],
							'title'	=> 'draft',
							'url'	=> ('product.index.draft'),
						],
						[
							'id'	=> ['product.index.schedule'],
							'title'	=> 'dijadwal',
							'url'	=> ('product.index.schedule'),
						]
					]
				],
			]
		],
		[
			'title' => 'info',
			'menu'	=> [
				[
					'id'	=> ['link.index.social', 'link.index.ecommerce'],
					'title'	=> 'media sosial',
					'url'	=> ('link.index.social'),
					'icon'	=> 'bx bx-share-alt',
					'sub'	=> [
						[
							'id'	=> ['link.index.social'],
							'title'	=> 'media sosial',
							'url'	=> ('link.index.social'),
						],
						[
							'id'	=> ['link.index.ecommerce'],
							'title'	=> 'toko online',
							'url'	=> ('link.index.ecommerce'),
						]
					]
				],
				[
					'id'	=> ['contact.index'],
					'title'	=> 'kontak',
					'url'	=> ('contact.index'),
					'icon'	=> 'bx bx-comment',
					'sub'	=> []
				],
			]
		]
	];
@endphp
<nav class="fixed left-0 top-0 z-[1035] h-screen w-60 -translate-x-full overflow-hidden bg-white shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] data-[te-sidenav-hidden='false']:translate-x-0 dark:bg-zinc-800"
	id="navbarSide"
	data-te-sidenav-init
	data-te-sidenav-hidden="false"
	data-te-sidenav-mode-breakpoint-over="0"
    data-te-sidenav-mode-breakpoint-side="sm"
	data-te-sidenav-slim="true"
	data-te-sidenav-slim-collapsed="true"
	data-te-sidenav-content="#app"
	data-te-sidenav-scroll-container="#scrollContainer"
	data-te-sidenav-accordion="true">
	<div class="py-3">
		<div class="pl-0">
			<h4 class="mb-0 text-primary text-2xl uppercase text-center font-medium leading-[1.2]">
				<i class="bx bxs-widget"></i>
			</h4>
		</div>
	</div>
	<hr class="border-gray-300" />
	<div id="scrollContainer">
		<ul class="relative m-0 list-none py-1 px-[0.2rem]"
			data-te-sidenav-menu-ref>
			@foreach($menu as $nav)
			<li class="relative">
				<span class="px-2 py-4 text-[0.6rem] font-bold uppercase text-gray-600 dark:text-gray-400">{{ $nav['title'] }}</span>
			</li>
			@foreach($nav['menu'] as $nav_item)
			<li class="relative data-[te-sidenav-state-active]:[&>a]:bg-slate-100 data-[te-sidenav-state-active]:[&>a]:text-blue-500 data-[te-sidenav-state-active]:[&>a]:shadow data-[te-sidenav-state-active]:[&>a]:hover:bg-slate-200 data-[te-sidenav-state-active]:[&>a]:text-blue-700 data-[te-sidenav-state-active]:[&>a]:hover:text-blue-700">
				@if (count($nav_item['sub']) > 0)
				<a class="flex h-12 cursor-pointer capitalize items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-600 outline-none transition duration-300 ease-linear [&>i]:text-xl hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
					{{ (in_array(Route::currentRouteName(), $nav_item['id'])) ? 'data-te-sidenav-state-active' : null }}
					data-te-sidenav-link-ref>
					<i class="{{ $nav_item['icon'] }} mr-2"></i>
					<span data-te-sidenav-slim="false">{{ $nav_item['title'] }}</span>
					<span class="absolute right-0 ml-auto mr-[0.8rem] transition-transform duration-300 ease-linear motion-reduce:transition-none [&>svg]:text-gray-600 dark:[&>svg]:text-gray-300"
						data-te-sidenav-slim="false"
						data-te-sidenav-rotate-icon-ref>
						<i class='bx bx-chevron-down'></i>
					</span>
				</a>
				<ul class="!visible relative my-1 mx-0 hidden list-none p-0 data-[te-collapse-show]:block "
					data-te-sidenav-collapse-ref>
					@foreach($nav_item['sub'] as $nav_child)
					<li class="relative data-[te-sidenav-state-active]:[&>a]:bg-slate-600 data-[te-sidenav-state-active]:[&>a]:hover:bg-slate-700 data-[te-sidenav-state-active]:[&>a]:text-white data-[te-sidenav-state-active]:[&>a]:hover:text-white">
						<a class="flex h-6 cursor-pointer capitalize items-center truncate rounded-[5px] py-4 pl-[2rem] pr-6 text-[0.78rem] text-gray-600 outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
							href="{{ $nav_child['url'] }}"
							{{ (in_array(Route::currentRouteName(), $nav_child['id'])) ? 'data-te-sidenav-state-active' : null }}
							data-te-sidenav-link-ref>
							{{ $nav_child['title'] }}
						</a>
					</li>
					@endforeach
				</ul>
				@else				
				<a class="flex cursor-pointer capitalize items-center truncate rounded-[5px] px-6 py-3 text-[0.875rem] text-gray-600 outline-none transition duration-300 ease-linear [&>i]:text-xl hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
					href="{{ $nav_item['url'] }}"
					{{ (in_array(Route::currentRouteName(), $nav_item['id'])) ? 'data-te-sidenav-state-active' : null }}
					data-te-sidenav-link-ref>
					<i class="{{ $nav_item['icon'] }}"></i>
					<span class="ml-2" data-te-sidenav-slim="false">{{ $nav_item['title'] }}</span>
				</a>
				@endif
			</li>
			@endforeach
			@endforeach
		</ul>
	</div>
	<div class="absolute border-t border-gray-300 bottom-0 w-full bg-inherit text-center py-2">
		<button class="btn-danger flex items-center mx-auto"
			data-te-ripple-init
  			data-te-ripple-color="light"
  			type="button">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
				<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
			</svg>
		</button>
	</div>
</nav>