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

function getAmountRegistered($id)
{
  $skema = new Skema();
  $method = "countRegistered";
  return call_user_func_array([$skema, $method], [$id])['jumlah'];
}

function getAmountAssessed($id)
{
  $skema = new Skema();
  $method = "countAssessed";
  return call_user_func_array([$skema, $method], [$id])['jumlah'];
}

?>

<!-- Button Tambah dan Search -->
<div class="manageSkema w-full flex justify-between items-center my-6">
  <a href="<?= BASEURL ?>/skema/create/" class="btn btn-outline btn-warning">Tambah skema</a>
  <form action="<?= BASEURL ?>/skema/index" method="post">
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



<!-- Tabel -->
<div class="overflow-x-auto">
  <table class="table table-zebra w-full">
    <!-- head -->
    <thead>
      <tr class="text-center text-5xl">
        <th>No.</th>
        <th>Kode Skema</th>
        <th>Nama Skema</th>
        <th>SKK/KKNI</th>
        <th>Status</th>
        <th>Persyaratan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      <?php $no = ($data['page'] - 1) * 5 + 1; ?>
      <?php if (count($data['list-skema']) > 0) : ?>
        <?php foreach ($data['list-skema'] as $ds) : ?>
          <tr>
            <td><?= $no++; ?></td>
            <?php $level = explode(" ", $ds['level']); ?>
            <td><?= makeCode(["KKNI " . end($level), $ds['id'], $ds['nama_skema']], "/"); ?></td>
            <td>
              <?= $ds['level']; ?> pada kompetensi <?= $ds['nama_skema']; ?>
              <ul class="list-inside list-disc relative translate-x-4">
                <li><span>10</span> Unit Kompetensi</li>
                <li><span><?= getAmountRegistered($ds['id']); ?></span> Asesi Terdaftar</li>
                <li><span><?= getAmountAssessed($ds['id']); ?></span> Asesi telah Asesmen Mandiri (APL-02)</li>
              </ul>
            </td>
            <td><?= $ds['skkni']; ?></td>
            <td class="text-center"><?= $ds['status']; ?></td>
            <td class="text-center">
              <span class="block font-bold">(3) Persyaratan</span>
              <a href="#" class="btn btn-success rounded-md mt-5">Ubah Persyaratan</a>
            </td>
            <td class="text-center flex flex-col items-center justify-between">
              <?php if ($ds['status'] == "Aktif") : ?>
                <a href="<?= BASEURL ?>/skema/status/<?= $ds['id'] ?>/<?= $ds['status'] ?>" class="btn btn-outline btn-warning rounded-md">Nonaktifkan</a>
              <?php else : ?>
                <a href="<?= BASEURL ?>/skema/status/<?= $ds['id'] ?>/<?= $ds['status'] ?>" class="btn btn-outline btn-warning rounded-md">Aktifkan</a>
              <?php endif; ?>
              <a href="<?= BASEURL ?>/skema/detail/<?= $ds['id'] ?>" class="btn btn-outline btn-info rounded-md mt-5">Ubah/Perbarui</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else : ?>
        <tr>
          <td>
            <h1 class="text-lg">Tidak ada baris</h1>
          </td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<!-- Pagination -->
<div class="btn-group my-10">
  <a href="<?= BASEURL ?>/skema/index/<?= ($data['page'] == 1) ? 1 : $data['page'] - 1 ?>" class="btn">«</a>
  <button class="btn">Page <?= $data["page"] ?></button>
  <a href="<?= BASEURL ?>/skema/index/<?= $data['page'] + 1 ?>" class="btn">»</a>
</div>