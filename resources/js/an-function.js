import $ from 'jquery';
window.$ = $;

/**
 * Additional Function
 */
function bytes(bytes, roundTo) {
	var converted = bytes / (1024);
	return roundTo ? converted.toFixed(roundTo) : converted;
}

/**
 * Per te-an
 */

/**
 * Document action
 */
$(document).on('click', 'span[data-te-chip-close]', function(e) {
	e.stopPropagation();
	$(this).parent().remove();
});

/**
 * Per an-an
 */

/**
 * Data switch area
 */
if ($("input[data-an-switch]").length > 0) {
	$("input[data-an-switch]").on('change', function(e) {
		if (e.target.checked) {
			$($(this).data('an-switch')).removeClass('hidden');
		} else {
			$($(this).data('an-switch')).addClass('hidden');
		}
	});
}

/**
 * Data input area
 */
if ($("[data-an-input]").length > 0) {
	$.each($("[data-an-input]"), (i,dataInput) => {
		if ($(dataInput).data('an-input')=='browse-file') {
			/**
			* Preview image 
			*/
			let browse_file = $("[data-an-input=browse-file]");
			browse_file.on('change', function() {
				const file = this.files[0];
				if (file){
					let reader = new FileReader(),
					target = $(this).data('an-target');
					reader.onload = function(e){
						// $("#thumbail").html(null);
						// $("#thumbail").removeClass('hidden');
						$(target).find('input[name=file_method]').val('upload');
						$(target).find('input[name=file_source]').val();
						$(target).find('#file_temp_name').removeClass('hidden').children('span').text(file.name);
						$(target).find('#file_temp_size').removeClass('hidden').children('span').text(bytes(file.size, 2)+'Kb');
						$(target).find('#file_temp_modified').removeClass('hidden').children('span').text(file.lastModifiedDate);
						$(target).find('img').attr('src', e.target.result);
					}
					reader.readAsDataURL(file);
				}
			});
		}
	});
}
/**
 * Data button area
 */
if ($("[data-an-button]").length > 0) {
	$.each($("[data-an-button]"), (i,dataButton) => {
		if ($(dataButton).data('an-button')=='tag') {
			/**
			 * Add tag
			 */
			let add_tag = $("[data-an-button=tag]");
			add_tag.on('click', function(e) {
				e.preventDefault();
				let area = $("#area-tag"),
					input = $(this).parent().find('input[data-an-input=tag]'),
					tag = `<div class="[word-wrap: break-word] mb-1 inline-flex h-[30px] cursor-pointer items-center justify-between rounded-[16px] bg-[#eceff1] px-[12px] py-0 text-[13px] font-normal normal-case leading-loose text-[#4f4f4f] shadow-none transition-[opacity] duration-300 ease-linear hover:!shadow-none active:bg-[#cacfd1] dark:bg-neutral-600 dark:text-neutral-200"
						data-te-chip-init
						data-te-ripple-init>
						<span class="float-right cursor-pointer leading-none text-[20px] text-[#afafaf] opacity-[.53] transition-all duration-200 ease-in-out hover:text-[#8b8b8b] dark:text-neutral-400 dark:hover:text-neutral-100"
							data-te-chip-close>
							<i class="bx bx-x"></i>
						</span>
						<input type="hidden" name="tags[]" value="${input.val()}">
						<span class="text-primary">#${input.val()}</span>
					</div>`;
				input.val(null);
				area.append(tag);
			});
		}
	});
}