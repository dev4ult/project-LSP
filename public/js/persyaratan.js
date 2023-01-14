function getLevel(value, url) {
	// alert(value);
	window.location.href = `${url}/${value}/`;
	return value;
}

function getPersyaratan(skema, value, url) {
	window.location.href = `${url}/${skema}/${value}`;
}

const section = document.querySelector(".group-input-persyaratan");
function addSection() {
	let html = `<div class="form-control w-[500px] mt-4">
		<select class="select select-bordered" id="kategori" name="kategori" required>
		<option disabled selected>-- Pilih Persyaratan --</option>
		<?php foreach ($data['list-persyaratan'] as $ds) : ?>
			<option value="<?= $ds['deskripsi']; ?>"><?= $ds['deskripsi']; ?></option>
		<?php endforeach; ?>
	</select>
</div>`;
	section.insertAdjacentHTML("beforeend", html);
}
