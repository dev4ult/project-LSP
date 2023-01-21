<?php
// var_dump($data['list-skema-asesi']);
function getAmountDokumen($id) {
  $skema = new Asesor();
  $method = "countDokumenAsesmen";
  return call_user_func_array([$skema, $method], [$id])['jumlah'];
}

function getAmountDokumenByAsesi($id) {
  $skema = new Asesor();
  $method = "countDokumenAsesmenByIdAsesi";
  return call_user_func_array([$skema, $method], [$id])['jumlah'];
}

function getStatusAsesmenByIDAsesi($idSkema, $idAsesi) {
  $skema = new Asesor();
  $method = "getStatusAsesmenAsesi";
  return call_user_func_array([$skema, $method], [$idSkema, $idAsesi]);
}

function getNilaiByIdAsesi($idAsesi) {
  $skema = new Asesor();
  $method = "getNilaiAsesi";
  return call_user_func_array([$skema, $method], [$idAsesi]);
}
?>

<a href="<?= BASEURL ?>/dashboard/asesor/" class="btn btn-outline btn-warning my-5">Back</a>

<h1 class="text-3xl text-center font-bold uppercase mb-8">DAFTAR ASESI</h1>

<div class="overflow-x-auto">
    <table class="table table-zebra w-full mb-8">
        <!-- head -->
        <thead>
            <tr class="text-center text-5xl">
                <th>No.</th>
                <th>Nama Asesi</th>
                <th>Jenis Kelamin</th>
                <th>Kelengkapan Dokumen Asesmen</th>
                <th>Status Asesmen</th>
                <th>Status Kelulusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- row 1 -->
            <?php $number = ($data['page'] - 1) * 5 + 1;
      $idAsesi = 0; ?>
            <?php if (count($data['list-skema-asesi']) > 0) : ?>
            <?php foreach ($data['list-skema-asesi'] as $ds) : ?>
            <tr>
                <td class="text-center"><?= $number++; ?></td>
                <td><?= $ds['nama']; ?></td>
                <td><?= $ds['jenis_kelamin']; ?></td>
                <td><?= getAmountDokumenByAsesi($ds['id_asesi']); ?> / <?= getAmountDokumen($ds['id_skema']); ?> Dokumen
                </td>
                <td><?= $ds['asesmen']; ?></td>
                <td><?= $ds['status_kelulusan']; ?></td>
                <td class="text-center flex items-center justify-around">
                    <a href="<?= BASEURL ?>/asesor/penilaian/<?= $ds['id_asesi'] ?>/<?= $ds['id_skema'] ?>"
                        class="btn btn-outline btn-info rounded-md mt-5">Beri Nilai</a>
                    <?php if (getStatusAsesmenByIDAsesi($ds['id_skema'], $ds['id_asesi']) == "Sudah") : ?>
                    <?php $idAsesi = $ds['id_asesi']; ?>
                    <?php $status = $ds['status_kelulusan']; ?>
                    <label for="my-modal-<?= $ds['id_asesi'] ?>"
                        class="btn btn-outline btn-success rounded-md mt-5">Info</label>
                    <input type="checkbox" id="my-modal-<?= $ds['id_asesi'] ?>" class="modal-toggle" />
                    <div class="modal">
                        <div class="modal-box w-[800px] max-w-[800px]">
                            <table class="table table-zebra w-full">
                                <!-- head -->
                                <thead>
                                    <tr class="text-center text-5xl">
                                        <th>No.</th>
                                        <th>Kompetensi</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- row 1 -->
                                    <?php $no = 1;
                        $notMatch = true; ?>
                                    <?php foreach ($data['list-kompetensi'] as $ds) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td class="text-center"><?= $ds['nama_kompetensi'] ?></td>
                                        <?php foreach (getNilaiByIdAsesi($idAsesi) as $na) : ?>
                                        <?php var_dump($na) ?>

                                        <?php $notMatch = true; ?>
                                        <?php if ($na['id'] == $ds['id']) : ?>
                                        <td class="text-center"><?= $na['nilai']; ?></td>
                                        <?php $notMatch = false;
                                break; ?>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php if ($notMatch) : ?>
                                        <td class="text-center">Belum ada nilai</td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <?php if ($status == "Belum Lulus") : ?>
                            <a href="<?= BASEURL ?>/asesor/update_status/<?= $idAsesi ?>/<?= $ds['id_skema'] ?>/1"
                                class="btn btn-success rounded-md mt-5">Lulus</a>
                            <?php else : ?>
                            <a href="<?= BASEURL ?>/asesor/update_status/<?= $idAsesi ?>/<?= $ds['id_skema'] ?>/0"
                                class="btn btn-warning rounded-md mt-5">Tidak Lulus</a>
                            <?php endif; ?>
                            <div class="modal-action">
                                <label for="my-modal-<?= $idAsesi ?>" class="btn">Tutup</label>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </td>
            </tr>

            <!-- Put this part before </body> tag -->

            <?php endforeach; ?>
            <?php else : ?>
            <tr>
                <td>
                    <h1 class="text-lg">Belum ada Asesi Terdaftar</h1>
                </td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<div class="btn-group my-10">
    <a href="<?= BASEURL ?>/asesor/info/<?= $data['id-skema'] ?>/<?= ($data['page'] == 1) ? 1 : $data['page'] - 1 ?>"
        class="btn">«</a>
    <button class="btn">Page <?= $data["page"] ?></button>
    <a href="<?= BASEURL ?>/asesor/info/<?= $data['id-skema'] ?>/<?= $data['page'] + 1 ?>" class="btn">»</a>
</div>