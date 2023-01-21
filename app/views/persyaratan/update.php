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
        <h1 class="text-3xl font-semibold mb-3">Ubah Persyaratan</h1>
        <?php require_once "../app/views/templates/breadcrumbs.php" ?>
        <form action="<?= BASEURL ?>/persyaratan/update/<?= $data['persyaratan-id'] ?>" method="post"
            class="mt-3 bg-base-100 rounded-2xl shadow-md grid grid-flow-row grid-cols-2 p-5 gap-5 transition-all hover:-translate-y-1">
            <h2 class="font-bold text-2xl col-span-2">Ubah Persyaratan</h2>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Deskripsi Persyaratan</span>
                </label>
                <label>
                    <input type="text" class="input input-bordered rounded-sm" id="persyaratan" name="deskripsi"
                        value="<?= $data['deskripsi']  ?>" placeholder="Ketikan Deskripsi persyaratannya" required />
                </label>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Kategori Persyaratan</span>
                </label>
                <?php $kategori = $data['kategori'] ?>
                <select class="select rounded-sm select-bordered" id="kategori" name="kategori" required>
                    <option disabled>-- Pilih Kategori --</option>
                    <option <?= $kategori == "Umum" ? "selected" : "" ?> value="Umum">Umum</option>
                    <option <?= $kategori == "Teknis" ? "selected" : "" ?> value="Teknis">Teknis</option>
                </select>
            </div>
            <div class="modal-action col-span-2 text-right">
                <button type="submit" class="btn btn-secondary text-white rounded-sm">ubah persyaratan</button>
            </div>
        </form>

    </div>

</div>
<script src="<?= BASEURL ?>/js/sidebar.js"></script>