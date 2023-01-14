<!-- <h1 class="text-6xl">HALAMAN DASHBOARD ASESOR</h1> -->
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

function getAmountSkemaAsesor()
{
  $skema = new Asesor();
  $method = "countSkema";
  return call_user_func_array([$skema, $method], [])['jumlah'];
}

function getAmountAsesiByAsesor()
{
  $skema = new Asesor();
  $method = "countAsesi";
  return call_user_func_array([$skema, $method], [])['jumlah'];
}

function getAmountKompetensiByAsesor()
{
  $skema = new Asesor();
  $method = "countKompetensi";
  return call_user_func_array([$skema, $method], [])['jumlah'];
}

function getAmountKompetensi($id)
{
  $skema = new Skema();
  $method = "countKompetensi";
  return call_user_func_array([$skema, $method], [$id])['jumlah'];
}

function getAmountRegistered($id)
{
  $skema = new Skema();
  $method = "countRegistered";
  return call_user_func_array([$skema, $method], [$id])['jumlah'];
}



?>
<div class="comtainer-info w-full h-fit flex justify-between items-center mt-4 mb-10">
  <div class="box-1 w-[300px] f-fit px-3 py-2 rounded-lg bg-blue-500 text-white">
    <h1 class="text-lg font-bold">JADWAL ASESMEN</h1>
    <span class="text-base font-normal"><?= getAmountKompetensiByAsesor(); ?></span>
  </div>
  <div class="box-2 w-[300px] f-fit px-3 py-2 rounded-lg bg-blue-500 text-white">
    <h1 class="text-lg font-bold">SKEMA ASESMEN</h1>
    <span class="text-base font-normal"><?= getAmountSkemaAsesor(); ?></span>
  </div>
  <div class="box-2 w-[300px] f-fit px-3 py-2 rounded-lg bg-blue-500 text-white">
    <h1 class="text-lg font-bold">PESERTA ASESI</h1>
    <span class="text-base font-normal"><?= getAmountAsesiByAsesor(); ?></span>
  </div>
</div>

<div class="container-skema mt-20 text-center p-6 mb-12">
  <h1 class="text-3xl font-bold mb-6">Daftar Skema Saya</h1>
  <!-- <div class="list-skema w-full h-fit flex flex-wrap justify-between items-center">
    <div class="kotak1 bg-red-500 w-[400px] rounded-md p-6">
      <div class="title-skema w-full flex justify-between items-start">
        <div class="title">
          <p class="text-base">KKNI II</p>
          <h1 class="text-lg font-semibold">NAMA SKEMA</h1>
          <p class="text-base">LEVEL 1</p>
        </div>
        <div class="status">
          <h1 class="text-base font-semibold text-white uppercase">aktif</h1>
        </div>
      </div>
      <div class="kompetensi-syarat "></div>
    </div>
  </div>-->
  <table class="table table-zebra w-full">
    <!-- head -->
    <thead>
      <tr class="text-center text-5xl">
        <th>No.</th>
        <th>Nama Skema</th>
        <th>Jumlah Kompetensi</th>
        <th>Jumlah Asesi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      <?php $no = ($data['page'] - 1) * 2 + 1; ?>
      <?php if (count($data['list-skema-asesor']) > 0) : ?>
        <?php foreach ($data['list-skema-asesor'] as $ds) : ?>
          <tr>
            <td class="text-center"><?= $no++; ?></td>
            <?php $level = explode(" ", $ds['level']); ?>
            <td><?= $ds['nama_skema'] ?> <br>
              <?= makeCode(["KKNI " . end($level), $ds['id'], $ds['nama_skema']], "/"); ?></td>
            <td class="text-center"><?= getAmountKompetensi($ds['id']); ?> Unit Kompetensi</td>
            <td class="text-center"><?= getAmountRegistered($ds['id']); ?> Asesi</td>
            <td class="text-center flex items-center justify-around">
              <a href="<?= BASEURL ?>/asesor/info/<?= $ds['id'] ?>" class="btn btn-outline btn-info rounded-md mt-5">Info</a>
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

<div class="btn-group my-10">
  <a href="<?= BASEURL ?>/dashboard/asesor/<?= ($data['page'] == 1) ? 1 : $data['page'] - 1 ?>" class="btn">«</a>
  <button class="btn">Page <?= $data["page"] ?></button>
  <a href="<?= BASEURL ?>/dashboard/asesor/<?= $data['page'] + 1 ?>" class="btn">»</a>
</div>