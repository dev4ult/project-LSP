<div class="min-h-screen w-full flex">
    <div class="pt-14 pr-8 px-12">
        <button type="button" id="hamburger" class="text-primary">
            <!-- hamburger icon -->
            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
                <path d="M64,384H448V341.33H64Zm0-106.67H448V234.67H64ZM64,128v42.67H448V128Z" />
            </svg>
        </button>
    </div>
    <div class="p-8 pt-14">
        <h1 class="text-3xl font-semibold mb-3">Detail Skema Sertifikasi</h1>
        <?php require_once "../app/views/templates/breadcrumbs.php" ?>
        <div class="my-5">
            <?= Flasher::flash(); ?>
        </div>
        <div class="my-3">
            <div class="w-full">
                <form action="<?= BASEURL ?>/skema/update/<?= $data['id-skema'] ?>" method="post">
                    <div
                        class="group-input bg-base-100 p-10 rounded-2xl shadow-md grid grid-flow-row grid-cols-2 gap-5 hover:-translate-y-1 transition-all">
                        <h2 class="col-span-2 text-2xl font-semibold">Detail Sertifikasi</h2>
                        <div class="form-control ">
                            <label class="label" for="skema">
                                <span class="label-text ">Nama
                                    Skema Profesi</span>
                            </label>
                            <input type="text" placeholder="" value="<?= $data['data-skema']['nama_skema']; ?>"
                                class="input input-bordered rounded-sm" id="skema" name="skema" required />
                        </div>
                        <div class="form-control">
                            <label class="label" for="SKKNI">
                                <span class="label-text ">Level
                                    KKNI</span>
                            </label>
                            <select class="select select-bordered rounded-sm" id="SKKNI" name="level" required>
                                <option disabled selected>-- Pilih Level --</option>
                                <?php if ($data['data-skema']['level'] == "Level I") : ?>
                                <option value="Level I" selected>Level I</option>
                                <?php else : ?>
                                <option value="Level I">Level I</option>
                                <?php endif; ?>
                                <?php if ($data['data-skema']['level'] == "Level II") : ?>
                                <option value="Level II" selected>Level II</option>
                                <?php else : ?>
                                <option value="Level II">Level II</option>
                                <?php endif; ?>
                                <?php if ($data['data-skema']['level'] == "Level III") : ?>
                                <option value="Level III" selected>Level III</option>
                                <?php else : ?>
                                <option value="Level III">Level III</option>
                                <?php endif; ?>
                                <?php if ($data['data-skema']['level'] == "Level IV") : ?>
                                <option value="Level IV" selected>Level IV</option>
                                <?php else : ?>
                                <option value="Level IV">Level IV</option>
                                <?php endif; ?>
                                <?php if ($data['data-skema']['level'] == "Level V") : ?>
                                <option value="Level V" selected>Level V</option>
                                <?php else : ?>
                                <option value="Level V">Level V</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-control">
                            <label class="label" for="asesor">
                                <span class="label-text ">Asesor</span>
                            </label>
                            <select class="select select-bordered rounded-sm" id="asesor" name="asesor">
                                <option disabled selected>-- Pilih Asesor --</option>
                                <?php foreach ($data['asesor'] as $asesor) : ?>
                                <?php if ($asesor['nama'] == $data['data-skema']['asesor']) : ?>
                                <option value="<?= $asesor['nama']; ?>" selected><?= $asesor['nama']; ?></option>
                                <?php else : ?>
                                <option value="<?= $asesor['nama']; ?>"><?= $asesor['nama']; ?></option>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-control">
                            <label class="label" for="SKKNI">
                                <span class="label-text ">SKK/KKNI
                                    LSP</span>
                            </label>
                            <select class="select select-bordered rounded-sm" id="SKKNI" name="SKKNI" required>
                                <option disabled selected>-- Pilih SKK/KKNI --</option>
                                <?php foreach ($data['skkni'] as $skkni) : ?>
                                <?php if ($skkni['skkni'] == $data['data-skema']['skkni']) : ?>
                                <option value="<?= $skkni['skkni']; ?>" selected><?= $skkni['skkni']; ?></option>
                                <?php else : ?>
                                <option value="<?= $skkni['skkni']; ?>"><?= $skkni['skkni']; ?></option>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-control ">
                            <label class="label" for="jurusan">
                                <span class="label-text ">Jurusan</span>
                            </label>
                            <select class="select select-bordered rounded-sm" id="jurusan" name="jurusan">
                                <option disabled selected>-- Pilih Jurusan --</option>
                                <?php foreach ($data['jurusan'] as $jurusan) : ?>
                                <?php if ($jurusan['nama'] == $data['data-skema']['jurusan']) : ?>
                                <option value="<?= $jurusan['nama']; ?>" selected><?= $jurusan['nama']; ?></option>
                                <?php else : ?>
                                <option value="<?= $jurusan['nama']; ?>"><?= $jurusan['nama']; ?></option>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-control ">
                            <label class="label-text mb-2 mt-2">Status</label>
                            <div class="flex gap-2 justify-between">
                                <label
                                    class="form-control flex-row items-center gap-3 border-2 rounded-sm border-slate-200 py-2 pl-3 pr-10 flex-grow flex-shrink-0">
                                    <input type="radio" class="radio-1 radio " name="status" value="Aktif" required
                                        <?= $data['status-skema'] == 'Aktif' ? 'checked' : '' ?> />
                                    <span>Aktif</span>
                                </label>
                                <label
                                    class="form-control flex-row items-center gap-3 border-2 rounded-sm border-slate-200 py-2 pl-3 pr-10 flex-grow flex-shrink-0">
                                    <input type="radio" class="radio-1 radio" name="status" value="Nonaktif"
                                        <?= $data['status-skema'] == 'Nonaktif' ? 'checked' : '' ?> />
                                    <span>Nonaktif</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div
                        class="group-input-persyaratan bg-base-100 rounded-2xl shadow-md p-10 transition-all hover:-translate-y-1 mt-5">
                        <h2 class="text-2xl font-semibold">Persyaratan Skema</h2>
                        <div class="flex flex-wrap mt-5">
                            <div class="list-umum ">
                                <h3 class="text-lg">Kategori Umum</h3>
                                <div class="input-umum flex flex-wrap gap-3">
                                    <?php foreach ($data['list-persyaratan-umum'] as $ds) : ?>
                                    <?php if (isset($data['persyaratan-skema'])) : ?>
                                    <?php foreach ($data['persyaratan-skema'] as $ps) : ?>
                                    <?php if ($ps['deskripsi'] == $ds['deskripsi']) : ?>
                                    <?php $match = true;
                                                    break; ?>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                    <?php if (isset($match) && $match == true) : ?>
                                    <div class="form-control w-1/2">
                                        <label class="cursor-pointer label flex justify-start">
                                            <input type="checkbox" checked="checked" class="checkbox checkbox-info mr-3"
                                                name="check[]" value="<?= $ds['deskripsi']; ?>" />
                                            <span class="label-text font-semibold"><?= $ds['deskripsi']; ?></span>
                                        </label>
                                    </div>
                                    <?php $match = false; ?>
                                    <?php else : ?>
                                    <div class="form-control w-1/2">
                                        <label class="cursor-pointer label flex justify-start">
                                            <input type="checkbox" class="checkbox checkbox-info mr-3" name="check[]"
                                                value="<?= $ds['deskripsi']; ?>" />
                                            <span class="label-text font-semibold"><?= $ds['deskripsi']; ?></span>
                                        </label>
                                    </div>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="list-teknis ">
                                <h1 class="text-lg">Kategori Teknis</h1>
                                <div class="input-teknis flex flex-wrap gap-3">
                                    <?php foreach ($data['list-persyaratan-teknis'] as $ds) : ?>
                                    <?php if (isset($data['persyaratan-skema'])) : ?>
                                    <?php foreach ($data['persyaratan-skema'] as $ps) : ?>
                                    <?php if ($ps['deskripsi'] == $ds['deskripsi']) : ?>
                                    <?php $match = true;
                                                    break; ?>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                    <?php if (isset($match) && $match == true) : ?>
                                    <div class="form-control w-1/2">
                                        <label class="cursor-pointer label flex justify-start">
                                            <input type="checkbox" checked="checked" class="checkbox checkbox-info mr-3"
                                                name="check[]" value="<?= $ds['deskripsi']; ?>" />
                                            <span class="label-text font-semibold"><?= $ds['deskripsi']; ?></span>
                                        </label>
                                    </div>
                                    <?php $match = false; ?>
                                    <?php else : ?>
                                    <div class="form-control w-1/2">
                                        <label class="cursor-pointer label flex justify-start">
                                            <input type="checkbox" class="checkbox checkbox-info mr-3" name="check[]"
                                                value="<?= $ds['deskripsi']; ?>" />
                                            <span class="label-text font-semibold"><?= $ds['deskripsi']; ?></span>
                                        </label>
                                    </div>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" name="update"
                            class="btn btn-secondary rounded-sm my-5 mt-8 text-white w-full">Perbarui</button>
                    </div>

                </form>
                <div class="group-ukom-asesi w-full mt-4 flex justify-between items-start">
                    <div class="daftar-ukom w-1/2">
                        <h1 class="inline-block text-xl font-bold mt-8 mb-5 mr-5 ">Unit Kompetensi Skema</h1><label
                            for="tambah-kompetensi" class="btn btn-primary mb-3 text-white rounded-sm"
                            href="<?= BASEURL ?>/skema/tambah_kompetensi/<?= $data['id-skema'] ?>">Tambah
                            Kompetensi</label>

                        <table class="table w-full rounded-xs shadow-lg">
                            <thead>
                                <tr>
                                    <th class="bg-base-100"></th>
                                    <th class="bg-base-100">Nama Kompetensi</th>
                                    <th class="bg-base-100"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php if (count($data['list-kompetensi']) > 0) : ?>
                                <?php foreach ($data['list-kompetensi'] as $ds) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $ds['nama_kompetensi'] ?></td>
                                    <td>
                                        <ul class="flex gap-2 items-center">
                                            <li>
                                                <a href="<?= BASEURL ?>/skema/edit_kompetensi/<?= $ds['id'] ?>/<?= $data['id-skema'] ?>"
                                                    class="bg-primary hover:bg-info px-1.5 py-1 text-white rounded-sm uppercase flex items-center gap-1">
                                                    <img src="<?= BASEURL ?>/img/info_white.svg" class="w-5" alt="info">
                                                    <span class="font-semibold">info</span></a>
                                            </li>
                                            <li>
                                                <label for="delete-ukom-<?= $ds['id'] ?>"
                                                    class="border-2 rounded-sm text-accent/50 border-accent/50 px-2 py-1 uppercase cursor-pointer hover:text-white hover:bg-accent/50 hover:border-accent/0 flex items-center gap-1">
                                                    <img src="<?= BASEURL ?>/img/delete_accent.svg" class="w-5"
                                                        alt="delete">
                                                    <span class="font-semibold">hapus</span></label>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <input type="checkbox" id="delete-ukom-<?= $ds['id'] ?>" class="modal-toggle" />
                                <div class="modal modal-bottom sm:modal-middle bg-[#EDF4F8]/50">
                                    <div class="modal-box ">
                                        <h3 class="font-bold text-2xl">Hapus Skema Sertifikasi</h3>
                                        <p class="py-4 text-lg">Apakah anda yakin untuk menghapus skema sertifikasi ini?
                                        </p>
                                        <form
                                            action="<?= BASEURL ?>/skema/hapus_kompetensi/<?= $ds['id'] ?>/<?= $data['id-skema'] ?>"
                                            method="post" class="modal-action">
                                            <button type="submit"
                                                class="btn btn-sm btn-outline btn-accent rounded-sm">hapus</button>
                                            <label for="delete-ukom-<?= $ds['id'] ?>"
                                                class="btn btn-sm rounded-sm btn-secondary text-white">batal</label>
                                        </form>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <?php else : ?>
                                <tr>
                                    <td></td>
                                    <td>
                                        <h1 class="text-lg">Belum ada kompetensi</h1>
                                    </td>
                                    <td></td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="daftar-asesi">
                        <h1 class="text-xl font-bold mt-8 mb-5 mr-5 text-right w-fit">Asesi Terdaftar</h1>
                        <div class="asesi max-h-60 overflow-y-auto bg-base-100 shadow-md rounded-lg p-5">
                            <?php if (isset($data['list-asesi']) && count($data['list-asesi']) > 0) : ?>
                            <?php foreach ($data['list-asesi'] as $ds) : ?>
                            <div class="asesi-terdaftar px-3">
                                <div class="data-asesi flex flex-col justify-around">
                                    <a href="<?= BASEURL ?>/dashboard/detail/asesi/<?= $ds['id'] ?>"
                                        class="nama-asesi text-lg font-semibold"><?= $ds['nama'] ?></a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <?php else : ?>
                            <h1 class="text-lg">Belum ada asesi yang terdaftar</h1>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="checkbox" id="tambah-kompetensi" class="modal-toggle" />
<div class="modal bg-[#EDF4F8]/50 p-10">
    <form action="<?= BASEURL ?>/skema/tambah_kompetensi/<?= $data['id-skema'] ?>" method="post"
        class="modal-box max-w-none w-fit grid grid-flow-row grid-cols-2 gap-5" enctype="multipart/form-data">
        <h2 class="text-2xl font-semibold mb-1">Kompetensi Baru</h2>
        <div class="form-control col-span-2">
            <label class="label" for="nama-kompetensi">
                <span class="label-text">Nama
                    Kompetensi</span>
            </label>
            <input type="text" placeholder="" class="input input-bordered rounded-sm" id="nama-kompetensi"
                name="nama-kompetensi" required />
        </div>
        <div class="form-control col-span-2">
            <label class="label" for="pelaksanaan">
                <span class="label-text">Jenis
                    Pelaksanaan</span>
            </label>
            <select class="select select-bordered rounded-sm" id="pelaksanaan" name="pelaksanaan" required>
                <option disabled selected>-- Pilih Pelaksanaan --</option>
                <option value="Offline">Offline</option>
                <option value="Online">Online</option>
            </select>
        </div>
        <div class="waktu mt-4 flex flex-wrap justify-between gap-5 items-center col-span-2">
            <div class="form-control w-[240px]">
                <label class="label" for="jam-mulai">
                    <span class="label-text">Mulai
                        Ujian</span>
                </label>
                <input type="time" placeholder="" class="input input-bordered rounded-sm" id="jam-mulai"
                    name="jam-mulai" />
            </div>
            <div class="form-control w-[240px]">
                <label class="label" for="jam-akhir">
                    <span class="label-text">Selesai
                        Ujian</span>
                </label>
                <input type="time" placeholder="" class="input input-bordered rounded-sm" id="jam-akhir"
                    name="jam-akhir" />
            </div>
        </div>
        <div class="form-control ">
            <label class="label" for="tgl-kompetensi">
                <span class="label-text">Tanggal
                    Ujian</span>
            </label>
            <input type="date" placeholder="" class="input input-bordered rounded-sm" id="tgl-kompetensi"
                name="tgl-kompetensi" required />
        </div>
        <div class="form-control ">
            <label class="label" for="tempat-kompetensi">
                <span class="label-text">Tempat Ujian
                    Kompetensi</span>
            </label>
            <input type="text" placeholder="" class="input input-bordered rounded-sm" id="tempat-kompetensi"
                name="tempat-kompetensi" required />
        </div>
        <div class="form-control col-span-2">
            <label class="label" for="soal-kompetensi">
                <span class="label-text">Soal Ujian</span>
            </label>
            <input type="file" placeholder="" class="file-input file-input-secondary rounded-sm" id="soal-kompetensi"
                name="soal-kompetensi" />
        </div>
        <div class="modal-action p-3 col-span-2">
            <button type="submit" class="btn btn-secondary rounded-sm text-white">Submit</button>
            <label for="tambah-kompetensi" class="btn btn-circle btn-outline absolute top-6 right-5 btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </label>
        </div>
</div>