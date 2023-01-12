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
            <td class="text-center"><?= makeCode(["KKNI " . end($level), $ds['id'], $ds['nama_skema']], "/"); ?></td>
            <td class="text-center"><?= $ds['nama_skema'] ?></td>
            <td class="text-center"><?= $ds['jenis_pelaksanaan'] ?></td>
            <td class="text-center flex items-center justify-around">
              <a href="<?= BASEURL ?>/skema/edit_kompetensi/<?= $ds['id'] ?>/<?= $ds['nama_skema'] ?>/<?= $ds['level'] ?>" class="btn btn-outline btn-info rounded-md mt-5">Info</a>
            </td>
          </tr>
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

<!-- Put this part before </body> tag -->
<input type="checkbox" id="my-modal-6" class="modal-toggle" />
<div class="modal">
  <div class="modal-box w-[800px] max-w-[800px]">
    <h3 class="font-bold text-lg">Persyaratan Skema Sertifikasi</h3>
    <div class="group-input-persyaratan w-full flex justify-between">
      <div class="list-umum w-1/2">
        <h1 class="text-lg font-semibold mt-5 mb-3">Kategori Umum</h1>
        <ul class="list-inside input-umum w-full list-disc relative translate-x-4">
        </ul>
      </div>
      <div class="list-teknis w-1/2">
        <h1 class="text-lg font-semibold mt-5 mb-3">Kategori Teknis</h1>
        <ul class="list-inside input-teknis w-full list-disc relative translate-x-4">
        </ul>
      </div>
    </div>
    <div class="modal-action">
      <label for="my-modal-6" class="btn">Tutup</label>
    </div>
  </div>
</div>