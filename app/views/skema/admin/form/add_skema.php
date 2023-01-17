<div class="flex gap-3 items-center justify-between my-5">
    <label for="add-skema"
        class="flex items-center bg-gradient-to-r from-primary to-info rounded-sm py-2 px-2 gap-2 cursor-pointer hover:bg-gradient-to-r hover:from-info hover:to-info">
        <img src="<?= BASEURL ?>/img/collections_bookmark_white.svg" alt="person add" class="w-6">
        <span class="font-semibold uppercase text-white">skema baru</span>
    </label>
    <div class="form-control">
        <form action="<?= BASEURL ?>/skema/list" method="post"
            class="bg-['#EDF4F8'] flex items-center rounded-sm overflow-hidden">
            <input type="text" name="search-key" placeholder="Search…" class="input rounded-none" />
            <button type="submit"
                class="btn btn-square bg-base-100 text-black rounded-none hover:border-base-100 border-base-100 hover:bg-base-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </form>
    </div>
</div>
<input type="checkbox" id="add-skema" class="modal-toggle" />
<div class="modal bg-[#EDF4F8]/50 p-10">
    <form action="<?= BASEURL ?>/skema/add" method="post" class="modal-box max-w-none w-fit">
        <h2 class="text-3xl font-semibold mb-5">Tambah Skema</h2>
        <div class="grid grid-flow-row grid-cols-2 gap-5">
            <div class="form-control">
                <label class="label" for="skema">
                    <span class="label-text">Judul Skema Profesi</span>
                </label>
                <label>
                    <input type="text" placeholder="Ketikan Judul Skema Sertifikasi-nya"
                        class="input rounded-sm w-full input-bordered" id="skema" name="skema" required />
                </label>
            </div>
            <div class="form-control">
                <label class="label" for="level">
                    <span class="label-text">Level
                        KKNI</span>
                </label>
                <select class="select rounded-sm w-full select-bordered" id="level" name="level" required>
                    <option disabled selected>-- Pilih Level --</option>
                    <option value="Level I">Level I</option>
                    <option value="Level II">Level II</option>
                    <option value="Level III">Level III</option>
                    <option value="Level IV">Level IV</option>
                    <option value="Level V">Level V</option>
                </select>
            </div>
            <div class="form-control">
                <label class="label" for="jurusan">
                    <span class="label-text">Jurusan</span>
                </label>
                <select class="select rounded-sm w-full select-bordered" id="jurusan" name="jurusan">
                    <option disabled selected>-- Pilih Jurusan --</option>
                    <?php foreach ($data['list-jurusan'] as $jurusan) : ?>
                    <option value="<?= $jurusan['id']; ?>"><?= $jurusan['nama']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-control">
                <label class="label" for="SKKNI">
                    <span class="label-text">SKK/KKNI
                        LSP</span>
                </label>
                <select class="select rounded-sm w-full select-bordered" id="SKKNI" name="SKKNI" required>
                    <option disabled selected>-- Pilih SKK/KKNI --</option>
                    <?php foreach ($data['list-skkni'] as $skkni) : ?>
                    <option value="<?= $skkni['skkni']; ?>"><?= $skkni['skkni']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-control">
                <label class="label" for="status">
                    <span class="label-text">Status</span>
                </label>
                <select class="select rounded-sm w-full select-bordered" id="status" name="status">
                    <option disabled selected>-- Pilih Status --</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Nonaktif">Nonaktif</option>
                </select>
            </div>
            <div class="form-control">
                <label class="label" for="asesor">
                    <span class="label-text">Asesor</span>
                </label>
                <select class="select rounded-sm w-full select-bordered" id="asesor" name="asesor">
                    <option disabled selected>-- Pilih Asesor --</option>
                    <?php foreach ($data['list-asesor'] as $asesor) : ?>
                    <option value="<?= $asesor['id'] ?>"><?= $asesor['nama']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="modal-action col-span-2 ml-auto">
                <button type="submit" name="submit" class="btn btn-secondary rounded-sm text-white">submit</button>
                <label for="add-skema" class="btn btn-circle btn-outline absolute top-6 right-5 btn-sm">
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