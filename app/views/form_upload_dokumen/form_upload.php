<div class="w-full min-h-screen flex">
    <div class="pt-14 pr-8 px-12">
        <button type="button" id="hamburger" class="text-primary">
            <!-- hamburger icon -->
            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
                <path d="M64,384H448V341.33H64Zm0-106.67H448V234.67H64ZM64,128v42.67H448V128Z" />
            </svg>
        </button>
    </div>
    <div class="px-8 w-full pb-5">
        <h1 class="text-3xl font-semibold mb-3 pt-14">Unggah Dokumen</h1>
        <?php require_once "../app/views/templates/breadcrumbs.php" ?>
        <div class="my-5">
            <?= Flasher::flash() ?>
        </div>
        <form action="<?= BASEURL; ?>/asesi/tambah" method="post" enctype="multipart/form-data"
            class="bg-base-100 rounded-2xl shadow-md p-7 transition-all hover:-translate-y-1 w-fit mb-7">
            <input type="number" value="<?= $data['id-skema'] ?>" name="id-skema" class="hidden">
            <h1 class="text-2xl font-semibold mb-3">Input Dokumen</h1>
            <div class="grid grid-flow-row grid-cols-2 gap-5">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text ">Jenis Dokumen Persyaratan</span>
                    </label>
                    <select class="select select-bordered rounded-sm max-w-xs" name="syarat">
                        <option disabled selected>Pilih Dokumen Persyaratan</option>
                        <?php foreach ($data['syarat'] as $syarat) : ?>
                        <option value="<?= $syarat['id'] ?>">
                            <?= $syarat['deskripsi'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text ">Upload File</span>
                    </label>
                    <input type="file" class="file-input file-input-secondary rounded-sm max-w-xs" name="document" />
                    <span class="label-text font-medium mt-2">File JPG/PNG/PDF, Maks 2 Mb</span>
                </div>
                <div class="col-span-2 text-right">
                    <button type="submit" class="btn btn-md btn-secondary rounded-sm text-white"
                        name="upload_file">submit</button>
                </div>
            </div>
        </form>
        <table class="table rounded-xs shadow-lg">
            <thead>
                <tr>
                    <th class="bg-base-100"></th>
                    <th class="bg-base-100">Persyaratan</th>
                    <th class="bg-base-100">File Pendukung</th>
                    <th class="bg-base-100"></th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                $idPersyaratan = array_map(function ($p) {
                    return $p['id_persyaratan'];
                },  $data['dokumen-syarat']);

                foreach ($data['syarat'] as $syarat) :
                ?>
                <tr>
                    <th><?= $no++ ?></th>
                    <td>
                        <ul>
                            <li class="font-semibold"><?= $syarat['deskripsi'] ?></li>
                            <li>Dokumen : <span class="text-blue-500">
                                    <?php if (in_array($syarat['id'], $idPersyaratan)) {
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
                            $btn_status = in_array($syarat['id'], $idPersyaratan) ? 'btn-outline' : 'btn-disabled';
                            ?>
                        <a href="#delete-modal-<?= $syarat['id'] ?>"
                            class="btn btn-accent  rounded-sm btn-sm <?= $btn_status ?>">Hapus</a>
                        <div class="modal bg-[#EDF4F8]/50" id="delete-modal-<?= $syarat['id'] ?>">
                            <div class="modal-box">
                                <h3 class="font-bold text-xl">Hapus Dokumen</h3>
                                <p class="py-4">Apa anda yakin ingin menghapus dokumen ini ?</p>
                                <form action="<?= BASEURL; ?>/asesi/hapus/<?= $syarat['id'] ?>" method="post"
                                    class="modal-action" enctype="multipart/form-data">
                                    <input type="number" value="<?= $data['id-skema'] ?>" class="hidden"
                                        name="id-skema">
                                    <button type="submit"
                                        class="btn btn-sm btn-accent btn-outline rounded-sm">Hapus</button>
                                    <a href="#" class="btn btn-circle btn-outline absolute top-6 right-5 btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </a>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="<?= BASEURL ?>/js/sidebar.js"></script>