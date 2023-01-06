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

<a href="" class="block mt-10 btn btn-outline btn-warning">Tambah skema</a>
<div class="overflow-x-auto mt-4">
  <table class="table table-zebra w-full">
    <!-- head -->
    <thead>
      <tr class="text-center text-5xl">
        <th>No.</th>
        <th>Kode Skema</th>
        <th>Nama Skema</th>
        <th>SKK/KKNI</th>
        <th>Persyaratan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      <?php $no = ($data['page'] - 1) * 5 + 1; ?>
      <?php foreach ($data['list-skema'] as $ds) : ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= makeCode(["KKNI II", $ds['id'], $ds['nama_skema']], "/"); ?></td>
          <td><?= $ds['nama_skema']; ?></td>
          <td><?= $ds['skkni']; ?></td>
          <td class="text-center">
            <span class="block font-bold">(3) Persyaratan</span>
            <br>
            <a href="#" class="btn btn-success">Ubah Persyaratan</a>
          </td>
          <td class="text-center">
            <a href="#" class="btn btn-warning">Nonaktifkan</a>
            <br>
            <br>
            <a href="#" class="btn btn-info">Ubah/Perbarui</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<div class="btn-group mt-10">
  <a href="<?= BASEURL ?>/skema/index/<?= ($data['page'] == 1) ? 1 : $data['page'] - 1 ?>" class="btn">«</a>
  <button class="btn">Page <?= $data["page"] ?></button>
  <a href="<?= BASEURL ?>/skema/index/<?= $data['page'] + 1 ?>" class="btn">»</a>
</div>