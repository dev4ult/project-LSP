<section class="jadwal-asessment">
    <div class="title-page">
        <h1 class="text-2xl font-semibold my-3">Jadwal Asesmen Anda</h1><hr>
    </div>
    <div class="list-schedule mt-6">
        <div class="head flex justify-between my-5">
            <h1 class="text-xl font-semibold my-3">Jadwal Asesmen Sertifikasi Profesi</h1>
            <div class="form-control">
                <form action="<?= BASEURL; ?>/asesi/search_jadwal_asesmen" method="post">  
                    <div class="input-group rounded-lg">
                        <input type="text" placeholder="Search Unit Kompetensi" class="input input-bordered" name="keyword" id="keyword" autocomplete="off"/>
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
                        <th>Skema Sertifikasi, Asesor, Waktu dan Tempat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = ($data['page'] - 1) * 5 + 1;
                          foreach($data['jadwal'] as $jadwal):
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td>
                            <ul>
                                <li class="font-semibold"><?= $jadwal['nama_kompetensi'] ?></li>
                                <li class="pl-4">Skema   : 
                                    <span class="font-semibold"><?= $jadwal['nama_skema'] ?></span></li>
                                <li class="pl-4">Asesor  : 
                                    <span class="font-semibold"><?= $jadwal['nama'] ?></span></li>
                                <li class="pl-4">Tanggal : 
                                    <span class="font-semibold"><?= $jadwal['tgl_ujian_kompetensi'] ?></span>, 
                                    Pukul 
                                    <span class="font-semibold"><?= $jadwal['jam_mulai'] ?> - <?= $jadwal['jam_akhir'] ?></span></li>
                                <li class="pl-4">Tempat  : 
                                    <span class="font-semibold"><?= $jadwal['tempat_unit_kompetensi'] ?></span></li>
                                <li class="pl-4">Jenis Pelaksanaan  : 
                                    <span class="font-semibold"><?= $jadwal['jenis_pelaksanaan'] ?></span></li>
                            </ul>
                        </td>
                        <td>
                            <ul>
                                <li class="mb-4"><button class="btn btn-sm btn-success">Unduh Form Unit Kompetensi</button></li>
                                <?php
                                    if($this->model('Unit_kompetensi_model')->checkUnitUpload($jadwal['id']) > 0){
                                        $btn_style = 'btn-disabled';
                                        $btn_name = 'Jawaban telah terkirim';
                                    }else{
                                        $btn_style = '';
                                        $btn_name = 'Upload Jawaban Kompetensi';
                                    }

                                    if($jadwal['jenis_pelaksanaan'] == "Online"){
                                ?>
                                    <li>
                                        <a href="<?= BASEURL; ?>/asesi/form_upload_ujian/<?= $jadwal['id']; ?>" class="btn btn-sm btn-success <?= $btn_style ?>">
                                            <?= $btn_name ?>
                                        </a>
                                    </li>
                                <?php
                                    }
                                ?>
                                
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
    <a href="<?= BASEURL ?>/asesi/jadwal_asesmen/<?= ($data['page'] == 1) ? 1 : $data['page'] - 1 ?>"
        class="btn">«</a>
    <button class="btn">Page <?= $data["page"] ?></button>
    <a href="<?= BASEURL ?>/asesi/jadwal_asesmen/<?= $data['page'] + 1 ?>"
        class="btn">»</a>
</div>