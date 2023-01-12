<div class="hero min-h-screen">
    <div class="bg-base-100 p-7 shadow-xl rounded-xl">
        <div>
            <h1 class="text-3xl font-bold">Registrasi Asesi</h1>

        </div>
        <div class="">
            <?= Flasher::flash() ?>
            <form action="<?= BASEURL ?>/signup/add" method="post" class="">
                <!-- NAMA LENGKAP DAN NIM -->
                <div class="form-control flex-row gap-5">
                    <div>
                        <label class="label">
                            <span class="label-text">Nama Lengkap</span>
                        </label>
                        <input type="text" placeholder="nama" class="rounded-sm input input-bordered" name="nama"
                            required />
                    </div>
                    <div>
                        <label class="label">
                            <span class="label-text">NIM</span>
                        </label>
                        <input type="number" placeholder="nim" class="rounded-sm input input-bordered" name="nim"
                            required />
                    </div>
                </div>

                <!-- JURUSAN DAN PRODI -->
                <div class="form-control flex-row gap-5">
                    <div>
                        <label class="label">
                            <span class="label-text">Jurusan</span>
                        </label>
                        <select class="select select-bordered w-full max-w-xs" name="jurusan" required>
                            <option disabled selected>-- PILIH JURUSAN --</option>
                            <option value="Teknik Informatika dan Komputer">Teknik Informatika dan Komputer</option>
                            <option value="Teknik Sipil">Teknik Sipil</option>
                            <option value="Teknik Mesin">Teknik Mesin</option>
                            <option value="Teknik Elektro">Teknik Elektro</option>
                            <option value="Teknik Grafika dan Penerbitan">Teknik Grafika dan Penerbitan</option>
                            <option value="Akuntansi">Akuntansi</option>
                            <option value="Administrasi Niaga">Administrasi Niaga</option>
                        </select>
                    </div>
                    <div>
                        <label class="label">
                            <span class="label-text">Prodi</span>
                        </label>
                        <select class="select select-bordered w-full max-w-xs" name="prodi" required>
                            <option disabled selected>-- PILIH JURUSAN TERLEBIH DAHULU--</option>
                        </select>
                    </div>


                </div>

                <!-- NO TELEPON DAN ALAMAT -->
                <div class="form-control flex-row gap-5">
                    <div class="flex flex-col justify-between">
                        <div>
                            <label class="label">
                                <span class="label-text">No Telepon</span>
                            </label>
                            <input type="text" placeholder="no telepon" class="rounded-sm input input-bordered"
                                name="no-telepon" required />
                        </div>
                        <div class="form-control self-center">
                            <label class="label-text">Jenis Kelamin</label>
                            <div class="flex gap-5">
                                <label class="form-control flex-row items-center gap-3">
                                    <input type="radio" class="radio-1" name="jenis-kelamin" value="Laki-laki"
                                        required />
                                    <span>Laki-laki</span>
                                </label>
                                <label class="form-control flex-row items-center gap-3">
                                    <input type="radio" class="radio-1" name="jenis-kelamin" value="Perempuan" />
                                    <span>Perempuan</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="label">
                            <span class="label-text">Alamat</span>
                        </label>
                        <textarea name="alamat" class="rounded-sm input input-bordered h-32" id="" placeholder="alamat"
                            required></textarea>

                    </div>
                </div>

                <div class="form-control flex-row gap-5">
                    <div>
                        <label class="label">
                            <span class="label-text">Username</span>
                        </label>
                        <input type="text" placeholder="username" class="rounded-sm input input-bordered"
                            name="username" required />
                    </div>
                    <div>
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="email" placeholder="email" class="rounded-sm input input-bordered" name="email"
                            required />
                    </div>
                    <div>
                        <label class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <input type="password" placeholder="password" class="rounded-sm input input-bordered"
                            name="password" required />
                    </div>
                    <div>
                        <label class="label">
                            <span class="label-text">Password Confirmation</span>
                        </label>
                        <input type="password" placeholder="password confirmation"
                            class="rounded-sm input input-bordered" name="password-confirmation" required />
                    </div>
                </div>

                <?php $otp_code = strtoupper(substr(md5(rand()), 0, 7)); ?>
                <input type="text" class="hidden" value="<?= $otp_code ?>" name="otp-code">
                <div class="form-control mt-6">
                    <button type="submit" class="btn btn-secondary text-white rounded-sm"
                        name="sign-up-btn">register</button>
                    <span>
                        Already have an account?
                        <a href="<?= BASEURL ?>/login" class="link link-info"> Login here</a>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= BASEURL ?>/js/prodi.js"></script>
<script src="<?= BASEURL ?>/js/main.js"></script>