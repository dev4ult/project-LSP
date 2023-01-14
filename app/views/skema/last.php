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

<div class="daftar-asesi w-[400px] mb-5">
  <h1 class="text-xl font-bold mt-8 mb-5 mr-5">Skema Terbaru</h1>
  <div class="asesi h-fit overflow-y-auto bg-gray-400 rounded-lg p-5">
    <?php if (isset($data['list-skema']) && count($data['list-skema']) > 0) : ?>
      <?php foreach ($data['list-skema'] as $ds) : ?>
        <div class="asesi-terdaftar w-full h-fit flex justify-start items-center px-3 mb-3">
          <div class="foto w-[50px] h-[50px] rounded-full bg-red-500"></div>
          <div class="data-asesi ml-5 flex flex-col justify-around">
            <span class="nama-asesi text-lg font-semibold"><?= $ds['nama_skema'] ?></span>
            <?php $level = explode(" ", $ds['level']); ?>
            <span class="nama-asesi text-sm font-normal"><?= makeCode(["KKNI " . end($level), $ds['id'], $ds['nama_skema']], "/"); ?></span>
            <a href="<?= BASEURL ?>/skema/detail/<?= $ds['id']; ?>" class="btn btn-info rounded-md mt-4">Lihat Skema Sertifikasi</a>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else : ?>
      <h1 class="text-lg">Belum asesi yang terdaftar</h1>
    <?php endif; ?>
  </div>
</div>