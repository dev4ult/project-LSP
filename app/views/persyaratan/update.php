<?php
// var_dump($data);
// die;
?>

<a href="<?= BASEURL ?>/persyaratan" class="btn btn-outline btn-warning my-5">Back</a>

<h1 class="text-3xl font-bold my-5 mb-6">Edit Persyaratan Sertifikasi LSP</h1>
<?= Flasher::flash(); ?>

<div class="container-form w-full h-fit mb-4">
  <form action="<?= BASEURL ?>/persyaratan/update/<?= $data['id-syarat']; ?>" method="post" class="w-full">
    <div class="group-input flex justify-between">
      <div class="left-form w-1/2">
        <div class="form-control w-[500px]">
          <label class="label" for="persyaratan">
            <span class="label-text text-lg font-semibold">Nama Persyaratan</span>
          </label>
          <input type="text" placeholder="" value="<?= $data['list-syarat-id']['deskripsi']; ?>" class="input input-bordered" id="persyaratan" name="persyaratan" required />
        </div>
      </div>
      <div class="right-form w-1/2">
        <div class="form-control w-[500px]">
          <label class="label" for="kategori">
            <span class="label-text text-lg font-semibold">Kategori Persyaratan</span>
          </label>
          <select class="select select-bordered" id="kategori" name="kategori" required>
            <option disabled>-- Pilih Kategori --</option>
            <?php if ($data['list-syarat-id']['kategori'] == "Umum") : ?>
              <option value="Umum" selected>Umum</option>
              <option value="Teknis">Teknis</option>
            <?php else : ?>
              <option value="Umum">Umum</option>
              <option value="Teknis" selected>Teknis</option>
            <?php endif; ?>
          </select>
        </div>
      </div>
    </div>
    <button type="submit" name="submit" class="btn btn-info my-5 mt-8">Ubah</button>
  </form>
</div>