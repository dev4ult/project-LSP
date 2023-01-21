<?php
function getNilaiByIdAsesi($idAsesi) {
    $skema = new Asesor();
    $method = "getNilaiAsesi";
    return call_user_func_array([$skema, $method], [$idAsesi]);
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
        <h1 class="text-3xl font-semibold mb-3">Detail Skema Sertifikasi</h1>
        <?php require_once "../app/views/templates/breadcrumbs.php" ?>
        <div class="my-5">
            <?= Flasher::flash(); ?>
        </div>
        <div class="my-3">
            <div class="w-full">
                <div class="bg-base-100 rounded-2xl shadow-md transition-all hover:-translate-y-1 p-10 ">
                    <h2 class="text-3xl font-semibold mb-5">Detail Sertifikasi</h2>
                    <div class="grid grid-flow-row grid-cols-2 gap-5">
                        <div>
                            <span>Nama Skema</span>
                            <h3 class="font-medium text-xl underline-offset-8 underline"><?= $data['nama-skema'] ?>
                            </h3>
                        </div>
                        <div>
                            <span>Level KKNI</span>
                            <h3 class="font-medium text-xl underline-offset-8 underline"><?= $data['level-skema'] ?>
                            </h3>
                        </div>
                        <div>
                            <span>Asesor</span>
                            <h3 class="font-medium text-xl underline-offset-8 underline"><?= $data['asesor-skema'] ?>
                            </h3>
                        </div>
                        <div>
                            <span>SKK/KKNI LSP</span>
                            <h3 class="font-medium text-xl underline-offset-8 underline"><?= $data['skkni-skema'] ?>
                            </h3>
                        </div>
                        <div>
                            <span>Jurusan</span>
                            <h3 class="font-medium text-xl underline-offset-8 underline"><?= $data['jurusan-skema'] ?>
                            </h3>
                        </div>
                        <div>
                            <span>Status</span>
                            <h3
                                class="font-semibold text-lg w-fit px-2 rounded-lg <?= ($data['status-skema'] == 'Aktif') ? 'text-white bg-[#5E38BA]' : 'text-slate-400 bg-base-200' ?>">
                                <?= $data['status-skema'] ?></h3>
                        </div>
                    </div>
                    <h2 class="text-3xl font-semibold mb-5 mt-10">Persyaratan Skema</h2>
                    <div class="grid grid-flow-row grid-cols-2 gap-5">
                        <div>
                            <span>Teknis</span>
                            <ul class="list-disc font-medium ml-5 text-lg">
                                <?php foreach ($data['persyaratan-skema'] as $ps) : ?>
                                <?php if ($ps['kategori'] == "Teknis") : ?>
                                <li><?= $ps['deskripsi'] ?></li>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div>
                            <span>Umum</span>
                            <ul class="list-disc font-medium ml-5 text-lg">
                                <?php foreach ($data['persyaratan-skema'] as $ps) : ?>
                                <?php if ($ps['kategori'] == "Umum") : ?>
                                <li><?= $ps['deskripsi'] ?></li>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class=" w-full mt-4 flex gap-5 items-start">
                    <div class="">
                        <h1 class="inline-block text-xl font-bold mt-8 mb-5 mr-5 ">Unit Kompetensi Skema</h1>
                        <table class="table w-full rounded-xs shadow-lg">
                            <thead>
                                <tr>
                                    <th class="bg-base-100"></th>
                                    <th class="bg-base-100">Nama Kompetensi</th>
                                    <th class="bg-base-100"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php if (count($data['list-kompetensi']) > 0) : ?>
                                <?php foreach ($data['list-kompetensi'] as $ds) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $ds['nama_kompetensi'] ?></td>
                                    <td></td>
                                </tr>

                                <?php endforeach; ?>
                                <?php else : ?>
                                <tr>
                                    <td></td>
                                    <td>
                                        <h1 class="text-lg">Belum ada kompetensi</h1>
                                    </td>
                                    <td></td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="daftar-asesi flex-grow flex-shrink-0">
                        <h1 class="text-xl font-bold mt-8 mb-5 mr-5 text-right w-fit">Asesi Terdaftar</h1>
                        <div class="asesi max-h-60 overflow-y-auto bg-base-100 shadow-md rounded-lg p-5">
                            <?php if (isset($data['list-asesi']) && count($data['list-asesi']) > 0) : ?>
                            <?php foreach ($data['list-asesi'] as $ds) : ?>
                            <div class="asesi-terdaftar px-3">
                                <ul class="data-asesi list-disc">
                                    <li class="flex justify-between items-center  ml-5">
                                        <p><?= $ds['nama'] ?></p>
                                        <div class="flex gap-2">
                                            <label for="my-modal-<?= $ds['id'] ?>"
                                                class="btn btn-sm btn-primary rounded-sm text-white">cek</label>
                                            <a href="<?= BASEURL ?>/asesor/penilaian/<?= $ds['id'] ?>/<?= $data['id-skema'] ?>"
                                                class="btn btn-sm rounded-sm btn-secondary text-white">beri
                                                nilai</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <input type="checkbox" id="my-modal-<?= $ds['id'] ?>" class="modal-toggle" />
                            <div class="modal bg-[#EDF4F8]/50">
                                <div class="modal-box ">
                                    <h2 class="text-2xl font-semibold mb-3">Nilai Asesi</h2>
                                    <table class="table w-full">
                                        <thead>
                                            <tr>
                                                <th class="bg-base-100">Kompetensi</th>
                                                <th class="bg-base-100">Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $notMatch = true; ?>
                                            <?php foreach (getNilaiByIdAsesi($ds['id']) as $na) : ?>
                                            <tr>
                                                <td><?= $na['nama_kompetensi'] ?></td>
                                                <?php if ($na['nilai'] != null) : ?>
                                                <td><?= $na['nilai'] ?></td>
                                                <?php else : ?>
                                                <td>Belum ada nilai</td>
                                                <?php endif; ?>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <?php $status = $ds['status_kelulusan'] ?>
                                    <div class="mt-5 text-right">
                                        <?php if ($status == "Belum Lulus") : ?>
                                        <a href="<?= BASEURL ?>/asesor/update_status/<?= $ds['id'] ?>/<?= $data['id-skema'] ?>/1"
                                            class="btn btn-primary text-white rounded-sm">Lulus</a>
                                        <?php else : ?>
                                        <a href="<?= BASEURL ?>/asesor/update_status/<?= $ds['id'] ?>/<?= $data['id-skema'] ?>/0"
                                            class="btn btn-accent text-black rounded-sm">Tidak Lulus</a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="modal-action">
                                        <label for="my-modal-<?= $ds['id']  ?>"
                                            class="btn btn-circle btn-outline absolute top-6 right-5 btn-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <?php else : ?>
                            <h1 class="text-lg">Belum ada asesi yang terdaftar</h1>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>