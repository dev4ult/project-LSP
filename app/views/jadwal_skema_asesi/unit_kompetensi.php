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
        <h1 class="text-3xl font-semibold mb-3">Unggah Asesmen</h1>
        <?php require_once "../app/views/templates/breadcrumbs.php" ?>
        <div class="my-5">
            <?= Flasher::flash() ?>
        </div>
        <div class="bg-base-100 p-7 rounded-2xl shadow-md transition-all hover:-translate-y-1 mt-5">
            <h1 class="text-2xl font-semibold">Form Upload Unit Kompetensi</h1>
            <div class="desc-unit mt-3">
                <table class="text-lg">
                    <tr>
                        <td>Unit Kompetensi</td>
                        <td class="pl-4">: <?= $data['unit-kompetensi']['nama_kompetensi'] ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td class="pl-4">:
                            <?= date('d F Y', strtotime($data['unit-kompetensi']['tgl_ujian_kompetensi'])) ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Jam buka</td>
                        <td class="pl-4">:
                            <?= $data['unit-kompetensi']['jam_mulai'] ?></td>
                    </tr>
                    <tr>
                        <td>Deadline</td>
                        <td class="pl-4">:
                            <?= $data['unit-kompetensi']['jam_akhir'] ?></td>
                    </tr>
                </table>
            </div>
            <form action="<?= BASEURL; ?>/asesi/input_ujian/<?= $data['unit-kompetensi']['id'] ?>" method="POST"
                enctype="multipart/form-data">
                <div class="form-input my-3">
                    <label class="text-lg font-semibold">Dokumen Kompetensi : </label>
                    <div class="form-control mt-2">
                        <input type="file" class="file-input rounded-sm file-input-secondary w-full" name="document" />
                        <label class="label">
                            <span class="label-text font-medium">File Docx/PDF, Maks 25 mb</span>
                        </label>
                    </div>
                </div>
                <div class="text-right">
                    <?php
                    $submit = $this->model('Unit_kompetensi_model')->checkUnitUpload($data['unit-kompetensi']['id']) > 0 ? 'btn-disabled' : '';
                    ?>
                    <button type="submit" class="btn btn-primary rounded-sm text-white <?= $submit ?>">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
<script src="<?= BASEURL ?>/js/sidebar.js"></script>