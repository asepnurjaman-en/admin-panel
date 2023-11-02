{{-- LogModal --}}
<button class="inline-block"
	type="button"
	data-te-ripple-init
	data-te-toggle="modal"
	data-te-target="#modalLog"
	data-te-ripple-color="light">
</button>
<div class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
	data-te-modal-init
	id="modalLog"
	tabindex="-1"
	aria-labelledby="modalLogLabel"
	aria-hidden="true">
	<div class="pointer-events-none relative w-auto m-1 translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[700px]"
		data-te-modal-dialog-ref>
		<div class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
			<div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
				<!--Modal title-->
				<h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
					id="modalLogLabel">
					<i class="bx bx-objects-horizontal-left"></i>
					<span>Riwayat</span>
				</h5>
				<div class="flex gap-2">
					<button class="btn-secondary inline-block"
						type="button"
						data-te-modal-dismiss
						data-te-ripple-init
						aria-label="Close">
						<i class="bx bx-x"></i>
						<span>tutup</span>
					</button>
				</div>
			</div>
			<div id="modalLogContent" class="p-3">
				<div class="p-4 max-w-sm w-full mx-auto">
					<div class="text-center">loading..</div>
				</div>
			</div>
		</div>
	</div>
</div>