<section class="form-upload-unit">
    <div class="title-page my-4">
        <h1 class="text-2xl font-semibold">Form Upload Unit Kompetensi</h1>
    </div>
    <?= Flasher::flash() ?>
    <div class="desc-unit mt-3">
        <table>
            <tr>
                <td>Nama Unit</td>
                <td class="pl-4">: <?= $data['unit-kompetensi']['nama_kompetensi'] ?></td>
            </tr>
            <tr>
                <td>Opened</td>
                <td class="pl-4">: <?= date('d F Y', strtotime($data['unit-kompetensi']['tgl_ujian_kompetensi'])) ?>, <?= $data['unit-kompetensi']['jam_mulai'] ?></td>
            </tr>
            <tr>
                <td>Due</td>
                <td class="pl-4">: <?= date('d F Y', strtotime($data['unit-kompetensi']['tgl_ujian_kompetensi'])) ?>, <?= $data['unit-kompetensi']['jam_akhir'] ?></td>
            </tr>
        </table>        
    </div>
    <div class="form-section">
        <form action="<?= BASEURL; ?>/asesi/input_ujian/<?= $data['unit-kompetensi']['id'] ?>" method="POST" enctype="multipart/form-data">
            <div class="form-input flex gap-10 my-8">
                <label class="pt-2 font-semibold">Dokumen Kompetensi : </label>
                <div class="form-control">
                    <label class="input-group input-group-md">
                        <input type="file" class="file-input file-input-bordered w-full" name="document"/>
                    </label>
                    <label class="label">
                        <span class="label-text font-medium">File Docx/PDF, Maks 25 mb</span>
                    </label>
                </div>
            </div>
            <div class="form-submit mb-8 flex justify-center gap-5">
                <?php
                    $submit = $this->model('Unit_kompetensi_model')->checkUnitUpload($data['unit-kompetensi']['id']) > 0 ? 'btn-disabled' : '';
                ?>
                <button type="submit" class="btn btn-sm btn-info <?= $submit ?>"> Submit </button>
                <a href="<?= BASEURL ?>/asesi/jadwal_asesmen" class="btn btn-sm btn-outline btn-info"> Kembali </a>
            </div>
            <p class="text-xs text-red-600">*jika tombol submit tidak tersedia, artinya anda telah mengirim jawaban unit kompetensi anda kepada asesor</p>
        </form>   
    </div>
</section>