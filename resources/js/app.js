import {
	Chip,
	Collapse,
	Datepicker,
	Datatable,
	Dropdown,
	Input,
	Modal,
	Offcanvas,
	Ripple,
	Select,
	Sidenav,
	Tab,
	Timepicker,
	Tooltip,
	initTE,
} from "tw-elements";
import $ from 'jquery';
window.$ = $;
import Swal from 'sweetalert2';

initTE({ Chip, Collapse, Datatable, Datepicker, Dropdown, Input, Modal, Offcanvas, Ripple, Select, Sidenav, Tab, Timepicker, Tooltip });

const csrf_token = $("meta[name=csrf-token]").attr('content');
const Toast = Swal.mixin({
	toast: true,
	position: 'bottom-end',
	showConfirmButton: false,
	timer: 5000,
	timerProgressBar: true,
	didOpen: (toast) => {
		toast.addEventListener('mouseenter', Swal.stopTimer)
		toast.addEventListener('mouseleave', Swal.resumeTimer)
	}
});
const SwalDelete = Swal.mixin({
	title: 'Buang data?',
	icon: 'question',
	showCancelButton: true,
	confirmButtonText: 'Ya, buang!',
	cancelButtonText: 'Batal',
	reverseButtons: true,
	customClass: {
		confirmButton: 'inline-block rounded bg-red-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow transition duration-150 ease-in-out hover:bg-red-600 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-900 active:shadow-lg dark:shadow dark:hover:shadow-lg dark:focus:shadow-lg dark:active:shadow-lg',
		cancelButton: 'inline-block rounded bg-neutral-50 px-6 pb-2 pt-2.5 mr-2 text-xs font-medium uppercase leading-normal text-neutral-800 shadow transition duration-150 ease-in-out hover:bg-neutral-100 hover:shadow-lg focus:bg-neutral-100 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-neutral-200 active:shadow-lg dark:shadow dark:hover:shadow-lg dark:focus:shadow-lg dark:active:shadow-lg'
	},
	buttonsStyling: false,
	allowOutsideClick: false,
});
const SwalError = Swal.mixin({
	title: 'Request tidak valid',
	icon: 'error',
	customClass: {
		confirmButton: 'inline-block rounded bg-white px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-blue-500 shadow transition duration-150 ease-in-out hover:bg-slate-200 hover:shadow-lg focus:bg-slate-200 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-slate-200 active:shadow-lg dark:shadow dark:hover:shadow-lg dark:focus:shadow-lg dark:active:shadow-lg',
	},
	buttonsStyling: false,
});

/**
 * Button SideNav
 */
$("#navbarSide-toggler").on("click", function() {
	const instance = Sidenav.getInstance($("#navbarSide")[0]);
	instance.toggleSlim();
});

/**
 * 
 * @param {*} datatable 
 * @param {*} url 
 */
function datatable_fetch(datatable, url)
{
	$.ajax({
		url: url,
		type: 'get',
		dataType: 'json',
		success: function(data) {
			let rows = data.map((value, i) => ({
				title: value.title,
				actions:
				`<div class="flex">
					<button type="button" role="button" class="delete-button text-red-400 text-xl ms-2 transition duration-150 ease-in-out hover:text-red-700 focus:text-red-700" data-an-action="${value.delete}" data-an-message="${value.message}" data-te-toggle="tooltip" title="Hapus" data-te-index="${value.id}">
						<i class="bx bx-trash"></i>
					</button>
					<button type="button" role="button" class="log-button bg-stone-50 text-stone-600 text-md rounded leading-none py-1 px-2 ms-2 transition duration-150 ease-in-out hover:text-stone-700 hover:bg-stone-200 focus:text-stone-700 focus:bg-stone-200" data-an-action="${value.log}" data-te-toggle="tooltip" title="Riwayat" data-te-index="${value.id}">
						<i class="bx bx-objects-horizontal-left"></i>
					</button>
				</div>`
			}));
			datatable.update({
				rows: rows
			},
			{
				hover: true,
				loading: false
			});
		},
		error: function(error) {
			console.error('Error fetching data:', error);
		}
	});
}
/**
 * General datatable
 */
const dataLive = document.getElementById("dataLive");
if (dataLive) {
	const dataLive_api = dataLive.dataset.anFetch;
	const dataLiveButton = (action) => {
		$(`.${action}-button`).on('click', function(e){
			e.stopPropagation();
			let action = $(this).data('an-action'),
				message = $(this).data('an-message');
			if ($(this).hasClass('delete-button')) {
				SwalDelete.fire({
					text: message
				}).then((response) => {
					if (response.isConfirmed) {
						$.ajax({
							type: 'POST',
							url : action,
							data: {
								_token: csrf_token, _method: 'DELETE'
							},
							dataType: 'json',
							beforeSend: function() {
								Toast.fire({
									icon: 'info',
									title: 'Menghapus data..',
									text: 'Harap tunggu, proses hapus masih dalam proses.'
								});
							},
							success: function(response) {
								console.log(response);
								Toast.fire(response.toast);
								datatable_fetch(datatable, dataLive_api);
							},
							error: function(i,love,u) {
								console.log(i,love,u);
								Toast.fire({
									icon: 'error',
									title: 'Gagal dihapus',
									text: 'Coba kembali hubungi tim developer.'
								});
							}
						});
					}
				});
			} else if ($(this).hasClass('log-button')) {
				$("body").find('button[data-te-target="#modalLog"]').click();
				let action = $(this).data('an-action');
				$.ajax({
					type: 'get',
					url : action,
					beforeSend: function() {
						$("#modalLog").find('#modalLogContent').html(`<div class="text-center">loading..</div>`);
					},
					success: function(response) {
						$("#modalLog").find('#modalLogContent').html(response);
					},
					error: function(i,love,u) {
						console.log(i,love,u);
					}
				});
			}
		});
	}
	dataLive.addEventListener("render.te.datatable", () => {
		dataLiveButton("delete");
		dataLiveButton("log");
	});
	dataLive.addEventListener("rowClick.te.datatable", (e) => {
		location.assign($(e.row.title).data('an-edit'));
	});
	var datatable = new Datatable(dataLive,
		{
			columns: [
				{ label: `<i class="bx bx-dialpad-alt text-xl"></i>`, field: "actions", sort: false },
				{ label: ``, field: 'title' }
			],
		},
		{
			hover: false,
			loading: true
		}
	);
	datatable_fetch(datatable, dataLive_api);

	$("#dataLive-search").on('input', function(e) {
		datatable.search(e.target.value);
	});
}

/**
 * Storage datatable
 */
const dataStorage = document.getElementById("dataStorage");
if (dataStorage) {
	const dataStorage_api = dataStorage.dataset.anFetch;
	dataStorage.addEventListener("rowClick.te.datatable", (e) => {
		let thumbnail = $("#thumbnail"),
			image = $(e.row.title).find('img'),
			caption = $(e.row.title).find('span');
		$("#modalStorage").find('button[data-te-modal-dismiss]').click();
		thumbnail.find('img').attr('src', image.attr('src').replace('/xs/', '/'));
		thumbnail.find('input[name=file_method]').val('storage');
		thumbnail.find('input[name=file_storage]').val(image.attr('alt'));
		thumbnail.find('input[name=file_source]').val(caption.text());
		thumbnail.find('#file_temp_name').addClass('hidden').children('span').text(null);
		thumbnail.find('#file_temp_size').addClass('hidden').children('span').text(null);
		thumbnail.find('#file_temp_modified').addClass('hidden').children('span').text(null);
	});
	var datatable = new Datatable(dataStorage,
		{
			columns: [
				{ label: 'Judul', field: 'title' }
			],
		},
		{
			hover: false,
			loading: true
		}
	);
	$.ajax({
		url: dataStorage_api,
		type: 'get',
		dataType: 'json',
		success: function(data) {
			let rows = data.map((value, i) => ({
				title: value.title
			}));
			datatable.update({
				rows: rows
			},
			{
				hover: true,
				loading: false
			});
		},
		error: function(error) {
			console.error('Error fetching data:', error);
		}
	});
	dataStorage.addEventListener('selectRows.te.datatable', (e) => {
		let image = $(e.selectedRows[0].title);
	});
	$("#dataStorage-search").on('input', function(e) {
		datatable.search(e.target.value);
	});
}

/**
 * Form action
 * Store
 */
if ($(".to-store").length > 0) {
	const form_store = $(".to-store");

	document.addEventListener('keydown', function(event) {
		if (event.ctrlKey && event.key === 's') {
			event.preventDefault();
			form_store.submit();
		}
	});

	form_store.on('submit', function(e) {
		e.preventDefault();
		var action = $(this).attr('action'),
			submit = $(this).find('button[type=submit]'),
			ajax_prop;
		if (form_store.attr('enctype')=='multipart/form-data') {
			let formData = new FormData(this);
			formData.append('_token', csrf_token);
			ajax_prop = {
				data: formData,
				contentType: false,
				cache: false,
				processData:false,
			};
		} else {
			ajax_prop = {
				data: $(this).serialize() + "&_token="+csrf_token
			};
		}
		$.ajax({
			type: 'post',
			url : action,
			dataType: 'json',
			...ajax_prop,
			beforeSend: function() {
				Toast.fire({
					icon: 'info',
					title: 'Menyimpan data..',
					text: 'Harap tunggu, proses simpan masih dalam proses.'
				});
				submit.prop('disabled', true);
			},
			success: function(response) {
				console.log(response);
				submit.prop('disabled', false);
				if (response.callback.type=='datatable_update') {
					Toast.fire(response.toast);
					form_store[0].reset();
					datatable_fetch(datatable, response.callback.url);
					$("button[data-te-modal-dismiss]").click();
					if ($("#thumbnail").length > 0) {
						$("#thumbnail").find('img').attr('src', null);
					}
				} else if (response.callback.type=='redirect') {
					location.assign(response.callback.url);
				} else if (response.callback.type=='reload') {
					location.reload();
				} else if (response.callback.type=='nothing') {
					Toast.fire(response.toast);
				}
			},
			error: function(i,love,u) {
				console.log(i,love,u);
				submit.prop('disabled', false);
				let message = "<ol>";
				if (i.responseJSON.errors) {
					$.each(i.responseJSON.errors, function(index, value) {
						$("form").find(`sup[for=${index}]`).removeClass('hidden');
						message += `<li>${value}</li>`;
					});
				} else {
					message += `<li>${u}</li>`;
				}
				message += "</ol>";
				SwalError.fire({
					html: message
				});
			}
		});
	});
}
/**
 * Form action
 * Update
 */
if ($(".to-update").length > 0) {
	const form_update = $(".to-update");

	document.addEventListener('keydown', function(event) {
		if (event.ctrlKey && event.key === 's') {
			event.preventDefault();
			form_update.submit();
		}
	});

	form_update.on('submit', function(e) {
		e.preventDefault();
		let action = $(this).attr('action'),
			submit = $(this).find('button[type=submit]'),
			ajax_prop;
		if (form_update.attr('enctype')=='multipart/form-data') {
			let formData = new FormData(this);
			formData.append('_token', csrf_token);
			formData.append('_method', 'PATCH');
			ajax_prop = {
				data: formData,
				contentType: false,
				cache: false,
				processData:false,
			};
		} else {
			ajax_prop = {
				data: $(this).serialize() + "&_token="+csrf_token+"&_method=PATCH"
			};
		}
		$.ajax({
			type: 'post',
			url : action,
			dataType: 'json',
			...ajax_prop,
			beforeSend: function() {
				Toast.fire({
					icon: 'info',
					title: 'Menyimpan data..',
					text: 'Harap tunggu, proses simpan masih dalam proses.'
				});
				submit.prop('disabled', true);
			},
			success: function(response) {
				submit.prop('disabled', false);
				if (response.callback.type=='datatable_update') {
					Toast.fire(response.toast);
					form_store[0].reset();
					datatable_fetch(datatable, response.callback.url);
					$("button[data-te-modal-dismiss]").click();
				} else if (response.callback.type=='redirect') {
					location.assign(response.callback.url);
				} else if (response.callback.type=='reload') {
					location.reload();
				} else if (response.callback.type=='nothing') {
					Toast.fire(response.toast);
				} 
			},
			error: function(i,love,u) {
				console.log(i,love,u);
				submit.prop('disabled', false);
				let message = "<ol>";
				if (i.responseJSON.errors) {
					$.each(i.responseJSON.errors, function(index, value) {
						$("form").find(`sup[for=${index}]`).removeClass('hidden');
						message += `<li>${value}</li>`;
					});
				} else {
					message += `<li>${u}</li>`;
				}
				message += "</ol>";
				Swal.fire({
					icon: 'error',
					title: 'Gagal disimpan',
					html: message
				});
			}
		});
	});
}
/**
 * Form action
 * Destroy
 */
if ($(".to-destroy").length > 0) {
	const form_destroy = $(".to-destroy");
	form_destroy.on('click', function(e){
		e.stopPropagation();
		let action = $(this).data('action'),
			message = $(this).data('message'),
			submit = form_destroy;
		SwalDelete.fire({
			text: message
		}).then((response) => {
			if (response.isConfirmed) {
				$.ajax({
					type: 'post',
					url : action,
					data: {
						_token: csrf_token, _method: 'DELETE'
					},
					dataType: 'json',
					beforeSend: function() {
						submit.prop('disabled', true);
						Toast.fire({
							icon: 'info',
							title: 'Menghapus data..',
							text: 'Harap tunggu, proses hapus masih dalam proses.'
						});
					},
					success: function(response) {
						submit.prop('disabled', false);
						if (response.callback.type=='datatable_update') {
							Toast.fire(response.toast);
							datatable_fetch(datatable, response.callback.url);
							$("button[data-te-modal-dismiss]").click();
						} else if (response.callback.type=='redirect') {
							location.assign(response.callback.url);
						} else if (response.callback.type=='reload') {
							location.reload();
						}
					},
					error: function(i,love,u) {
						console.log(i,love,u);
						submit.prop('disabled', false);
						Toast.fire({
							icon: 'error',
							title: 'Gagal dihapus',
							text: 'Coba kembali hubungi tim developer.'
						});
					}
				});
			}
		});
	});
}
/**
 * Form action
 * Restore
 */
if ($(".to-restore").length > 0) {
	const form_restore = $(".to-restore");
	form_restore.on('click', function(e) {
		e.preventDefault();
		let action = $(this).attr('href'),
			submit = $(this);
		$.ajax({
			type: 'post',
			url : action,
			data: {
				_token: csrf_token, _method: 'PATCH'
			},
			dataType: 'json',
			beforeSend: function() {
				Toast.fire({
					icon: 'info',
					title: 'Memulihkan data..',
					text: 'Harap tunggu, proses pemulihan masih dalam proses.'
				});
				submit.prop('disabled', true);
			},
			success: function(response) {
				submit.prop('disabled', false);
				if (response.callback.type=='datatable_update') {
					// reference {to-update} module
				} else if (response.callback.type=='redirect') {
					location.assign(response.callback.url);
				} else if (response.callback.type=='reload') {
					location.reload();
				}
			},
			error: function(i,love,u) {
				console.log(i,love,u);
				let message = "<ol>";
				if (i.responseJSON.errors) {
					$.each(i.responseJSON.errors, function(index, value) {
						$("form").find(`sup[for=${index}]`).removeClass('hidden');
						message += `<li>${value}</li>`;
					});
				} else {
					message += `<li>${u}</li>`;
				}
				message += "</ol>";
				Swal.fire({
					icon: 'error',
					title: 'Gagal',
					html: message
				});
			}
		});
	});
}
/**
 * Form action
 * Clear bin
 */
if ($(".to-clear").length > 0) {
	const form_clear = $(".to-clear");
	form_clear.on('click', function(e) {
		e.preventDefault();
		let action = $(this).attr('href'),
			message= $(this).data('message'),
			submit = $(this);
		SwalDelete.fire({
			text: message
		}).then((response) => {
			if (response.isConfirmed) {
				$.ajax({
					type: 'post',
					url : action,
					data: {
						_token: csrf_token, _method: 'DELETE'
					},
					dataType: 'json',
					beforeSend: function() {
						Toast.fire({
							icon: 'info',
							title: 'Membersihkan keranjang..',
							text: 'Harap tunggu, proses pembersihan masih dalam proses.'
						});
						submit.prop('disabled', true);
					},
					success: function(response) {
						submit.prop('disabled', false);
						if (response.callback.type=='datatable_update') {
							// reference {to-update} module
						} else if (response.callback.type=='redirect') {
							location.assign(response.callback.url);
						} else if (response.callback.type=='reload') {
							location.reload();
						}
					},
					error: function(i,love,u) {
						console.log(i,love,u);
						let message = "<ol>";
						if (i.responseJSON.errors) {
							$.each(i.responseJSON.errors, function(index, value) {
								$("form").find(`sup[for=${index}]`).removeClass('hidden');
								message += `<li>${value}</li>`;
							});
						} else {
							message += `<li>${u}</li>`;
						}
						message += "</ol>";
						Swal.fire({
							icon: 'error',
							title: 'Gagal',
							html: message
						});
					}
				});
			}
		});
	});
}