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
                      $idPersyaratan = array_map(function($p){   
                            return $p['id_persyaratan']; 
                      },  $data['dokumen-syarat']);

                      foreach ($data['syarat'] as $syarat): 
                ?>
                <tr>
                    <th><?= $no++ ?></th>
                    <td>
                        <ul>
                            <li class="font-semibold"><?= $syarat['deskripsi'] ?></li>
                            <li>Dokumen : <span class="text-blue-500">
                                <?php if(in_array($syarat['id'], $idPersyaratan)){
                                    echo $this->model('Dokumen_model')->getfileName($syarat['id']);
                                }
                                ?>
                                </span>
                            </li>
                        </ul>
                    </td>
                        <?php 
                            $status = in_array($syarat['id'], $idPersyaratan) ? 'Dokumen Telah Tersedia' : 'Tidak Ada Dokumen';
                        ?>
                    <td><?= $status ?></td>
                    <td>
                        <?php 
                            $btn_status = in_array($syarat['id'], $idPersyaratan) ? '' : 'btn-disabled';
                        ?>
                        <a href="#delete-modal-<?= $syarat['id'] ?>" class="btn btn-error btn-sm rounded-md <?= $btn_status ?>">Hapus</a>
                        <!-- MODAL -->
                        <div class="modal modal-bottom sm:modal-middle" id="delete-modal-<?= $syarat['id'] ?>">
                            <div class="modal-box">
                                <h3 class="font-bold text-lg">Delete Document</h3>
                                <p class="py-4">Apa anda yakin ingin menghapus dokumen ini ?</p>
                                <form action="<?= BASEURL; ?>/asesi/hapus/<?= $syarat['id'] ?>" method="post" class="modal-action" enctype="multipart/form-data">
                                    <button type="submit" class="btn">Hapus</button>
                                    <a href="#" class="btn btn-outline">BATAL</a>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</section>