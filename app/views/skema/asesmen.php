<?php
function makeCode($arr, $delimiter)
{
  $part1 = explode(" ", end($arr));
  $result = "";

  foreach ($part1 as $p1) {
    $result .= substr($p1, 0, 1);
  }

  $arr[count($arr) - 1] = $result;
  $result = "";

  for ($i = 0; $i < count($arr); $i++) {
    $result .= $arr[$i];
    if ($i < count($arr) - 1) {
      $result .= $delimiter;
    }
  }

  return $result;
}
?>
<div class="manageSkema w-full flex flex-col items-end my-6">
  <!-- <a href="<?= BASEURL ?>/skema/create/" class="btn btn-outline btn-warning">Tambah skema</a> -->
  <form action="<?= BASEURL ?>/skema/asesmen" method="post">
    <div class="form-control flex items-center">
      <div class="input-group">
        <input type="text" placeholder="Search…" class="input input-bordered" name="keyword" />
        <button class="btn btn-square" type="submit" name="search">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </button>
      </div>
    </div>
  </form>
</div>
<div class="overflow-x-auto">
  <table class="table table-zebra w-full">
    <!-- head -->
    <thead>
      <tr class="text-center text-5xl">
        <th>No.</th>
        <th>Kegiatan Asesmen</th>
        <th>Kode Skema</th>
        <th>Nama Skema</th>
        <th>Jenis Pelaksanaan</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      <?php $no = ($data['page'] - 1) * 5 + 1; ?>
      <?php if (count($data['list-kompetensi']) > 0) : ?>
        <?php foreach ($data['list-kompetensi'] as $ds) : ?>
          <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td class="text-center"><?= $ds['nama_kompetensi'] ?></td>
            <?php $level = explode(" ", $ds['level']); ?>
            <td class="text-center"><?= makeCode(["KKNI " . end($level), $ds['id_skema'], $ds['nama_skema']], "/"); ?></td>
            <td class="text-center"><?= $ds['nama_skema'] ?></td>
            <td class="text-center"><span class=" bg-green-400 text-blue-700 font-semibold px-3 py-2 rounded-md uppercase"><?= $ds['jenis_pelaksanaan'] ?></span></td>
            <td class="text-center flex items-center justify-around">
              <label for="my-modal-<?= $ds['id_kompetensi'] ?>" class="btn btn-outline btn-info rounded-md mt-5">Info</label>
            </td>
          </tr>
          <!-- Put this part before </body> tag -->
          <input type="checkbox" id="my-modal-<?= $ds['id_kompetensi'] ?>" class="modal-toggle" />
          <div class="modal">
            <div class="modal-box w-[800px] max-w-[800px]">
              <div class="pelaksanaan-waktu w-fit flex justify-between items-center">
                <span class="text-base p-1 px-2 bg-blue-500 rounded-md text-white"><?= $ds['jenis_pelaksanaan'] ?></span>
                <span class="text-base p-1 px-2 bg-blue-500 rounded-md text-white ml-3"><?= $ds['tanggal'] ?></span>
              </div>
              <h3 class="font-semibold text-2xl mt-4 mb-1"><?= $ds['nama_kompetensi'] ?></h3>
              <span class="font-normal text-sm"><?= makeCode(["KKNI " . end($level), $ds['id_skema'], $ds['nama_skema']], "/"); ?></span>
              <p class="text-sm my-2">Asesmen dilaksanakan di <?= $ds['tempat']; ?>, <br>pada jam <?= $ds['jam_mulai']; ?> - <?= $ds['jam_akhir']; ?></p>
              <a href="<?= BASEURL ?>/skema/detail/<?= $ds['id_skema']; ?>" class="btn btn-info rounded-md mt-5 ">Lihat Skema Sertifikasi</a>
              <div class="modal-action">
                <label for="my-modal-<?= $ds['id_kompetensi'] ?>" class="btn">Tutup</label>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
        <tr>
          <td>
            <h1 class="text-lg">Belum ada kompetensi</h1>
          </td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>


<!-- Pagination -->
<div class="btn-group my-10">
  <a href="<?= BASEURL ?>/skema/asesmen/<?= ($data['page'] == 1) ? 1 : $data['page'] - 1 ?>" class="btn">«</a>
  <button class="btn">Page <?= $data["page"] ?></button>
  <a href="<?= BASEURL ?>/skema/asesmen/<?= $data['page'] + 1 ?>" class="btn">»</a>
</div>