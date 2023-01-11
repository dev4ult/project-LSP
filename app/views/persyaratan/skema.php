<a href="<?= BASEURL ?>/skema/index/" class="btn btn-outline btn-warning my-5">Back</a>
<h1 class="text-3xl font-bold my-5 mb-6">Input Persyaratan Skema Sertifikasi LSP</h1>
<?= Flasher::flash(); ?>

<div class="container-form w-full h-fit mb-4">
  <form action="<?= BASEURL ?>/persyaratan/addPersyaratanSkema" method="post" class="w-11/12">
    <div class="pilih-skema flex justify-between mb-4">
      <div class="form-control w-[500px]">
        <label class="label" for="skema">
          <span class="label-text text-lg font-semibold">Skema Sertifikasi</span>
        </label>
        <select onchange="getLevel(this.options[this.selectedIndex].value, '<?= BASEURL ?>/persyaratan/skema')" class="select select-bordered" id="skema" name="skema" required>
          <?php if (isset($data['skema-selected'])) : ?>
            <option disabled>-- Pilih Skema --</option>
          <?php else : ?>
            <option disabled selected>-- Pilih Skema --</option>
          <?php endif; ?>
          <?php foreach ($data['list-skema'] as $ds) : ?>
            <?php if ($ds['nama_skema'] === $data['skema-selected']) : ?>
              <option value="<?= $ds['nama_skema'] ?>" selected><?= $ds['nama_skema'] ?></option>
            <?php else : ?>
              <option value="<?= $ds['nama_skema'] ?>"><?= $ds['nama_skema'] ?></option>
            <?php endif; ?>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-control w-[500px]">
        <label class="label" for="level-kkni">
          <span class="label-text text-lg font-semibold">Level KKNI</span>
        </label>
        <select onchange="getPersyaratan('<?= $data['skema-selected'] ?>', this.options[this.selectedIndex].value, '<?= BASEURL ?>/persyaratan/skema')" class="select select-bordered" id="level-kkni" name="level-kkni" required>
          <?php if (isset($data['level-selected'])) : ?>
            <option disabled>-- Pilih Level --</option>
          <?php else : ?>
            <option disabled selected>-- Pilih Level --</option>
          <?php endif; ?>
          <?php foreach ($data['list-level'] as $ds) : ?>
            <?php if ($ds['level'] === $data['level-selected']) : ?>
              <option value="<?= $ds['level'] ?>" selected><?= $ds['level'] ?></option>
            <?php else : ?>
              <option value="<?= $ds['level'] ?>"><?= $ds['level'] ?></option>
            <?php endif; ?>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <h1 class="inline-block text-xl font-bold mt-8 mb-3 mr-5 ">Persyaratan Skema</h1><span class="badge badge-info cursor-pointer" onclick="addSection()">Tambah Persyaratan</span>
    <div class="group-input-persyaratan w-full flex flex-wrap justify-between">
      <div class="list-umum w-[500px]">
        <h1 class="text-lg font-semibold mt-5 mb-3">Kategori Umum</h1>
        <?php foreach ($data['list-persyaratan-umum'] as $ds) : ?>
          <?php if (isset($data['persyaratan-skema'])) : ?>
            <?php foreach ($data['persyaratan-skema'] as $ps) : ?>
              <?php if ($ps['deskripsi'] == $ds['deskripsi']) : ?>
                <?php $match = true;
                break; ?>
              <?php endif; ?>
            <?php endforeach; ?>
          <?php endif; ?>
          <?php if (isset($match) && $match == true) : ?>
            <div class="form-control w-1/2">
              <label class="cursor-pointer label flex justify-start">
                <input type="checkbox" disabled checked="checked" class="checkbox checkbox-info mr-3" name="check[]" value="<?= $ds['deskripsi']; ?>" />
                <span class="label-text font-semibold"><?= $ds['deskripsi']; ?></span>
              </label>
            </div>
            <?php $match = false; ?>
          <?php else : ?>
            <div class="form-control w-1/2">
              <label class="cursor-pointer label flex justify-start">
                <input type="checkbox" class="checkbox checkbox-info mr-3" name="check[]" value="<?= $ds['deskripsi']; ?>" />
                <span class="label-text font-semibold"><?= $ds['deskripsi']; ?></span>
              </label>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
      <div class="list-teknis w-[500px]">
        <h1 class="text-lg font-semibold mt-5 mb-3">Kategori Teknis</h1>
        <?php foreach ($data['list-persyaratan-teknis'] as $ds) : ?>
          <?php if (isset($data['persyaratan-skema'])) : ?>
            <?php foreach ($data['persyaratan-skema'] as $ps) : ?>
              <?php if ($ps['deskripsi'] == $ds['deskripsi']) : ?>
                <?php $match = true;
                break; ?>
              <?php endif; ?>
            <?php endforeach; ?>
          <?php endif; ?>
          <?php if (isset($match) && $match == true) : ?>
            <div class="form-control w-1/2">
              <label class="cursor-pointer label flex justify-start">
                <input type="checkbox" disabled checked="checked" class="checkbox checkbox-info mr-3" name="check[]" value="<?= $ds['deskripsi']; ?>" />
                <span class="label-text font-semibold"><?= $ds['deskripsi']; ?></span>
              </label>
            </div>
            <?php $match = false; ?>
          <?php else : ?>
            <div class="form-control w-1/2">
              <label class="cursor-pointer label flex justify-start">
                <input type="checkbox" class="checkbox checkbox-info mr-3" name="check[]" value="<?= $ds['deskripsi']; ?>" />
                <span class="label-text font-semibold"><?= $ds['deskripsi']; ?></span>
              </label>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
    <button type="submit" name="submit" class="btn btn-info my-5 mt-8">Tambahkan</button>
  </form>
</div>