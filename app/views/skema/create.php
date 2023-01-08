<?php
// var_dump($data['skkni']);
// die;
?>

<a href="<?= BASEURL ?>/skema/index/" class="btn btn-outline btn-warning my-5">Back</a>

<h1 class="text-3xl font-bold my-5 mb-6">Input Data Skema Sertifikasi Profesi (LSP)</h1>
<?= Flasher::flash(); ?>

<div class="container-form w-full h-fit mb-4">
  <form action="<?= BASEURL ?>/skema/add" method="post" class="w-full">
    <div class="group-input flex justify-between">
      <div class="left-form w-1/2">
        <div class="form-control w-[500px]">
          <label class="label" for="skema">
            <span class="label-text text-lg font-semibold">Nama Skema Profesi</span>
          </label>
          <input type="text" placeholder="" class="input input-bordered" id="skema" name="skema" required />
        </div>
        <div class="form-control w-[500px] mt-4">
          <label class="label" for="level">
            <span class="label-text text-lg font-semibold">Level KKNI</span>
          </label>
          <select class="select select-bordered" id="level" name="level" required>
            <option disabled selected>-- Pilih Level --</option>
            <option value="Level I">Level I</option>
            <option value="Level II">Level II</option>
            <option value="Level III">Level III</option>
            <option value="Level IV">Level IV</option>
            <option value="Level V">Level V</option>
          </select>
        </div>
        <div class="form-control w-[500px] mt-4">
          <label class="label" for="bukti-ket">
            <span class="label-text text-lg font-semibold">Keterangan Bukti yang Akan Diperoleh</span>
          </label>
          <input type="text" placeholder="" class="input input-bordered" id="bukti-ket" name="bukti-keterangan" />
        </div>
      </div>
      <div class="right-form w-1/2">
        <div class="form-control w-full">
          <label class="label" for="SKKNI">
            <span class="label-text text-lg font-semibold">SKK/KKNI LSP</span>
          </label>
          <select class="select select-bordered" id="SKKNI" name="SKKNI" required>
            <option disabled selected>-- Pilih SKK/KKNI --</option>
            <?php foreach ($data['skkni'] as $skkni) : ?>
              <option value="<?= $skkni['skkni']; ?>"><?= $skkni['skkni']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-control w-full mt-4">
          <label class="label" for="Kedalaman">
            <span class="label-text text-lg font-semibold">Kedalaman Bukti yang Akan Diperoleh</span>
          </label>
          <select class="select select-bordered" id="Kedalaman" name="bukti-kedalaman">
            <option disabled selected>-- Pilih SKK/KKNI --</option>
            <option value="SKKNI Industri Modifikasi Kendaraan Bermotor">SKKNI Industri Modifikasi Kendaraan Bermotor</option>
            <option value="SKKNI Perakitan Telepon Seluler">SKKNI Perakitan Telepon Seluler</option>
            <option value="SKKNI Peralatan Elektronika">SKKNI Peralatan Elektronika</option>
            <option value="SKKNI Industri Cat">SKKNI Industri Cat</option>
            <option value="SKKNI Teknis Ototronik">SKKNI Teknis Ototronik</option>
          </select>
        </div>
      </div>
    </div>
    <button type="submit" name="submit" class="btn btn-info my-5 mt-8">Tambahkan</button>
  </form>
</div>