<div class="hero min-h-screen">
    <?= Flasher::flash() ?>
    <div class="bg-base-100 p-7 shadow-xl rounded-xl">
        <div>
            <h1 class="text-3xl font-bold">Registrasi Asesi</h1>
        </div>
        <form action="<?= BASEURL ?>/signup/add" method="post" class="flex">
            <div class="grid place-content-start grid-cols-2 gap-x-5 gap-y-3 pr-7 border-r-2 border-slate-200">
                <!-- NAMA LENGKAP DAN NIM -->
                <div class="h-fit ">
                    <label class="label">
                        <span class="label-text">Nama Lengkap</span>
                    </label>
                    <input type="text" placeholder="Ketikan nama lengkap" class="rounded-sm w-full input input-bordered"
                        name="nama" required />
                </div>
                <div class="h-fit ">
                    <label class="label">
                        <span class="label-text">NIM</span>
                    </label>
                    <input type="number" placeholder="nim" class="rounded-sm w-full input input-bordered" name="nim"
                        required />
                </div>

                <!-- JURUSAN DAN PRODI -->
                <div class="h-fit ">
                    <label class="label">
                        <span class="label-text">Jurusan</span>
                    </label>
                    <select class="select select-bordered rounded-sm w-full" name="jurusan" required>
                        <option disabled selected class="text-slate-300">-- PILIH JURUSAN --</option>
                        <option value="Teknik Informatika dan Komputer">Teknik Informatika dan Komputer</option>
                        <option value="Teknik Sipil">Teknik Sipil</option>
                        <option value="Teknik Mesin">Teknik Mesin</option>
                        <option value="Teknik Elektro">Teknik Elektro</option>
                        <option value="Teknik Grafika dan Penerbitan">Teknik Grafika dan Penerbitan</option>
                        <option value="Akuntansi">Akuntansi</option>
                        <option value="Administrasi Niaga">Administrasi Niaga</option>
                    </select>
                </div>
                <div class="h-fit ">
                    <label class="label">
                        <span class="label-text">Prodi</span>
                    </label>
                    <select class="select select-bordered rounded-sm w-full" name="prodi" required>
                        <option disabled selected class="text-slate-300">-- PILIH JURUSAN TERLEBIH DAHULU--</option>
                    </select>
                </div>

                <!-- NO TELEPON, JENIS KELAMIN DAN ALAMAT -->
                <div class="flex flex-col gap-6 h-fit">
                    <div>
                        <label class="label">
                            <span class="label-text">No Telepon</span>
                        </label>
                        <input type="text" placeholder="no telepon" class="rounded-sm w-full input input-bordered"
                            name="no-telepon" required />
                    </div>
                    <div class="form-control">
                        <label class="label-text mb-2">Jenis Kelamin</label>
                        <div class="flex gap-2 justify-between">
                            <label
                                class="form-control flex-row items-center gap-3 border-2 rounded-sm border-slate-200 py-2 pl-3 pr-10">
                                <input type="radio" class="radio-1 radio " name="jenis-kelamin" value="Laki-laki"
                                    required />
                                <span>Laki-laki</span>
                            </label>
                            <label
                                class="form-control flex-row items-center gap-3 border-2 rounded-sm border-slate-200 py-2 pl-3 pr-10">
                                <input type="radio" class="radio-1 radio" name="jenis-kelamin" value="Perempuan" />
                                <span>Perempuan</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="h-fit">
                    <label class="label">
                        <span class="label-text">Alamat</span>
                    </label>
                    <textarea name="alamat" class="rounded-sm w-full input input-bordered h-36 resize-none" id=""
                        placeholder="alamat" required></textarea>
                </div>
                <div class="col-span-2 pt-10">
                    <p class="w-fit ml-auto ">Sudah punya akun? <a href="<?= BASEURL ?>/login"
                            class="link-primary">Login</a></p>
                </div>
            </div>
            <div class="pl-7 flex flex-col gap-3">
                <div>
                    <label class="label">
                        <span class="label-text">Username</span>
                    </label>
                    <input type="text" placeholder="username" class="rounded-sm w-full input input-bordered"
                        name="username" required />
                </div>
                <div>
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" placeholder="email" class="rounded-sm w-full input input-bordered" name="email"
                        required />
                </div>
                <div>
                    <label class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input type="password" placeholder="password" class="rounded-sm w-full input input-bordered"
                        name="password" required />
                </div>
                <div>
                    <label class="label">
                        <span class="label-text">Password Confirmation</span>
                    </label>
                    <input type="password" placeholder="password confirmation"
                        class="rounded-sm w-full input input-bordered" name="password-confirmation" required />
                </div>

                <?php $otp_code = strtoupper(substr(md5(rand()), 0, 7)); ?>
                <input type="text" class="hidden" value="<?= $otp_code ?>" name="otp-code">
                <div class="form-control mt-6">
                    <button type="submit" class="btn btn-secondary text-white rounded-sm"
                        name="sign-up-btn">register</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="<?= BASEURL ?>/js/prodi.js"></script>
<script src="<?= BASEURL ?>/js/main.js"></script>