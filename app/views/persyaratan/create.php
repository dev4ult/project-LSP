<h1 class="text-3xl font-bold my-5 mb-6">Input Persyaratan Sertifikasi LSP</h1>
<?= Flasher::flash(); ?>

<div class="container-form w-full h-fit mb-4">
  <form action="<?= BASEURL ?>/persyaratan/add" method="post" class="w-full">
    <div class="group-input flex justify-between">
      <div class="left-form w-1/2">
        <div class="form-control w-[500px]">
          <label class="label" for="persyaratan">
            <span class="label-text text-lg font-semibold">Nama Persyaratan</span>
          </label>
          <input type="text" placeholder="" class="input input-bordered" id="persyaratan" name="persyaratan" required />
        </div>
      </div>
      <div class="right-form w-1/2">
        <div class="form-control w-[500px]">
          <label class="label" for="kategori">
            <span class="label-text text-lg font-semibold">Kategori Persyaratan</span>
          </label>
          <select class="select select-bordered" id="kategori" name="kategori" required>
            <option disabled selected>-- Pilih Kategori --</option>
            <option value="Umum">Umum</option>
            <option value="Teknis">Teknis</option>
          </select>
        </div>
      </div>
    </div>
    <button type="submit" name="submit" class="btn btn-info my-5 mt-8">Tambahkan</button>
  </form>
</div>

<table class="table table-zebra w-full my-5">
  <!-- head -->
  <thead>
    <tr class="text-center text-5xl">
      <th>No.</th>
      <th>Nama Persyaratan</th>
      <th>Tipe</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <!-- row 1 -->
    <?php $no = 1;
    $file = "";
    $notMatch = true; ?>
    <?php if (count($data['list-persyaratan']) > 0) : ?>
      <?php foreach ($data['list-persyaratan'] as $ds) : ?>

        <tr>
          <td class="text-center"><?= $no++; ?></td>
          <td><?= $ds['deskripsi']; ?></td>
          <td><?= $ds['kategori']; ?></td>
          <td class="text-center flex items-center justify-evenly">
            <a href="<?= BASEURL ?>/persyaratan/hapus/<?= $ds['id'] ?>" class="btn btn-outline btn-warning rounded-md mt-5" onclick="return confirm('Mau Dihapus');">Hapus</a>
            <a href="<?= BASEURL ?>/persyaratan/edit/<?= $ds['id'] ?>" class="btn btn-outline btn-info rounded-md mt-5">Ubah</a>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php else : ?>
      <tr>
        <td>
          <h1 class="text-lg">Belum ada Asesi Terdaftar</h1>
        </td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>