<div class="min-h-screen w-full flex">
    <div class="pt-14 pr-8 px-12">
        <button type="button" id="hamburger" class="text-primary">
            <!-- hamburger icon -->
            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
                <path d="M64,384H448V341.33H64Zm0-106.67H448V234.67H64ZM64,128v42.67H448V128Z" />
            </svg>
        </button>
    </div>
    <form action="<?= BASEURL ?>/asesor/add_penilaian/<?= $data['id-skema'] ?>/<?= $data['id-asesi'] ?>" method="post"
        class="p-8 pt-14">
        <h1 class="text-3xl font-semibold mb-3">Penilaian Asesi</h1>
        <?php require_once "../app/views/templates/breadcrumbs.php" ?>
        <table class="table w-full rounded-xs shadow-lg mt-3">
            <thead>
                <tr>
                    <th class="bg-base-100"></th>
                    <th class="bg-base-100">Nama Kompetensi</th>
                    <th class="bg-base-100">Tanggal Ujian</th>
                    <th class="bg-base-100">File Soal</th>
                    <th class="bg-base-100">Jawaban Asesi</th>
                    <th class="bg-base-100"></th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                <?php $no = 1; ?>
                <?php $file = ""; ?>
                <?php $notMatch = true; ?>
                <?php if (count($data['list-kompetensi']) > 0) : ?>
                <?php foreach ($data['list-kompetensi'] as $ds) : ?>

                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $ds['nama_kompetensi']; ?></td>
                    <td><?= $ds['tgl_ujian_kompetensi']; ?></td>
                    <?php if ($ds['file_opsional'] != null) : ?>
                    <td><?= $ds['file_opsional']; ?></td>
                    <?php else : ?>
                    <td>Tidak ada file soal</td>
                    <?php endif; ?>
                    <?php if (count($data['list-dokumen-asesi']) > 0) : ?>
                    <?php foreach ($data['list-dokumen-asesi'] as $dd) : ?>
                    <?php $notMatch = true; ?>
                    <?php if ($dd['id'] == $ds['id']) : ?>
                    <td><?= $dd['file']; ?></td>
                    <?php $notMatch = false;
                                        break; ?>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if (count($data['list-dokumen-asesi']) == 0 || ($notMatch == true)) : ?>
                    <td>Tidak file jawaban</td>
                    <?php endif; ?>
                    <td class="text-center flex items-center justify-around">
                        <?php if (isset($data['nilai-asesi'])) : ?>
                        <?php foreach ($data['nilai-asesi'] as $na) : ?>
                        <?php $notMatch = true; ?>
                        <?php if ($na['id'] == $ds['id']) : ?>
                        <select class="select select-bordered" id="nilai" name="nilai[]">
                            <?php if ($na['nilai'] == null) : ?>
                            <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/NULL" selected>-- Pilih Nilai --
                            </option>
                            <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/A">A</option>
                            <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/B">B</option>
                            <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/C">C</option>
                            <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/D">D</option>
                            <?php else : ?>
                            <option disabled>-- Pilih Nilai --</option>
                            <?php if ($na['nilai'] == "A") : ?>
                            <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/A" selected>A</option>
                            <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/B">B</option>
                            <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/C">C</option>
                            <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/D">D</option>
                            <?php endif ?>
                            <?php if ($na['nilai'] == "B") : ?>
                            <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/A">A</option>
                            <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/B" selected>B</option>
                            <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/C">C</option>
                            <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/D">D</option>
                            <?php endif ?>
                            <?php if ($na['nilai'] == "C") : ?>
                            <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/A">A</option>
                            <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/B">B</option>
                            <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/C" selected>C</option>
                            <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/D">D</option>
                            <?php endif ?>
                            <?php if ($na['nilai'] == "D") : ?>
                            <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/A">A</option>
                            <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/B">B</option>
                            <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/C">C</option>
                            <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/D" selected>D</option>
                            <?php endif ?>
                            <?php endif; ?>
                        </select>
                        <?php $notMatch = false;
                                            break; ?>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if (!isset($data['nilai-asesi']) || $notMatch) : ?>
                        <select class="select select-bordered rounded-sm" id="nilai" name="nilai[]">
                            <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/NULL" selected>-- Pilih Nilai --
                            </option>
                            <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/A">A</option>
                            <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/B">B</option>
                            <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/C">C</option>
                            <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/D">D</option>
                        </select>
                        <?php endif; ?>
                    </td>
                </tr>
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
        <div class="text-right">
            <button type="submit" class="btn btn-primary rounded-sm text-white mt-5">simpan
                penilaian</button>
        </div>
    </form>
</div>
<script src="<?= BASEURL ?>/js/sidebar.js"></script>