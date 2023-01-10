<section class="form-upload">
    <div class="title-page py-4">
        <h1 class="text-2xl font-semibold">Data Pokok Asesi
            <span class="text-sm text-slate-500 font-semibold">Input Data</span>
        </h1>
    </div>
    <hr>
    <div class="form-section my-6">
        <h1 class="text-xl font-semibold">Input Dokumen Pokok Asesi</h1>
        <p>Masukkan Data Pokok Anda, Kemudian Klik <span class="btn btn-info btn-xs">Tambah</span></p>
        <form action="<?= BASEURL; ?>/asesi/tambah" method="POST" enctype="multipart/form-data">
            <div class="form-input flex gap-10 my-8">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Jenis Dokumen Persyaratan</span>
                    </label>
                    <select class="select select-bordered w-full max-w-xs" name="syarat">
                        <option disabled selected>Pilih Dokumen Persyaratan</option>
                        <?php foreach ($data['syarat'] as $syarat) : ?>
                        <option value="<?= $syarat['id'] ?>">
                            <?= $syarat['deskripsi'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Upload File</span>
                    </label>
                    <label class="input-group input-group-md">
                        <input type="file" class="file-input file-input-bordered w-full max-w-xs" name="document"/>
                    </label>
                    <label class="label">
                        <span class="label-text font-medium">File JPG/PNG/PDF, Maks 2 Mb</span>
                    </label>
                </div>
                <div class="form-submit pt-9">
                    <button type="submit" class="btn btn-md btn-info rounded-md" name="upload_file">Tambah</button>
                </div>
            </div>
        </form>        
    </div>
</section>
<?= Flasher::flash() ?>
<section class="list-persyaratan mb-6">
    <h1 class="text-xl font-semibold my-4">Data Dokumen Persyaratan</h1>
    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Persyaratan</th>
                    <th>File Pendukung</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;     
                      $idDokumen = array_map(function($p){   
                            return $p['id_persyaratan']; 
                      },  $data['dokumen-syarat']);

                      foreach ($data['syarat'] as $syarat):
                ?>
                <tr>
                    <th><?= $no++ ?></th>
                    <td>
                        <ul>
                            <li class="font-semibold"><?= $syarat['deskripsi'] ?></li>
                            <?php 
                                foreach ($data['dokumen-syarat'] as $ds) :
                                    $name= in_array($syarat['id'], $idDokumen) ? $ds['file_dokumen'] : '';
                                endforeach;
                            ?>
                            <li>Dokumen : <?= $name ?></li>
                        </ul>
                    </td>
                    <?php 
                        $status = in_array($syarat['id'], $idDokumen) ? 'Dokumen Telah ada' : 'Tidak Ada Dokumen';
                    ?>
                    <td><?= $status ?></td>
                    <td>
                        <button type="submit" class="btn btn-error btn-sm rounded-md" href="">Hapus</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>