<nav class="flex-no-wrap relative flex w-full items-center justify-between py-2 shadow-md shadow-black/5 dark:bg-neutral-600 dark:shadow-black/10 lg:flex-wrap lg:justify-start"
	id="navbarTop"
	data-te-navbar-ref>
	<div class="flex w-full flex-wrap items-center justify-between px-3">
		<div class="flex flex-wrap justify-between w-full lg:w-auto">
			<button class="inline-block md:hidden rounded bg-white px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal shadow transition duration-150 ease-in-out [&>span>svg]:text-blue-500 hover:bg-slate-50 hover:shadow-lg focus:bg-slate-100 focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-inner active:shadow-lg dark:shadow dark:hover:shadow-lg dark:focus:shadow-lg dark:active:shadow-lg"
				data-te-sidenav-toggle-ref
				data-te-target="#navbarSide"
				aria-controls="#navbarSide"
				aria-haspopup="true">
				<span class="block [&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-white">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
						<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
					</svg>
				</span>
			</button>
			<!-- Toggler -->
			<button class="hidden md:inline-block rounded bg-white px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal shadow transition duration-150 ease-in-out [&>span>svg]:text-blue-500 hover:bg-slate-50 hover:shadow-lg focus:bg-slate-100 focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-inner active:shadow-lg dark:shadow dark:hover:shadow-lg dark:focus:shadow-lg dark:active:shadow-lg"
				id="navbarSide-toggler"
				aria-haspopup="true">
				<span class="block [&>svg]:h-5 [&>svg]:w-5">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
						<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
					</svg>
				</span>
			</button>
			<button class="[&>i]:text-xl block border-0 bg-transparent text-neutral-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-neutral-200 lg:hidden"
				type="button"
				data-te-collapse-init
				data-te-target="#navbarPrimary"
				aria-controls="navbarPrimary"
				aria-expanded="false"
				aria-label="Toggle navigation">
				<i class="bx bx-dots-vertical-rounded"></i>
			</button>
		</div>
		<div class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto"
			id="navbarPrimary"
			data-te-collapse-item>
			<ul class="list-style-none mr-auto flex flex-col py-2 lg:py-0 lg:pl-4 lg:flex-row"
				data-te-navbar-nav-ref>
				<li class="mb-1 text-right lg:mb-0 lg:pr-1"
					data-te-nav-item-ref>
			  		<!-- Dashboard link -->
			  		<a class="block text-neutral-500 rounded transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-4 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
						href="{{ route('admin.dashboard') }}" 
						data-te-nav-link-ref>
						Dashboard
					</a>
				</li>
				<li class="mb-1 text-right lg:mb-0 lg:pr-1"
					data-te-nav-item-ref>
					<!-- Logout link -->
			  		<a class="block lg:hidden text-neutral-500 rounded transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-4 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
					  	href="{{ route('logout') }}"
						onclick="event.preventDefault();document.getElementById('logout-form').submit();" 
						data-te-nav-link-ref>
						Keluar
					</a>
				</li>
			</ul>
		</div>
		<!-- Second dropdown container -->
		@guest
		@else
		<div class="relative"
			data-te-dropdown-ref>
			<!-- Second dropdown trigger -->
			<a class="hidden-arrow !visible hidden items-center whitespace-nowrap transition duration-150 ease-in-out lg:flex motion-reduce:transition-none"
				href="#"
				id="dropdownAvatar"
				role="button"
				data-te-dropdown-toggle-ref
				aria-expanded="false">
			  	<!-- User avatar -->
			  	<img class="rounded-full h-[35px] w-[35px] mr-2"
				  	src="https://tecdn.b-cdn.net/img/new/avatars/2.jpg"
					alt=""
					loading="lazy" />
				<span>{{ Auth::user()->name }}</span>
			</a>
			<!-- Second dropdown menu -->
			<ul class="absolute left-auto right-0 z-[1000] float-left m-0 mt-1 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
				aria-labelledby="dropdownAvatar"
				data-te-dropdown-menu-ref>
			  	<!-- Second dropdown menu items -->
			  	<li>
					<a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
						{{-- href="{{ route('user.profile', Auth::user()->role) }}" --}}
						data-te-dropdown-item-ref>
						Action
					</a>
			  	</li>
			  	<!-- Second dropdown menu items -->
			  	<li>
					<a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30" 
						href="{{ route('logout') }}"
						onclick="event.preventDefault();document.getElementById('logout-form').submit();" 
						data-te-dropdown-item-ref>Keluar</a>
					<form class="d-none" id="logout-form" action="{{ route('logout') }}" method="POST">
						@csrf
					</form>
			  	</li>
			</ul>
		</div>
		@endguest
	</div>
</nav>
