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

<div class="min-h-screen w-full">
    <div class="head flex justify-between">
        <h1 class="text-2xl font-semibold my-3">Skema Sertifikasi Profesi
                <span class="text-sm text-slate-500 font-semibold">Input Data</span>
        </h1>
        <div class="form-control">
            <div class="input-group rounded-lg">
                <input type="text" placeholder="Search" class="input input-bordered" />
                <button class="btn btn-square">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                </button>
            </div>
        </div>
    </div>
    <h1 class="text-lg font-medium pl-5 my-3">Data Skema Sertifikasi Profesi Tersedia</h1>
    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Skema</th>
                    <th>Deskripsi Skema Sertifikasi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = ($data['page'] - 1) * 5 + 1;
                 foreach ($data['list-skema'] as $schema) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= codeSchemaGenerate(["KKNI II", $schema['id'], $schema['nama_skema']], "/"); ?></td>
                    <td>
                        <ul>
                            <li><?= $schema['nama_skema']; ?></li>
                            <!-- <li></li> -->
                        </ul>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Pagination -->
<div class="btn-group my-10">
    <a href="<?= BASEURL ?>/asesi/list_skema/<?= ($data['page'] == 1) ? 1 : $data['page'] - 1 ?>"
        class="btn">«</a>
    <button class="btn">Page <?= $data["page"] ?></button>
    <a href="<?= BASEURL ?>/asesi/list_skema/<?= $data['page'] + 1 ?>"
        class="btn">»</a>
</div>