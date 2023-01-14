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

<section class="sertifikasi-asesi">
    <div class="title-page">
        <h1 class="text-2xl font-semibold my-3">Sertifikat Kompetensi</h1><hr>
    </div>
    <div class="list-schedule mt-6">
        <div class="head flex justify-between my-5">
            <h1 class="text-xl font-semibold my-3">Data Sertifikat Profesi Anda</h1>
            <div class="form-control">
                <form action="<?= BASEURL; ?>/asesi/#" method="post">  
                    <div class="input-group rounded-lg">
                        <input type="text" placeholder="Search Skema" class="input input-bordered" name="keyword" id="keyword" autocomplete="off"/>
                        <button class="btn btn-square" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" 
                                 stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                 d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                        </button>  
                    </div>
                </form>
            </div>
        </div>   
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
                          foreach($data['skema-asesi'] as $skema):
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td>
                            <ul>
                                <li class="font-bold"><?= codeSchemaGenerate(["KKNI II", $skema['id'], $skema['nama_skema']], "/"); ?></li>
                                <li><?= $skema['nama_skema'] ?></li>
                            </ul>
                        </td>
                        <td>
                            <ul>
                                <li class="font-bold">
                                    <a href="<?= BASEURL ?>/asesi/DownloadSertif/<?= $skema['id']?>" class="btn btn-sm btn-success mb-4">
                                        Unduh Sertifikat
                                    </a>
                                </li>
                                <li><span class="font-semibold">Tahun Terbit : </span><?= date('Y', strtotime($skema['tgl_Kadaluarsa_sertifikasi'])) ?></li>
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

<!-- Pagination -->
<div class="btn-group my-10">
    <a href="<?= BASEURL ?>/asesi/sertifikat_asesi/<?= ($data['page'] == 1) ? 1 : $data['page'] - 1 ?>"
        class="btn">«</a>
    <button class="btn">Page <?= $data["page"] ?></button>
    <a href="<?= BASEURL ?>/asesi/sertifikat_asesi/<?= $data['page'] + 1 ?>"
        class="btn">»</a>
</div>

<section class="info mb-8">
    <div class="title py-6">
        <h1 class="text-2xl font-semibold my-3">Informasi Sertifikat Kompetensi Profesi</h1>
    </div>
    <div class="info-desc">
        <p class="leading-8 text-xl"> Sertifikat Kompetensi dikeluarkan oleh Badan Nasional Sertifikasi Profesi (BNSP), dimana proses dilakukan oleh BNSP Pusat. 
            Data Sertifikat di atas adalah data permohonan sertifikat yang telah dikirimkan oleh BNSP Pusat</p>
    </div>
</section>