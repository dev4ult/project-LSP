<?php $user = $data['user']; ?>
<?= Flasher::flash() ?>
<div class="min-h-screen w-full">
    <div class="rounded-lg shadow-md p-5">
        <div class="flex justify-between">
            <h3 class="font-bold text-3xl uppercase underline">Biodata</h3>
            <label for="biodata" class="btn btn-sm">edit</label>
        </div>
        <table class="mt-5">
            <tr class="text-2xl font-semibold">
                <td>Nama</td>
                <td class="px-5">:</td>
                <td><?= $user["nama"] ?></td>
            </tr>
            <tr class="text-2xl font-semibold">
                <td>NIM</td>
                <td class="px-5">:</td>
                <td><?= $user["nim"] ?></td>
            </tr>
            <tr class="text-2xl font-semibold">
                <td>No Telepon</td>
                <td class="px-5">:</td>
                <td><?= $user["no_telepon"] ?></td>
            </tr>
            <tr class="text-2xl font-semibold">
                <td>Alamat</td>
                <td class="px-5">:</td>
                <td><?= $user["alamat"] ?></td>
            </tr>
            <tr class="text-2xl font-semibold">
                <td>Pendidikan Terakhir</td>
                <td class="px-5">:</td>
                <td><?= $user["pendidikan_terakhir"] ?></td>
            </tr>
        </table>
    </div>
    <div class="rounded-lg shadow-md p-5 mt-5">
        <div class="flex justify-between">
            <h3 class="font-bold text-3xl uppercase underline">Akun</h3>
            <label for="akun" class="btn btn-sm">edit</label>
        </div>
        <table class="mt-5">
            <tr class="text-2xl font-semibold">
                <td>Username</td>
                <td class="px-5">:</td>
                <td><?= $user["username"] ?></td>
            </tr>
            <tr class="text-2xl font-semibold">
                <td>Email</td>
                <td class="px-5">:</td>
                <td><?= $user["email"] ?></td>
            </tr>
            <tr class="text-2xl font-semibold">
                <td>Password</td>
                <td class="px-5">:</td>
                <td>*******</td>
            </tr>
        </table>
    </div>
</div>
<input type="checkbox" id="biodata" class="modal-toggle" />
<div class="modal">
    <form action="<?= BASEURL ?>/dashboard/bio_update/<?= $data['user-type'] ?>" method="post" class="modal-box">
        <input type="number" name="account-id" class="hidden" value="<?= $user['id'] ?>">

        <input type="number" name="bio-id" class="hidden" value="<?= $user['id_biodata_asesi'] ?>">
        <h3 class="font-bold text-lg">Update Biodata <?= $user['nama'] ?></h3>
        <div class="flex gap-5">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Nama</span>
                </label>
                <label class="input-group input-group-md">
                    <input type="text" placeholder="Type here" class="input input-bordered input-md" name="nama"
                        value="<?= $user['nama'] ?>" />
                </label>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">NIM</span>
                </label>
                <label class="input-group input-group-md">
                    <input type="number" placeholder="Type here" class="input input-bordered input-md" name="nim"
                        value="<?= $user['nim'] ?>" />
                </label>
            </div>
        </div>
        <div class="flex gap-5">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">No Telepon</span>
                </label>
                <label class="input-group input-group-md">
                    <input type="text" placeholder="Type here" class="input input-bordered input-md" name="no_telepon"
                        value="<?= $user['no_telepon'] ?>" />
                </label>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Alamat</span>
                </label>
                <label class="input-group input-group-md">
                    <input type="text" placeholder="Type here" class="input input-bordered input-md" name="alamat"
                        value="<?= $user['alamat'] ?>" />
                </label>
            </div>
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Pendidikan Terakhir</span>
            </label>
            <label class="input-group input-group-md">
                <input type="text" placeholder="Type here" class="input input-bordered input-md"
                    name="pendidikan_terakhir" value="<?= $user['pendidikan_terakhir'] ?>" />
            </label>
        </div>
        <div class="mt-3">
            <label class="label-text">Jenis Kelamin</label>
            <div class="flex gap-5">
                <label class="form-control flex-row items-center gap-3">
                    <input type="radio" class="radio-1" name="jenis-kelamin" value="Laki-laki"
                        <?= $user['jenis_kelamin'] == 'Laki-laki' ? "checked" : "" ?> />
                    <span>Laki-laki</span>
                </label>
                <label class="form-control flex-row items-center gap-3">
                    <input type="radio" class="radio-1" name="jenis-kelamin" value="Perempuan"
                        <?= $user['jenis_kelamin'] == 'Perempuan' ? "checked" : "" ?> />
                    <span>Perempuan</span>
                </label>
            </div>
        </div>
        <div class="modal-action">
            <button type="submit" class="btn btn-sm">Save Changes</button>
            <label for="biodata" class="btn btn-sm btn-outline">Cancel</label>
        </div>
    </form>
</div>
<input type="checkbox" id="akun" class="modal-toggle" />
<div class="modal">
    <form action="<?= BASEURL ?>/dashboard/account_update/<?= $data['user-type'] ?>" method="post" class="modal-box">
        <input type="number" name="account-id" class="hidden" value="<?= $user['id'] ?>">
        <h3 class="font-bold text-lg">Update Akun <?= $user['username'] ?></h3>
        <div class="flex gap-5">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Username</span>
                </label>
                <label class="input-group input-group-md">
                    <input type="text" placeholder="Type here" class="input input-bordered input-md" name="username"
                        value="<?= $user['username'] ?>" />
                </label>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <label class="input-group input-group-md">
                    <input type="text" placeholder="Type here" class="input input-bordered input-md" name="email"
                        value="<?= $user['email'] ?>" />
                </label>
            </div>
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">New Password</span>
            </label>
            <label class="input-group input-group-md">
                <input type="password" name="new-password" placeholder="Type here"
                    class="input input-bordered input-md" />
            </label>
        </div>

        <div class="modal-action">
            <button type="submit" class="btn btn-sm">Save Changes</button>
            <label for="akun" class="btn btn-sm btn-outline">Cancel</label>
        </div>
    </form>
</div>