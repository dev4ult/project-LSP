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
                <td>Jurusan</td>
                <td class="px-5">:</td>
                <td id="nama-jurusan"><?= $user["jurusan"] ?></td>
            </tr>
            <tr class="text-2xl font-semibold">
                <td>Prodi</td>
                <td class="px-5">:</td>
                <td id="nama-prodi"><?= $user["prodi"] ?></td>
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
        <div class="flex gap-5">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Jurusan</span>
                </label>
                <select class="select select-bordered w-full max-w-xs" name="jurusan" required>
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

            let selectedJurusan = $('#nama-jurusan').text();
            let selectedProdi = $('#nama-prodi').text();

            $('select[name="prodi"]').empty();
            for (let i = 0; i < prodi[selectedJurusan].length; i++) {
                // Output choice in the target field
                $('select[name="prodi"]').append("<option " + (selectedProdi == prodi[selectedJurusan][i] ?
                        "disabled selected" : "") + " value='" + prodi[selectedJurusan][i] +
                    "'>" + prodi[selectedJurusan][i] + "</option>");
            }

            // When an option is changed, search the above for matching choices
            $('select[name="jurusan"]').on('change', function() {
                // Set selected option as variable
                selectedJurusan = $(this).val();

                // Empty the target field
                $('select[name="prodi"]').empty();

                // For each chocie in the selected option
                for (let i = 0; i < prodi[selectedJurusan].length; i++) {
                    // Output choice in the target field
                    $('select[name="prodi"]').append("<option value='" + prodi[selectedJurusan][i] +
                        "'>" + prodi[selectedJurusan][i] + "</option>");
                }
            });
            </script>
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