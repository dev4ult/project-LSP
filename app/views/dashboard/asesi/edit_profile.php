<?php $user = $data['user'] ?>
<div class="min-h-screen w-full flex pb-5">

    <div class="pt-14 px-8 pr-12">
        <button type="button" id="hamburger" class="text-primary">
            <!-- hamburger icon -->
            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
                <path d="M64,384H448V341.33H64Zm0-106.67H448V234.67H64ZM64,128v42.67H448V128Z" />
            </svg>
        </button>
    </div>
    <div class="px-8">
        <h1 class="text-3xl font-bold pt-14 mb-3">Profil Saya</h1>

        <?php require_once "../app/views/templates/breadcrumbs.php" ?>
        <form action="<?= BASEURL ?>/dashboard/edit_profile/<?= $data['user-type'] ?>" method="post"
            class="bg-base-100 rounded-lg shadow-md p-5 mt-5">
            <div class="flex justify-between items-end border-b-2 border-slate-200 pb-5">
                <div class="flex gap-5">
                    <div class="form-control">
                        <label class="label" for="skema">
                            <span class="label-text">Username</span>
                        </label>
                        <label>
                            <input type="text" placeholder="Ketikan username-mu"
                                class="input rounded-sm w-full input-bordered" value="<?= $user['username'] ?>"
                                name="username" disabled />
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label" for="skema">
                            <span class="label-text">Email</span>
                        </label>
                        <label>
                            <input type="text" placeholder="Ketika email-mu"
                                class="input rounded-sm w-full input-bordered" value="<?= $user['email'] ?>"
                                name="email" disabled />
                        </label>
                    </div>
                </div>
                <label for="change-password" class="btn btn-outline btn-secondary rounded-sm hover:text-white">ubah
                    password</label>
            </div>
            <div class="pt-5 grid gap-5 grid-flow-row grid-cols-3">
                <div class="form-control">
                    <label class="label" for="skema">
                        <span class="label-text">Nama Lengkap</span>
                    </label>
                    <label>
                        <input type="text" placeholder="" class="input rounded-sm w-full input-bordered"
                            value="<?= $user['nama'] ?>" name="nama" required />
                    </label>
                </div>
                <div class="form-control">
                    <label class="label" for="skema">
                        <span class="label-text">NIM</span>
                    </label>
                    <label>
                        <input type="text" placeholder="" class="input rounded-sm w-full input-bordered"
                            value="<?= $user['nim'] ?>" name="nip" disabled />
                    </label>
                </div>
                <div class="form-control">
                    <label class="label" for="skema">
                        <span class="label-text">No Telepon</span>
                    </label>
                    <label>
                        <input type="text" class="input rounded-sm w-full input-bordered"
                            value="<?= $user['no_telepon'] ?>" name="no-telepon" required />
                    </label>
                </div>
                <div class="form-control row-span-2">
                    <label class="label">
                        <span class="label-text">Alamat</span>
                    </label>
                    <textarea name="alamat" class="rounded-sm w-full input input-bordered h-full resize-none p-3"
                        placeholder="alamat" required><?= $user['alamat'] ?></textarea>
                </div>
                <div class="form-control">
                    <label class="label" for="skema">
                        <span class="label-text">Jurusan</span>
                    </label>
                    <label>
                        <input type="text" class="input rounded-sm w-full input-bordered"
                            value="<?= $user['jurusan'] ?>" name="jurusan" disabled />
                    </label>
                </div>
                <div class="form-control">
                    <label class="label" for="skema">
                        <span class="label-text">Jenis Kelamin</span>
                    </label>
                    <label>
                        <select name="jenis-kelamin" class="select select-bordered rounded-sm w-full max-w-xs" disabled>
                            <option value="Laki-laki"
                                <?= $user['jenis_kelamin'] == "Laki-laki"  ? "selected disabled" : "" ?>>Laki-laki
                            </option>
                            <option value="Perempuan"
                                <?= $user['jenis_kelamin'] == "Perempuan"  ? "selected disabled" : "" ?>>Perempuan
                            </option>
                        </select>

                    </label>
                </div>
                <div class="form-control">
                    <label class="label" for="skema">
                        <span class="label-text">Prodi</span>
                    </label>
                    <label>
                        <input type="text" class="input rounded-sm w-full input-bordered" value="<?= $user['prodi'] ?>"
                            name="prodi" disabled />
                    </label>
                </div>

                <div class="modal-action col-span-3">
                    <button type="submit" class="btn btn-secondary text-white rounded-sm ml-auto">simpan
                        perubahan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<input type="checkbox" id="change-password" class="modal-toggle" />
<div class="modal bg-[#EDF4F8]/50">
    <form action="<?= BASEURL ?>/dashboard/change_password/asesi" method="post" class="modal-box">
        <h3 class="font-bold text-xl mb-3">Ubah Password</h3>
        <input type="number" name="account-id" value="<?= $user['id'] ?>" class="hidden" />
        <div class="grid grid-flow-row grid-cols-2 gap-5">
            <div class="form-control">
                <label class="label" for="skema">
                    <span class="label-text">Password Baru</span>
                </label>
                <label>
                    <input type="password" placeholder="Ketikan Password Baru-mu"
                        class="input rounded-sm w-full input-bordered" name="new-password" required />
                </label>
            </div>
            <div class="form-control">
                <label class="label" for="skema">
                    <span class="label-text">Konfirmasi Password Baru</span>
                </label>
                <label>
                    <input type="password" placeholder="Ketikan Password Baru-mu untuk Konfirmasi"
                        class="input rounded-sm w-full input-bordered" name="new-password-confirmation" required />
                </label>
            </div>
            <div class="form-control">
                <label class="label" for="skema">
                    <span class="label-text">Password Lama</span>
                </label>
                <label>
                    <input type="password" placeholder="Ketikan Password Lama-mu"
                        class="input rounded-sm w-full input-bordered" name="old-password" required />
                </label>
            </div>
            <div class="modal-action">
                <button type="submit" class="btn btn-secondary text-white rounded-sm mt-auto">ubah</button>
                <label for="change-password" class="btn btn-circle btn-outline absolute top-6 right-5 btn-sm">
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
<script src="<?= BASEURL ?>/js/sidebar.js">
</script>