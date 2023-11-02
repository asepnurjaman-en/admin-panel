<div class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
	data-te-modal-init
	id="modalStorage"
	tabindex="-1"
	aria-labelledby="modalStorageLabel"
	aria-modal="true"
	role="dialog">
	<div class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px] min-[1200px]:max-w-[1140px]"
		data-te-modal-dialog-ref>
		<div class="pointer-events-auto relative flex w-full flex-col rounded-none border-none bg-white bg-clip-padding text-current shadow-lg outline-none lg:rounded dark:bg-neutral-600">
			<div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
				<!--Modal title-->
				<h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
					id="modalStoragelLabel">
					<i class="bx bx-images"></i>
					<span>Pilih gambar</span>
				</h5>
				<div class="flex gap-2">
					<button class="btn-secondary inline-block"
						type="button"
						data-te-modal-dismiss
						data-te-ripple-init
						aria-label="Close">
						<i class="bx bx-x"></i>
						<span>batal</span>
					</button>
				</div>
      		</div>
		    <div class="relative">
				<div class="relative p-2 mb-2 flex w-full flex-wrap items-stretch">
					<span class="flex items-center whitespace-nowrap rounded-l border border-r-0 pl-4 pr-2 py-[0.15rem] text-center text-base font-normal leading-[1.6] text-neutral-700 dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200"
						data-te-input-group-text-ref>
						<i class="bx bx-search"></i>
					</span>
					<input class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-r border border-l-0 bg-transparent bg-clip-padding px-3 py-[.5rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:text-neutral-700 focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
						id="dataStorage-search"
						type="search"
						placeholder="Cari gambar"
						aria-label="Cari gambar"
						aria-describedby="search" />
				</div>
				<div id="dataStorage" data-an-fetch="{{ route('strbox.datatable') }}" data-te-clickable-rows="true"></div>
			</div>
    	</div>
  	</div>
</div>