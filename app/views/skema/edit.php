<?= Flasher::flash(); ?>

<div class="container-form w-full h-fit mb-4">
    <form action="<?= BASEURL ?>/skema/update/<?= $data['id-skema'] ?>" method="post" class="w-full">
        <div class="group-input flex justify-between">
            <div class="left-form w-1/2">
                <div class="form-control w-[500px]">
                    <label class="label" for="skema">
                        <span
                            class="label-text text-lg font-semibold after:content-['*'] after:text-pink-500 after:ml-0.5">Nama
                            Skema Profesi</span>
                    </label>
                    <input type="text" placeholder="" value="<?= $data['data-skema']['nama_skema']; ?>"
                        class="input input-bordered" id="skema" name="skema" required />
                </div>
                <div class="form-control w-[500px] mt-4">
                    <label class="label" for="SKKNI">
                        <span
                            class="label-text text-lg font-semibold after:content-['*'] after:text-pink-500 after:ml-0.5">Level
                            KKNI</span>
                    </label>
                    <select class="select select-bordered" id="SKKNI" name="level" required>
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
                <div class="form-control w-[500px] mt-4">
                    <label class="label" for="asesor">
                        <span
                            class="label-text text-lg font-semibold after:content-['*'] after:text-pink-500 after:ml-0.5">Asesor</span>
                    </label>
                    <select class="select select-bordered" id="asesor" name="asesor">
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
            </div>
            <div class="right-form w-1/2">
                <div class="form-control w-full">
                    <label class="label" for="SKKNI">
                        <span
                            class="label-text text-lg font-semibold after:content-['*'] after:text-pink-500 after:ml-0.5">SKK/KKNI
                            LSP</span>
                    </label>
                    <select class="select select-bordered" id="SKKNI" name="SKKNI" required>
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
                <div class="form-control w-full mt-4">
                    <label class="label" for="jurusan">
                        <span
                            class="label-text text-lg font-semibold after:content-['*'] after:text-pink-500 after:ml-0.5">Jurusan</span>
                    </label>
                    <select class="select select-bordered" id="jurusan" name="jurusan">
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
            </div>
        </div>
        <h1 class="text-xl font-bold mt-8 mb-3 mr-5 ">Persyaratan Skema</h1>
        <div class="group-input-persyaratan w-full flex flex-wrap justify-between">
            <div class="list-umum w-[500px]">
                <h1 class="text-lg font-semibold mt-5 mb-3">Kategori Umum</h1>
                <div class="input-umum w-full flex flex-wrap justify-between">
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
                            <input type="checkbox" checked="checked" class="checkbox checkbox-info mr-3" name="check[]"
                                value="<?= $ds['deskripsi']; ?>" />
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
            <div class="list-teknis w-[500px]">
                <h1 class="text-lg font-semibold mt-5 mb-3">Kategori Teknis</h1>
                <div class="input-teknis w-full flex flex-wrap justify-between">
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
                            <input type="checkbox" checked="checked" class="checkbox checkbox-info mr-3" name="check[]"
                                value="<?= $ds['deskripsi']; ?>" />
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
        <div class="group-ukom-asesi w-full mt-4 flex justify-between items-start">
            <div class="daftar-ukom w-1/2">
                <h1 class="inline-block text-xl font-bold mt-8 mb-5 mr-5 ">Unit Kompetensi Skema</h1><a
                    class="badge badge-info cursor-pointer"
                    href="<?= BASEURL ?>/skema/tambah_kompetensi/<?= $data['id-skema'] ?>">Tambah Kompetensi</a>
                <table class="table table-zebra w-full">
                    <!-- head -->
                    <thead>
                        <tr class="text-center text-5xl">
                            <th>No.</th>
                            <th>Nama Kompetensi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        <?php $no = 1; ?>
                        <?php if (count($data['list-kompetensi']) > 0) : ?>
                        <?php foreach ($data['list-kompetensi'] as $ds) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $ds['nama_kompetensi'] ?></td>
                            <td class="text-center flex items-center justify-around">
                                <a href="<?= BASEURL ?>/skema/hapus_kompetensi/<?= $ds['id'] ?>/<?= $data['id-skema'] ?>"
                                    class="btn btn-outline btn-warning rounded-md mt-5"
                                    onclick="return confirm('Yakin Mau dihapus??')">Hapus</a>
                                <a href="<?= BASEURL ?>/skema/edit_kompetensi/<?= $ds['id'] ?>/<?= $data['id-skema'] ?>"
                                    class="btn btn-outline btn-info rounded-md mt-5">Ubah</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else : ?>
                        <tr>
                            <td>
                                <h1 class="text-lg">Belum ada kompetensi</h1>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="daftar-asesi w-[500px] ">
                <h1 class="text-xl font-bold mt-8 mb-5 mr-5">Asesi Terdaftar</h1>
                <div class="asesi h-[300px] overflow-y-auto bg-gray-400 rounded-lg p-5">
                    <?php if (isset($data['list-asesi']) && count($data['list-asesi']) > 0) : ?>
                    <?php foreach ($data['list-asesi'] as $ds) : ?>
                    <div class="asesi-terdaftar w-full h-[80px] flex justify-start items-center px-3">
                        <div class="foto w-[50px] h-[50px] rounded-full bg-red-500"></div>
                        <div class="data-asesi ml-5 flex flex-col justify-around">
                            <span class="nama-asesi text-lg font-semibold"><?= $ds['nama'] ?></span>
                            <a>lihat hasil ujian</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php else : ?>
                    <h1 class="text-lg">Belum asesi yang terdaftar</h1>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <button type="submit" name="update" class="btn btn-info my-5 mt-8">Perbarui</button>
    </form>

</div>