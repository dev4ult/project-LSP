<label for="add-user" class="btn btn-sm my-5">asesor baru</label>
<input type="checkbox" id="add-user" class="modal-toggle" />
<div class="modal">
    <form action="<?= BASEURL ?>/dashboard/add_user/asesor" method="post" class="modal-box">
        <h3 class="font-bold text-lg">Akun</h3>
        <div>
            <div class="flex gap-5">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Username</span>
                    </label>
                    <label class="input-group input-group-md">
                        <input type="text" placeholder="Type here" class="input input-bordered input-md" name="username"
                            required />
                    </label>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <label class="input-group input-group-md">
                        <input type="text" placeholder="Type here" class="input input-bordered input-md" name="email"
                            required />
                    </label>
                </div>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Password</span>
                </label>
                <label class="input-group input-group-md">
                    <input type="text" name="password" placeholder="Type here" class="input input-bordered input-md"
                        required />
                </label>
            </div>
        </div>
        <h3 class="font-bold text-lg mt-3">Biodata</h3>
        <div>
            <div class="flex gap-5">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Nama</span>
                    </label>
                    <label class="input-group input-group-md">
                        <input type="text" placeholder="Type here" class="input input-bordered input-md" name="nama"
                            required />
                    </label>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">NIP</span>
                    </label>
                    <label class="input-group input-group-md">
                        <input type="number" placeholder="Type here" class="input input-bordered input-md" name="nip"
                            required />
                    </label>
                </div>
            </div>
            <div class="flex gap-5">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">No Telepon</span>
                    </label>
                    <label class="input-group input-group-md">
                        <input type="text" placeholder="Type here" class="input input-bordered input-md"
                            name="no_telepon" required />
                    </label>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">NIK</span>
                    </label>
                    <label class="input-group input-group-md">
                        <input type="number" placeholder="Type here" class="input input-bordered input-md" name="nik"
                            required />
                    </label>
                </div>
            </div>
            <div class="flex gap-5">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Tempat Lahir</span>
                    </label>
                    <label class="input-group input-group-md">
                        <input type="text" placeholder="Type here" class="input input-bordered input-md"
                            name="tempat_lahir" required />
                    </label>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Tanggal Lahir</span>
                    </label>
                    <label class="input-group input-group-md">
                        <input type="date" placeholder="Type here" class="input input-bordered input-md"
                            name="tanggal_lahir" required />
                    </label>
                </div>
            </div>
            <div class="flex gap-5">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Pendidikan Terakhir</span>
                    </label>
                    <label class="input-group input-group-md">
                        <input type="text" placeholder="Type here" class="input input-bordered input-md"
                            name="pendidikan_terakhir" required />
                    </label>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Alamat</span>
                    </label>
                    <label class="input-group input-group-md">
                        <input type="text" placeholder="Type here" class="input input-bordered input-md" name="alamat"
                            required />
                    </label>
                </div>
            </div>
            <div class="mt-3">
                <label class="label-text">Jenis Kelamin</label>
                <div class="flex gap-5">
                    <label class="form-control flex-row items-center gap-3">
                        <input type="radio" class="radio-1" name="jenis-kelamin" value="Laki-laki" required />
                        <span>Laki-laki</span>
                    </label>
                    <label class="form-control flex-row items-center gap-3">
                        <input type="radio" class="radio-1" name="jenis-kelamin" value="Perempuan" />
                        <span>Perempuan</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="modal-action">
            <button type="submit" class="btn btn-sm">Submit</button>
            <label for="add-user" class="btn btn-sm btn-outline">Cancel</label>
        </div>
    </form>
</div>