<section class="upload-syarat-doc">
    <div class="title-page">
        <h1 class="text-2xl font-semibold my-3">Unggah Persyaratan Assesmen</h1><hr>
    </div>
    <div class="skema-list mt-10">
        <div class="head flex justify-between my-5">
            <h1 class="text-xl font-semibold my-3">Skema Sertifikasi Profesi yang Anda ikuti</h1>
            <div class="form-control">
                <form action="<?= BASEURL; ?>/asesi/search_upload_document" method="post">  
                    <div class="input-group rounded-lg">
                        <input type="text" placeholder="Search" class="input input-bordered" name="keyword" id="keyword" autocomplete="off"/>
                        <button class="btn btn-square" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" 
                                 stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                 d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                        </button>  
                    </div>
                </form>
            </div>
        </div>
        <div class="list-skema mb-10">
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Skema Serifikasi</th>
                            <th>Status Persyaratan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = ($data['page'] - 1) * 5 + 1;
                              foreach($data['skema-asesi'] as $skema):
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td class="text-md font-semibold"><?= $skema['nama_skema'] ?></td>
                            <td> <ul>
                                    <li class="text-sm my-2 font-semibold">(<?= $data['count'] ?>) Dokumen Terunggah</li>
                                    <li><a href="<?= BASEURL ?>/asesi/form_upload_document" class="btn btn-success btn-sm">Lengkapi/Tambah Dokumen</a></li>
                                </ul>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= Flasher::flash() ?>
            </div>
        </div>
    </div>
</section>

<!-- Pagination -->
<div class="btn-group my-10">
    <a href="<?= BASEURL ?>/asesi/list_skema/<?= ($data['page'] == 1) ? 1 : $data['page'] - 1 ?>"
        class="btn">«</a>
    <button class="btn">Page <?= $data["page"] ?></button>
    <a href="<?= BASEURL ?>/asesi/list_skema/<?= $data['page'] + 1 ?>"
        class="btn">»</a>
</div>