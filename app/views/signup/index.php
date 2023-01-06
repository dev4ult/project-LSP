<div class="hero min-h-screen bg-base-200">
    <div class="hero-content flex-col">
        <div class="text-center">
            <h1 class="text-5xl font-bold">Registrasi Peserta</h1>
        </div>
        <div class="card flex-shrink-0 shadow-2xl bg-base-100">
            <?= Flasher::flash() ?>
            <form action="<?= BASEURL ?>/signup/add" method="post" class="card-body w-fit">
                <div class="form-control flex-row gap-5">
                    <div>
                        <label class="label">
                            <span class="label-text">Nama</span>
                        </label>
                        <input type="text" placeholder="nama" class="input input-bordered" name="nama" required />
                    </div>
                    <div>
                        <label class="label">
                            <span class="label-text">NIM</span>
                        </label>
                        <input type="number" placeholder="nim" class="input input-bordered" name="nim" required />
                    </div>
                    <div>
                        <label class="label">
                            <span class="label-text">No Telepon</span>
                        </label>
                        <input type="text" placeholder="no telepon" class="input input-bordered" name="no-telepon"
                            required />
                    </div>
                    <div>
                        <label class="label">
                            <span class="label-text">Alamat</span>
                        </label>
                        <input type="text" placeholder="alamat" class="input input-bordered" name="alamat" required />
                    </div>
                </div>

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
                    <script>
                    let prodi = {
                        'Teknik Informatika dan Komputer': [
                            'Teknik Informatika',
                            'Teknik Multimedia Digital',
                            'Teknik Multimedia dan Jaringan',
                            'Teknik Komputer dan Jaringan'
                        ],
                        'Teknik Sipil': [
                            'Konstruksi Sipil',
                            'Konstruksi Gedung',
                            'Teknik Perancangan Jalan dan Jembatan',
                            'Teknik Konstruksi Gedung',
                        ],
                        'Teknik Mesin': [
                            'Teknik Mesin',
                            'Teknik Mesin - PSDKU Kab. Demak',
                            'Teknik Konversi Energi',
                            'Manufaktur',
                            'Manufaktur - PSDKU Kab. Pekalongan',
                            'Pembangkit Tenaga Listrik',
                            'Teknologi Rekayasa Konversi Energi',
                            'Teknologi Rekayasa Perawatan Alat Berat',
                            'Magister Rekayasa Teknologi Manufaktur',
                        ],
                        'Teknik Elektro': [
                            'Elektronika Industri',
                            'Teknik Listrik',
                            'Telekomunikasi',
                            'Instrumentasi Kontrol Industri',
                            'Teknik Otomasi Listrik Industri',
                            'Broadband Multimedia',
                            'Magister Teknik Elektro',
                        ],
                        'Teknik Grafika dan Penerbitan': [
                            'Penerbitan',
                            'Teknik Grafika',
                            'Desain Grafis',
                            'Teknologi Industri Cetak Kemasan',
                        ],
                        'Akuntansi': [
                            'Akuntansi',
                            'Keuangan dan Perbankan',
                            'Akuntansi Keuangan',
                            'Keuangan dan Perbankan',
                            'Keuangan dan Perbankan Syariah',
                            'Manajemen Keuangan',
                            'Manajemen Pemasaran (WNBK',
                        ],
                        'Administrasi Niaga': [
                            'Administrasi Bisnis',
                            'Administrasi Bisnis Terapan',
                            'Usaha Jasa Konvensi, Perjalanan Insentif dan Pameran /MICE',
                            'Usaha Jasa Konvensi, Perjalanan Insentif dan Pameran /MICE - PSDKU Kab. Demak',
                            'Bahasa Inggris untuk Komunikasi Bisnis dan Profesional',
                        ],

                    };

                    // When an option is changed, search the above for matching choices
                    $('select[name="jurusan"]').on('change', function() {
                        // Set selected option as variable
                        var selectValue = $(this).val();

                        // Empty the target field
                        $('select[name="prodi"]').empty();

                        // For each chocie in the selected option
                        for (let i = 0; i < prodi[selectValue].length; i++) {
                            // Output choice in the target field
                            $('select[name="prodi"]').append("<option value='" + prodi[selectValue][i] +
                                "'>" + prodi[selectValue][i] + "</option>");
                        }
                    });
                    </script>
                    <div class="form-control self-center">
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
                <div class="form-control flex-row gap-5">
                    <div>
                        <label class="label">
                            <span class="label-text">Username</span>
                        </label>
                        <input type="text" placeholder="username" class="input input-bordered" name="username"
                            required />
                    </div>
                    <div>
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="email" placeholder="email" class="input input-bordered" name="email" required />
                    </div>
                    <div>
                        <label class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <input type="password" placeholder="password" class="input input-bordered" name="password"
                            required />
                    </div>
                    <div>
                        <label class="label">
                            <span class="label-text">Password Confirmation</span>
                        </label>
                        <input type="password" placeholder="password confirmation" class="input input-bordered"
                            name="password-confirmation" required />
                    </div>
                </div>

                <?php $otp_code = strtoupper(substr(md5(rand()), 0, 7)); ?>
                <input type="text" class="hidden" value="<?= $otp_code ?>" name="otp-code">
                <div class="form-control mt-6">
                    <button type="submit" class="btn btn-primary" name="sign-up-btn">Sign up</button>
                    <span>
                        Already have an account?
                        <a href="<?= BASEURL ?>/login" class="link link-info"> Login here</a>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>