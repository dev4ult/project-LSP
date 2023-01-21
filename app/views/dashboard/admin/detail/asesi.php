<?php $user = $data['user']; ?>

<div class="min-h-screen w-full flex">
    <div class="pt-14 px-8 pr-12">
        <button type="button" id="hamburger" class="text-primary">
            <!-- hamburger icon -->
            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
                <path d="M64,384H448V341.33H64Zm0-106.67H448V234.67H64ZM64,128v42.67H448V128Z" />
            </svg>
        </button>
    </div>
    <div class="mb-5 pt-14">
        <h1 class="text-3xl font-semibold mb-3">Detail Asesi</h1>
        <?php require_once "../app/views/templates/breadcrumbs.php" ?>
        <div class="mt-5">
            <?= Flasher::flash() ?>
        </div>
        <div class=" flex gap-5 mt-5">
            <div class="rounded-lg shadow-md p-10 bg-base-100">
                <div class="flex justify-between">
                    <h3 class="font-bold text-2xl">Biodata</h3>
                    <label for="biodata" class="btn btn-sm rounded-sm btn-secondary text-white">edit</label>
                </div>
                <div class="mt-5">
                    <div class="text-lg font-semibold mt-10 border-b-2 border-base-200 flex gap-10 justify-between">
                        <p class="text-slate-400">Nama</p>
                        <p class="text-right"><?= $user["nama"] ?></p>
                    </div>
                    <div class="text-lg font-semibold mt-10 border-b-2 border-base-200 flex gap-10 justify-between">
                        <p class="text-slate-400">NIM</p>
                        <p class="text-right"><?= $user["nim"] ?></p>
                    </div>
                    <div class="text-lg font-semibold mt-10 border-b-2 border-base-200 flex gap-10 justify-between">
                        <p class="text-slate-400">Jurusan</p>
                        <p class="text-right" id="nama-jurusan"><?= $user["jurusan"] ?></p>
                    </div>
                    <div class="text-lg font-semibold mt-10 border-b-2 border-base-200 flex gap-10 justify-between">
                        <p class="text-slate-400">Prodi</p>
                        <p class="text-right" id="nama-prodi"><?= $user["prodi"] ?></p>
                    </div>
                    <div class="text-lg font-semibold mt-10 border-b-2 border-base-200 flex gap-10 justify-between">
                        <p class="text-slate-400">No Telepon</p>
                        <p class="text-right"><?= $user["no_telepon"] ?></p>
                    </div>
                    <div class="text-lg font-semibold mt-10 border-b-2 border-base-200 flex gap-10 justify-between">
                        <p class="text-slate-400">Jenis Kelamin</p>
                        <p class="text-right max-w-sm"><?= $user["jenis_kelamin"] ?></p>
                    </div>
                    <div class="text-lg font-semibold mt-10 border-b-2 border-base-200 flex gap-10 justify-between">
                        <p class="text-slate-400">Alamat</p>
                        <p class="text-right max-w-sm"><?= $user["alamat"] ?></p>
                    </div>

                </div>
            </div>
            <div class="flex flex-col gap-5">
                <div class="rounded-lg shadow-md p-10 bg-base-100">
                    <div class="flex justify-between">
                        <h3 class="font-bold text-2xl">Akun</h3>
                        <label for="akun" class="btn btn-sm btn-secondary rounded-sm text-white">edit</label>
                    </div>
                    <div class="mt-5">
                        <div class="text-lg font-semibold mt-10 border-b-2 border-base-200 flex gap-10 justify-between">
                            <p class="text-slate-400">Username</p>
                            <p class="text-right"><?= $user["username"] ?></p>
                        </div>
                        <div class="text-lg font-semibold mt-10 border-b-2 border-base-200 flex gap-10 justify-between">
                            <p class="text-slate-400">Email</p>
                            <p class="text-right"><?= $user["email"] ?></p>
                        </div>
                        <div class="text-lg font-semibold mt-10 border-b-2 border-base-200 flex gap-10 justify-between">
                            <p class="text-slate-400">Password</p>
                            <p class="text-right">*******</p>
                        </div>
                    </div>
                </div>
                <div class="rounded-lg shadow-md p-10 bg-base-100">
                    <h3 class="font-bold text-2xl">Skema Terdaftar</h3>
                    <ul class="mt-5 whitespace-nowrap flex flex-col gap-2 overflow-y-auto h-40">
                        <?php foreach ($data['list-skema'] as $skema) : ?>
                        <li class="flex items-center">
                            <img src="<?= BASEURL ?>/img/bookmark.svg" alt="bookmark">
                            <div>
                                <h4 class="text-sm font-semibold"><?= $skema['nama_skema'] ?></h4>
                                <a href="<?= BASEURL ?>/skema/detail/<?= $skema['id'] ?>"
                                    class="uppercase text-xs text-info">lihat skema sertifikasi</a>
                            </div>
                        </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="checkbox" id="biodata" class="modal-toggle" />
<div class="modal bg-[#EDF4F8]/50">
    <form action="<?= BASEURL ?>/dashboard/bio_update/<?= $data['user-type'] ?>" method="post"
        class="modal-box max-w-none w-fit">
        <input type="number" name="account-id" class="hidden" value="<?= $user['id'] ?>">

        <input type="number" name="bio-id" class="hidden" value="<?= $user['id_biodata_asesi'] ?>">
        <h3 class="font-bold text-2xl mb-5">Update Biodata</h3>
        <div class="grid grid-flow-row grid-cols-2 gap-5">
            <div class="form-control ">
                <label class="label">
                    <span class="label-text">Nama Lengkap</span>
                </label>
                <label class="">
                    <input type="text" placeholder="Type here" class="rounded-sm input w-full input-bordered"
                        name="nama" value="<?= $user['nama'] ?>" />
                </label>
            </div>
            <div class="form-control ">
                <label class="label">
                    <span class="label-text">NIM</span>
                </label>
                <label class="">
                    <input type="number" placeholder="Type here" class="rounded-sm input w-full input-bordered"
                        name="nim" value="<?= $user['nim'] ?>" />
                </label>
            </div>
            <div class="form-control ">
                <label class="label">
                    <span class="label-text">No Telepon</span>
                </label>
                <label class="">
                    <input type="text" placeholder="Type here" class="rounded-sm input w-full input-bordered"
                        name="no_telepon" value="<?= $user['no_telepon'] ?>" />
                </label>
            </div>
            <div class="form-control">
                <label class="label-text mb-2 mt-2">Jenis Kelamin</label>
                <div class="flex gap-2 justify-between">
                    <label
                        class="form-control flex-row items-center gap-3 border-2 rounded-sm border-slate-200 py-2 pl-3 pr-10">
                        <input type="radio" class="radio-1 radio " name="jenis-kelamin" value="Laki-laki" required
                            <?= $user['jenis_kelamin'] == "Laki-laki" ? "checked" : "" ?> />
                        <span>Laki-laki</span>
                    </label>
                    <label
                        class="form-control flex-row items-center gap-3 border-2 rounded-sm border-slate-200 py-2 pl-3 pr-10">
                        <input type="radio" class="radio-1 radio" name="jenis-kelamin" value="Perempuan"
                            <?= $user['jenis_kelamin'] == "Perempuan" ? "checked" : "" ?> />
                        <span>Perempuan</span>
                    </label>
                </div>
            </div>

            <div class="form-control ">
                <label class="label">
                    <span class="label-text">Jurusan</span>
                </label>
                <select class="select select-bordered rounded-sm w-full" name="jurusan" required>
                    <option disabled>-- PILIH JURUSAN --</option>
                    <?php foreach ($data['jurusan'] as $jurusan) : ?>
                    <option <?= $jurusan['nama'] == $user['jurusan'] ? "disabled selected" : "" ?>
                        value="<?= $jurusan['nama'] ?>">
                        <?= $jurusan['nama'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Prodi</span>
                </label>
                <select class="select select-bordered rounded-sm w-full" name="prodi" required>
                    <option disabled selected>-- PILIH JURUSAN TERLEBIH DAHULU--</option>
                </select>
            </div>
            <div class="form-control ">
                <label class="label">
                    <span class="label-text">Alamat</span>
                </label>
                <label class="">
                    <textarea name="alamat" class="p-3.5 input input-bordered rounded-sm w-full h-36 resize-none "
                        placeholder="alamat" required><?= $user['alamat'] ?></textarea>
                </label>
            </div>
            <div class="modal-action">
                <button type="submit" class="btn btn-secondary text-white rounded-sm mt-2">simpan perubahan</button>
                <label for="biodata" class="btn btn-circle btn-outline absolute top-6 right-5 btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </label>
            </div>
        </div>


    </form>
</div>
<input type="checkbox" id="akun" class="modal-toggle" />
<div class="modal bg-[#EDF4F8]/50">
    <form action="<?= BASEURL ?>/dashboard/account_update/<?= $data['user-type'] ?>" method="post" class="modal-box">
        <input type="number" name="account-id" class="hidden" value="<?= $user['id'] ?>">
        <h3 class="font-bold text-2xl mb-5">Update Akun</h3>
        <div class="flex gap-5">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Username Baru</span>
                </label>
                <label class="">
                    <input type="text" placeholder="Ketikan Username baru"
                        class="rounded-sm input w-full input-bordered" name="username" />
                </label>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Email Baru</span>
                </label>
                <label class="">
                    <input type="text" placeholder="Ketikan Email baru" class="rounded-sm input w-full input-bordered"
                        name="email" />
                </label>
            </div>
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Password Baru</span>
            </label>
            <label class="">
                <input type="password" name="new-password" placeholder="Ketikan Password baru"
                    class="rounded-sm input w-full input-bordered" />
            </label>
        </div>
        <div class="modal-action">
            <button type="submit" class="btn btn-secondary rounded-sm text-white">submit</button>
            <label for="akun" class="btn btn-circle btn-outline absolute top-6 right-5 btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </label>
        </div>
    </form>
</div>
<script src="<?= BASEURL ?>/js/sidebar.js"></script>
<script src="<?= BASEURL ?>/js/prodi.js"></script>
<script src="<?= BASEURL ?>/js/set_prodi.js"></script>
<script src="<?= BASEURL ?>/js/main.js"></script>