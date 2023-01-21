<div class="min-h-screen w-full flex">
    <div class="pt-14 pr-8 px-12">
        <button type="button" id="hamburger" class="text-primary">
            <!-- hamburger icon -->
            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
                <path d="M64,384H448V341.33H64Zm0-106.67H448V234.67H64ZM64,128v42.67H448V128Z" />
            </svg>
        </button>
    </div>
    <div class="p-8 pt-14">
        <h1 class="text-2xl font-semibold mb-3">Edit Kompetensi</h1>
        <?php require_once "../app/views/templates/breadcrumbs.php" ?>
        <div class="my-5 bg-base-100 p-10 rounded-2xl shadow-md transition-all hover:-translate-y-1">
            <form action="<?= BASEURL ?>/skema/edit_asesmen_post/<?= $data['id-kompetensi'] ?>/<?= $data['id-skema'] ?>"
                method="post" class="grid grid-flow-row grid-cols-2 gap-5" enctype="multipart/form-data">
                <div class="form-control">
                    <label class="label" for="nama-kompetensi">
                        <span class="label-text">Nama
                            Kompetensi</span>
                    </label>
                    <input type="text" value="<?= $data['list-kompetensi']['nama_kompetensi']; ?>" placeholder=""
                        class="input input-bordered rounded-sm" id="nama-kompetensi" name="nama-kompetensi" required />
                </div>
                <div class="form-control">
                    <label class="label" for="pelaksanaan">
                        <span class="label-text">Jenis
                            Pelaksanaan</span>
                    </label>
                    <select class="select select-bordered rounded-sm" id="pelaksanaan" name="pelaksanaan" required>
                        <?php if ($data['list-kompetensi']['jenis_pelaksanaan'] == "Offline") : ?>
                        <option disabled>-- Pilih Pelaksanaan --</option>
                        <option value="Offline" selected>Offline</option>
                        <option value="Online">Online</option>
                        <?php else : ?>
                        <option disabled>-- Pilih Pelaksanaan --</option>
                        <option value="Offline">Offline</option>
                        <option value="Online" selected>Online</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="waktu flex flex-wrap justify-between items-center gap-3">
                    <div class="form-control w-[240px]">
                        <label class="label" for="jam-mulai">
                            <span class="label-text">Mulai
                                Ujian</span>
                        </label>
                        <input type="time" value="<?= $data['list-kompetensi']['jam_mulai']; ?>" placeholder=""
                            class="input input-bordered rounded-sm" id="jam-mulai" name="jam-mulai" required />
                    </div>
                    <div class="form-control w-[240px]">
                        <label class="label" for="jam-akhir">
                            <span class="label-text">Selesai
                                Ujian</span>
                        </label>
                        <input type="time" value="<?= $data['list-kompetensi']['jam_akhir']; ?>" placeholder=""
                            class="input input-bordered rounded-sm" id="jam-akhir" name="jam-akhir" required />
                    </div>
                </div>
                <div class="form-control w-full">
                    <label class="label" for="tgl-kompetensi">
                        <span class="label-text">Tanggal
                            Ujian</span>
                    </label>
                    <input type="date" value="<?= $data['list-kompetensi']['tgl_ujian_kompetensi']; ?>" placeholder=""
                        class="input input-bordered rounded-sm" id="tgl-kompetensi" name="tgl-kompetensi" required />
                </div>
                <div class="form-control">
                    <label class="label" for="tempat-kompetensi">
                        <span class="label-text">Tempat
                            Ujian Kompetensi</span>
                    </label>
                    <input type="text" value="<?= $data['list-kompetensi']['tempat_unit_kompetensi']; ?>" placeholder=""
                        class="input input-bordered rounded-sm" id="tempat-kompetensi" name="tempat-kompetensi"
                        required />
                </div>
                <div class="form-control">
                    <label class="label" for="soal-kompetensi">
                        <span class="label-text">Soal Ujian</span>
                    </label>
                    <input type="file" placeholder="" class="file-input file-input-secondary rounded-sm"
                        id="soal-kompetensi" name="soal-kompetensi" />
                    <span><?= $data['list-kompetensi']['file_opsional']; ?></span>
                </div>
                <div class="col-span-2 text-right">
                    <button type="submit" name="ubah" class="btn btn-secondary rounded-sm text-white my-5">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= BASEURL ?>/js/sidebar.js"></script>