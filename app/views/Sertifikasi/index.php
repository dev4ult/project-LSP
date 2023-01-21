<?php
function codeSchemaGenerate($arr, $delimiter) {
    $part1 = explode(" ", end($arr));
    $result = "";

    foreach ($part1 as $p1) {
        $result .= substr($p1, 0, strlen($p1));
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

<div class="w-full min-h-screen flex">
    <div class="pt-14 pr-8 px-12">
        <button type="button" id="hamburger" class="text-primary">
            <!-- hamburger icon -->
            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
                <path d="M64,384H448V341.33H64Zm0-106.67H448V234.67H64ZM64,128v42.67H448V128Z" />
            </svg>
        </button>
    </div>
    <div class="px-8 w-full pb-5">
        <h1 class="text-3xl font-semibold mb-3 pt-14">Terbit Sertifikat</h1>
        <?php require_once "../app/views/templates/breadcrumbs.php" ?>
        <div class="my-5">
            <?= Flasher::flash() ?>
        </div>
        <table class="table rounded-xs shadow-md">
            <thead>
                <tr>
                    <th class="bg-base-100"></th>
                    <th class="bg-base-100">Nama Kompetensi</th>
                    <th class="bg-base-100"></th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data['skema-asesi'] as $skema) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td>
                        <ul>
                            <li class="font-bold">
                                <?= codeSchemaGenerate(["KKNI II", $skema['id'], $skema['nama_skema']], "/"); ?>
                            </li>
                            <li><?= $skema['nama_skema'] ?></li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li class="font-bold">
                                <a href="<?= BASEURL ?>/asesi/download_sertif/<?= $skema['id'] ?>"
                                    class="btn btn-primary text-white rounded-sm mb-4">
                                    Unduh Sertifikat
                                </a>
                            </li>

                        </ul>
                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

    </div>
</div>
<script src="<?= BASEURL ?>/js/sidebar.js"></script>

<section class="sertifikasi-asesi">

    <div class="list-schedule mt-6">

        <div class="overflow-x-auto mb-5">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Skema Sertifikasi</th>
                        <th>Nomor Sertifikat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = ($data['page'] - 1) * 5 + 1;
                    foreach ($data['skema-asesi'] as $skema) :
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td>
                            <ul>
                                <li class="font-bold">
                                    <?= codeSchemaGenerate(["KKNI II", $skema['id'], $skema['nama_skema']], "/"); ?>
                                </li>
                                <li><?= $skema['nama_skema'] ?></li>
                            </ul>
                        </td>
                        <td>
                            <ul>
                                <li class="font-bold">
                                    <a href="<?= BASEURL ?>/asesi/DownloadSertif/<?= $skema['id'] ?>"
                                        class="btn btn-sm btn-success mb-4">
                                        Unduh Sertifikat
                                    </a>
                                </li>

                            </ul>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= Flasher::flash() ?>
        </div>
    </div>
</section>