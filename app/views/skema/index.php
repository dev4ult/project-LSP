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

function getAmountRegistered($id) {
    $skema = new Skema();
    $method = "countRegistered";
    return call_user_func_array([$skema, $method], [$id])['jumlah'];
}

function getAmountAssessed($id) {
    $skema = new Skema();
    $method = "countAssessed";
    return call_user_func_array([$skema, $method], [$id])['jumlah'];
}

function getAmountPersyaratan($id) {
    $skema = new Skema();
    $method = "countPersyaratan";
    return call_user_func_array([$skema, $method], [$id])['jumlah'];
}

function getAmountKompetensi($id) {
    $skema = new Skema();
    $method = "countKompetensi";
    return call_user_func_array([$skema, $method], [$id])['jumlah'];
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
    <div class="px-8 w-full">
        <h1 class="text-3xl font-semibold mb-3 pt-14">List Skema Sertifikasi</h1>
        <?php require_once "../app/views/templates/breadcrumbs.php" ?>
        <div class="my-5">
            <?= Flasher::flash() ?>
        </div>
        <?php require_once "../app/views/skema/admin/form/add_skema.php" ?>
        <div class="flex justify-between mb-5">
            <div class="flex flex-wrap gap-5">
                <?php $index = 0 ?>
                <?php if (count($data['list-skema'])  == 0) : ?>
                <h2 class="text-3xl uppercase font-semibold bg-base-100 p-4 h-fit rounded-md shadow-md">DATA SKEMA TIDAK
                    ADA
                </h2>
                <?php endif ?>
                <?php foreach ($data['list-skema'] as $skema) : ?>
                <div
                    class="rounded-lg shadow-md bg-base-100 p-5 hover:-translate-y-1 transition-all min-w-[20rem] w-[30%] flex flex-col">
                    <div class="flex justify-between items-start gap-5">
                        <p><?= strlen($skema['skkni']) >= 20 ? substr($skema['skkni'], 0, 20) . '...' : $skema['skkni'] ?>
                        </p>
                        <div class="flex gap-2">
                            <p
                                class="font-semibold text-xs py-1 px-2 rounded-md <?= ($skema['status'] == 'Aktif') ? 'text-white bg-[#5E38BA]' : 'text-slate-400 bg-base-200' ?>">
                                <?= strtoupper($skema['status']) ?>
                            </p>
                            <p class="font-semibold text-xs py-1 px-2 rounded-md text-info bg-neutral">
                                <?= $skema['jurusan'] ?>
                            </p>
                        </div>
                    </div>
                    <h3 class="font-semibold text-2xl"><?= $skema['nama_skema'] ?></h3>
                    <p><?= strtoupper($skema['level']) ?></p>
                    <div class="flex gap-2 my-3">
                        <div class="dropdown dropdown-hover">
                            <label tabindex="<?= $index ?>"
                                class="font-semibold text-sm py-1 px-2 rounded-md text-info bg-[#EEF2FA] cursor-pointer">
                                <?= getAmountPersyaratan($skema['id']); ?>
                                Persyaratan</label>
                            <div tabindex="<?= $index ?>"
                                class="mt-1 dropdown-content bg-[#EEF2FA] p-2 text-sm rounded-md font-semibold text-info max-w-none w-72">
                                <p>Umum</p>
                                <ul class="list-disc pl-5 mb-1">
                                    <?php foreach ($data['lp-skema'] as $persyaratan) : ?>
                                    <?php if ($persyaratan['id_skema'] == $skema['id'] && $persyaratan['kategori'] == 'Umum') : ?>
                                    <li><?= $persyaratan['deskripsi'] ?></li>
                                    <?php endif ?>
                                    <?php endforeach; ?>
                                </ul>
                                <p>Teknis</p>
                                <ul class="list-disc pl-5">
                                    <?php foreach ($data['lp-skema'] as $persyaratan) : ?>
                                    <?php if ($persyaratan['id_skema'] == $skema['id'] && $persyaratan['kategori'] == 'Teknis') : ?>
                                    <li><?= $persyaratan['deskripsi'] ?></li>
                                    <?php endif ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="dropdown dropdown-hover">
                            <label tabindex="<?= $index ?>"
                                class="font-semibold text-sm py-1 px-2 rounded-md text-info bg-[#EEF2FA] cursor-pointer">
                                <?= getAmountKompetensi($skema['id']); ?> Unit
                                Kompetensi</label>
                            <div tabindex="<?= $index ?>"
                                class="mt-1 dropdown-content bg-[#EEF2FA] p-2 text-sm rounded-md font-semibold text-info w-52">
                                <ul class="list-disc pl-5">
                                    <?php foreach ($data['list-ukom'] as $ukom) : ?>
                                    <?php if ($ukom['id_skema'] == $skema['id']) : ?>
                                    <li><?= $ukom['nama_kompetensi'] ?></li>
                                    <?php endif ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <p class="text-sm mt-3 mb-2">Asesor - <?= $skema["asesor"] ?></p>
                    <div class="flex gap-3 mt-auto">
                        <a href="<?= BASEURL ?>/skema/detail/<?= $skema['id'] ?>"
                            class="bg-primary hover:bg-info px-1.5 py-1 text-white rounded-sm uppercase flex items-center gap-1">
                            <img src="<?= BASEURL ?>/img/info_white.svg" class="w-5" alt="info">
                            <span class="font-semibold">info</span></a>
                    </div>
                </div>
                <?php $index++ ?>
                <?php endforeach ?>
            </div>
            <div>
                <div class="bg-base-100 p-3 font-semibold rounded-lg w-32">
                    <p class="uppercase text-center">total skema <?= $data['total-skema'] ?></p>
                </div>
                <form action="<?= BASEURL ?>/skema/list" method="post" class="flex flex-col gap-3 mt-3">
                    <?php if ($data['user-type'] != "asesi") : ?>
                    <select class="select rounded-sm select-sm w-32" name="id-jurusan">
                        <option disabled selected>JURUSAN</option>
                        <?php foreach ($data['list-jurusan'] as $jurusan) : ?>
                        <option value="<?= $jurusan['id'] ?>"><?= $jurusan['singkatan'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php endif ?>
                    <select class="select rounded-sm select-sm w-32" name="level">
                        <option disabled selected>LEVEL</option>
                        <option value="Level I">I</option>
                        <option value="Level II">II</option>
                        <option value="Level III">III</option>
                        <option value="Level IV">IV</option>
                        <option value="Level V">V</option>
                    </select>
                    <select class="select rounded-sm select-sm w-32" name="status">
                        <option disabled selected>STATUS</option>
                        <option value="Aktif">AKTIF</option>
                        <option value="Nonaktif">NONAKTIF</option>
                    </select>
                    <button type="submit" name="kategori" class="btn btn-sm btn-ghost text-primary mt-3">set
                        kategori</button>
                </form>
            </div>
        </div>
    </div>

</div>