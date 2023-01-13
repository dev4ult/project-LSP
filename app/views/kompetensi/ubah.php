<?php
// var_dump($data);
?>

<a href="<?= BASEURL ?>/skema/detail/<?= $data['id-skema'] ?>" class="btn btn-outline btn-warning my-5">Back</a>

<h1 class="text-3xl font-bold my-5 mb-6">Ubah Data Kompetensi Sertifikasi Profesi (LSP)</h1>
<?= Flasher::flash(); ?>

<div class="container-form w-full h-fit mb-4">
  <form action="<?= BASEURL ?>/skema/edit_kompetensi/<?= $data['id-kompetensi'] ?>/<?= $data['id-skema'] ?>" method="post" class="w-full" enctype="multipart/form-data">
    <div class="group-input flex justify-between">
      <div class="left-form w-1/2">
        <div class="form-control w-[500px]">
          <label class="label" for="nama-kompetensi">
            <span class="label-text text-lg font-semibold after:content-['*'] after:text-pink-500 after:ml-0.5">Nama Kompetensi</span>
          </label>
          <input type="text" value="<?= $data['list-kompetensi']['nama_kompetensi']; ?>" placeholder="" class="input input-bordered" id="nama-kompetensi" name="nama-kompetensi" required />
        </div>
        <div class="form-control w-[500px] mt-4">
          <label class="label" for="pelaksanaan">
            <span class="label-text text-lg font-semibold after:content-['*'] after:text-pink-500 after:ml-0.5">Jenis Pelaksanaan</span>
          </label>
          <select class="select select-bordered" id="pelaksanaan" name="pelaksanaan" required>
            <?php if ($data['list-kompetensi']['jenis_pelaksanaan'] == "Offline") : ?>
              <option disabled>-- Pilih Pelaksanaan --</option>
              <option value="Offline" selected>Offline</option>
              <option value="Online">Online</option>
            <?php else : ?>
              <option disabled>-- Pilih Pelaksanaan --</option>
              <option value="Offline">Offline</option>
              <option value="Online" selected>Online</option>
            <?php endif; ?>
          </select>
        </div>
        <div class="waktu w-[500px] mt-4 flex flex-wrap justify-between items-center">
          <div class="form-control w-[240px]">
            <label class="label" for="jam-mulai">
              <span class="label-text text-lg font-semibold after:content-['*'] after:text-pink-500 after:ml-0.5">Mulai Ujian</span>
            </label>
            <input type="time" value="<?= $data['list-kompetensi']['jam_mulai']; ?>" placeholder="" class="input input-bordered" id="jam-mulai" name="jam-mulai" required />
          </div>
          <div class="form-control w-[240px]">
            <label class="label" for="jam-akhir">
              <span class="label-text text-lg font-semibold after:content-['*'] after:text-pink-500 after:ml-0.5">Selesai Ujian</span>
            </label>
            <input type="time" value="<?= $data['list-kompetensi']['jam_akhir']; ?>" placeholder="" class="input input-bordered" id="jam-akhir" name="jam-akhir" required />
          </div>
        </div>
      </div>
      <div class="right-form w-1/2">
        <div class="form-control w-full">
          <label class="label" for="tgl-kompetensi">
            <span class="label-text text-lg font-semibold after:content-['*'] after:text-pink-500 after:ml-0.5">Tanggal Ujian</span>
          </label>
          <input type="date" value="<?= $data['list-kompetensi']['tgl_ujian_kompetensi']; ?>" placeholder="" class="input input-bordered" id="tgl-kompetensi" name="tgl-kompetensi" required />
        </div>
        <div class="form-control w-full mt-4">
          <label class="label" for="tempat-kompetensi">
            <span class="label-text text-lg font-semibold after:content-['*'] after:text-pink-500 after:ml-0.5">Tempat Ujian Kompetensi</span>
          </label>
          <input type="text" value="<?= $data['list-kompetensi']['tempat_unit_kompetensi']; ?>" placeholder="" class="input input-bordered" id="tempat-kompetensi" name="tempat-kompetensi" required />
        </div>
        <div class="form-control w-fit mt-4">
          <label class="label" for="soal-kompetensi">
            <span class="label-text text-lg font-semibold">Soal Ujian</span>
          </label>
          <input type="file" placeholder="" class="input" id="soal-kompetensi" name="soal-kompetensi" />
          <span><?= $data['list-kompetensi']['file_opsional']; ?></span>
        </div>
      </div>
    </div>
    <button type="submit" name="ubah" class="btn btn-info my-5 mt-8">Ubah</button>
  </form>
</div>