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

<div class="container">
    <div class="title-page">
        <h1 class="text-2xl font-semibold my-3">Persyaratan Uji Kompetensi
            <span class="text-sm text-slate-500 font-semibold">Input Data</span>
        </h1>
    </div>
    <div class="content mt-15">
        <hr>
        <h2 class="text-lg font-semibold my-3">Persyaratan Umum Skema Sertifikasi Profesi</h2>
        <h1 class="text-2xl font-normal my-3"><?= $data['skema']['nama_skema'] ?> 
            (<span class="font-bold"><?= codeSchemaGenerate(["KKNI II", $data['skema']['id'], $data['skema']['nama_skema']], "/"); ?></span>)
        </h1>
        <div class="overflow-x-auto my-6">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Persyaratan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach($data['list-persyaratan'] as $syarat)
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $syarat['deskripsi'] ?></td>
                        </tr>
                </tbody>
            </table>
        </div>
        <hr>
        <h2 class="text-lg font-semibold my-3">Pendaftaran Uji Kompentensi <?= $data['skema']['nama_skema'] ?></h2>
        <p>Untuk mengikuti uji kompetensi pada skema ini, silahkan lengkapi persyaratan dan dokumen berikut:</p>
        <p>Usia Anda adalah 0 tahun, Anda telah memenuhi Persyaratan Usia</p>
        <p>Pendidikan terakhir Anda adalah , Maaf, Anda tidak memenuhi Persyaratan Pendidikan</p>
    </div>
</div>