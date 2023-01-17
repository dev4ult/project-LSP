<?php
function makeCode($arr, $delimiter) {
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

<div class="min-h-screen w-full flex">
    <div class="pt-14 pr-8 px-12">
        <button type="button" id="hamburger" class="text-primary">
            <!-- hamburger icon -->
            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
                <path d="M64,384H448V341.33H64Zm0-106.67H448V234.67H64ZM64,128v42.67H448V128Z" />
            </svg>
        </button>
    </div>
    <div class="p-8 pt-14">
        <h1 class="text-3xl font-semibold mb-3">Jadwal Asesmen</h1>
        <?php require_once "../app/views/templates/breadcrumbs.php" ?>
        <table class="table w-full rounded-xs shadow-lg mt-3">
            <thead>
                <tr>
                    <th class="bg-base-100"></th>
                    <th class="bg-base-100">Kegiatan Asesmen</th>
                    <th class="bg-base-100">Kode Skema</th>
                    <th class="bg-base-100">Nama Skema</th>
                    <th class="bg-base-100">Jenis Pelaksanaan</th>
                    <th class="bg-base-100"></th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                <?php $no = ($data['page'] - 1) * 5 + 1; ?>
                <?php if (count($data['list-kompetensi']) > 0) : ?>
                <?php foreach ($data['list-kompetensi'] as $ds) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $ds['nama_kompetensi'] ?></td>
                    <?php $level = explode(" ", $ds['level']); ?>
                    <td>
                        <?= makeCode(["KKNI " . end($level), $ds['id_skema'], $ds['nama_skema']], "/"); ?></td>
                    <td><?= $ds['nama_skema'] ?></td>
                    <td><span
                            class="<?= $ds['jenis_pelaksanaan'] == "Offline" ? "bg-accent/50 text-black/50" : "bg-neutral text-primary" ?> text-sm font-semibold px-3 py-2 rounded-md uppercase"><?= $ds['jenis_pelaksanaan'] ?></span>
                    </td>
                    <td class="text-center flex items-center justify-around">
                        <label for="my-modal-<?= $ds['id_kompetensi'] ?>"
                            class="bg-primary hover:bg-info px-1.5 py-1 text-white rounded-sm uppercase flex items-center gap-1 cursor-pointer">
                            <img src="<?= BASEURL ?>/img/info_white.svg" class="w-5" alt="info">
                            <span class="font-semibold">info</span></label>
                    </td>
                </tr>
                <!-- Put this part before </body> tag -->
                <input type="checkbox" id="my-modal-<?= $ds['id_kompetensi'] ?>" class="modal-toggle" />
                <div class="modal bg-[#EDF4F8]/50">
                    <div class="modal-box">
                        <div class="pelaksanaan-waktu w-fit flex items-center gap-3">
                            <p class="text-sm p-1 px-2 bg-blue-100 rounded-md text-info uppercase font-semibold">
                                <?= $ds['jenis_pelaksanaan'] ?></p>
                            <p class="text-sm p-1 px-2 bg-blue-100 rounded-md text-info uppercase font-semibold">
                                <?= $ds['tanggal'] ?></p>
                        </div>
                        <h3 class="font-semibold text-2xl mt-4 mb-1"><?= $ds['nama_kompetensi'] ?></h3>
                        <p class="font-normal text-lg uppercase">
                            <?= makeCode(["KKNI " . end($level), $ds['id_skema'], $ds['nama_skema']], " / "); ?></p>
                        <p class="text-sm my-2">Asesmen dilaksanakan di <?= $ds['tempat']; ?>, <br>pada jam
                            <?= $ds['jam_mulai']; ?> - <?= $ds['jam_akhir']; ?></p>

                        <div class="modal-action">
                            <label for="my-modal-<?= $ds['id_kompetensi'] ?>"
                                class="btn btn-circle btn-outline absolute top-6 right-5 btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </label>
                        </div>
                        <a href="<?= BASEURL ?>/skema/detail/<?= $ds['id_skema']; ?>"
                            class="btn rounded-sm mt-5 btn-sm btn-secondary text-white">Lihat Skema Sertifikasi</a>
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
        <?php require_once "../app/views/templates/pagination_bottom.php" ?>
    </div>

</div>
<script src="<?= BASEURL ?>/js/sidebar.js"></script>

<div class="manageSkema w-full flex flex-col items-end my-6">
    <!-- <a href="<?= BASEURL ?>/skema/create/" class="btn btn-outline btn-warning">Tambah skema</a> -->
    <form action="<?= BASEURL ?>/skema/asesmen" method="post">
        <div class="form-control flex items-center">
            <div class="input-group">
                <input type="text" placeholder="Search…" class="input input-bordered" name="keyword" />
                <button class="btn btn-square" type="submit" name="search">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
        </div>
    </form>
</div>