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

<section class="detail-skema">
    <div class="title-page">
        <h1 class="text-2xl font-semibold my-3">Persyaratan Uji Kompetensi
            <span class="text-sm text-slate-500 font-semibold">Input Data</span>
        </h1>
    </div>
    <div class="content mt-15">
        <hr>
        <section class="persyaratan mb-10">
            <h2 class="text-lg font-semibold my-3">Persyaratan Umum Skema Sertifikasi Profesi</h2>
            <h1 class="text-2xl font-normal my-3"><?= $data['skema']['nama_skema'] ?> 
                (<span class="font-bold"><?= codeSchemaGenerate(["KKNI II", $data['skema']['id'], $data['skema']['nama_skema']], "/"); ?></span>)
            </h1>
            <div class="overflow-x-auto my-6">
                <table class="table w-fit">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Persyaratan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            foreach($data['list-persyaratan'] as $syarat) :
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $syarat['deskripsi'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
        <hr>
        <section class="unit-kompetensi my-4">
            <h2 class="text-lg font-semibold my-3">Pendaftaran Uji Kompentensi <?= $data['skema']['nama_skema'] ?></h2>
            <p class="mb-4">Untuk mengikuti uji kompetensi pada skema ini, silahkan lengkapi persyaratan dan dokumen.</p>
            <div class="alert alert-info shadow-lg">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                    <span>Maaf, Anda belum mengunggah Dokumen Pokok ! 
                          <a href="<?= BASEURL; ?>/asesi/form_upload_document" class="underline">Lengkapi Persyaratan</a>
                    </span>
                </div>
            </div>
            <?= Flasher::flash() ?>
            <div class="button-group my-4 flex justify-center">
                <form action="<?= BASEURL ?>/asesi/daftar/<?= $data['skema']['id'] ?>" method="post">
                    <input type="submit" class ="btn btn-success btn-sm disabled" value="Proses Pendaftaran"/>
                </form>
                <a class ="btn btn-outline btn-sm mx-5" href="<?= BASEURL ?>/asesi/list_skema">KEMBALI</a>
            </div>
        </section>
    </div>
</section>