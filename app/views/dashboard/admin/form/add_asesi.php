<div class="flex gap-3 items-center">
    <label for="add-user" class="btn btn-sm my-5">asesi baru</label>
    <div class="form-control">
        <form action="<?= BASEURL ?>/dashboard/user_list/asesi/" method="post" class="input-group input-group-sm">
            <input type="text" name="search-key" placeholder="Search…" class="input input-sm input-bordered" />
            <button class="btn btn-square btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </form>
    </div>
</div>
<input type="checkbox" id="add-user" class="modal-toggle" />
<div class="modal">
    <form action="<?= BASEURL ?>/dashboard/add_user/asesi" method="post" class="modal-box">
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
                    <input type="password" name="password" placeholder="Type here" class="input input-bordered input-md"
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
                        <span class="label-text">NIM</span>
                    </label>
                    <label class="input-group input-group-md">
                        <input type="number" placeholder="Type here" class="input input-bordered input-md" name="nim"
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
                        <span class="label-text">Alamat</span>
                    </label>
                    <label class="input-group input-group-md">
                        <input type="text" placeholder="Type here" class="input input-bordered input-md" name="alamat"
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
            <div class="flex gap-5 items-center">
                <div class="form-control">
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

        </div>
        <div class="modal-action">
            <button type="submit" class="btn btn-sm">Submit</button>
            <label for="add-user" class="btn btn-sm btn-outline">Cancel</label>
        </div>
    </form>
</div>