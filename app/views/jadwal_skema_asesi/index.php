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
        <div class="my-5">
            <?= Flasher::flash() ?>
        </div>
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
                <?php $no = ($data['page'] - 1) * 5 + 1;
                foreach ($data['jadwal'] as $jadwal) :
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $jadwal['nama_kompetensi'] ?></td>
                    <td>
                        <?php $level = explode(" ", $jadwal['level']); ?>

                        <?= makeCode(["KKNI " . end($level), $jadwal['id_skema'], $jadwal['nama_skema']], "/"); ?>
                    </td>
                    <td><?= $jadwal['nama_skema'] ?></td>
                    <td>
                        <span
                            class="<?= $jadwal['jenis_pelaksanaan'] == "Offline" ? "bg-accent/50 text-black/50" : "bg-neutral text-primary" ?> text-sm font-semibold px-3 py-2 rounded-md uppercase"><?= $jadwal['jenis_pelaksanaan'] ?></span>
                    </td>
                    <td class="flex gap-3 items-center">
                        <label for="my-modal-<?= $jadwal['id'] ?>"
                            class="bg-primary hover:bg-info px-1.5 py-1 text-white rounded-sm uppercase flex items-center gap-1 cursor-pointer">
                            <img src="<?= BASEURL ?>/img/info_white.svg" class="w-5" alt="info">
                            <span class="font-semibold">info</span></label>
                        <?php
                            if ($this->model('Unit_kompetensi_model')->checkUnitUpload($jadwal['id']) > 0) {
                                $btn_name = 'Jawaban Terkirim';
                            } else {
                                $btn_name = 'Unggah Jawaban';
                            } ?>
                        <?php if ($jadwal['jenis_pelaksanaan'] == "Online") : ?>
                        <?php if ($btn_name == 'Unggah Jawaban') : ?>
                        <a href="<?= BASEURL; ?>/asesi/form_upload_ujian/<?= $jadwal['id']; ?>"
                            class="btn btn-sm btn-secondary rounded-sm text-white ">
                            <?= $btn_name ?>
                        </a>
                        <?php else : ?>
                        <button class="btn btn-sm btn-accent text-black/50 rounded-sm ">
                            <?= $btn_name ?>
                        </button>
                        <?php endif; ?>
                        <?php endif; ?>
                    </td>
                </tr>
                <!-- Put this part before </body> tag -->
                <input type="checkbox" id="my-modal-<?= $jadwal['id'] ?>" class="modal-toggle" />
                <div class="modal bg-[#EDF4F8]/50">
                    <div class="modal-box">
                        <div class="pelaksanaan-waktu w-fit flex items-center gap-3">
                            <p class="text-sm p-1 px-2 bg-blue-100 rounded-md text-info uppercase font-semibold">
                                <?= $jadwal['jenis_pelaksanaan'] ?></p>
                            <p class="text-sm p-1 px-2 bg-blue-100 rounded-md text-info uppercase font-semibold">
                                <?= $jadwal['tanggal'] ?></p>
                        </div>
                        <h3 class="font-semibold text-2xl mt-4 mb-1"><?= $jadwal['nama_kompetensi'] ?></h3>
                        <p class="font-normal text-lg uppercase">
                            <?= makeCode(["KKNI " . end($level), $jadwal['id_skema'], $jadwal['nama_skema']], " / "); ?>
                        </p>
                        <p class="text-sm my-2">Asesmen dilaksanakan di <?= $jadwal['tempat_unit_kompetensi']; ?>,
                            <br>pada jam
                            <?= $jadwal['jam_mulai']; ?> - <?= $jadwal['jam_akhir']; ?>
                        </p>

                        <div class="modal-action">
                            <label for="my-modal-<?= $jadwal['id'] ?>"
                                class="btn btn-circle btn-outline absolute top-6 right-5 btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </label>
                        </div>

                        <a href="<?= BASEURL ?>/skema/detail/<?= $jadwal['id_skema']; ?>"
                            class="btn rounded-sm mt-5 btn-secondary text-white">Lihat Skema Sertifikasi</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php require_once "../app/views/templates/pagination_bottom.php" ?>
    </div>

</div>
<script src="<?= BASEURL ?>/js/sidebar.js"></script>