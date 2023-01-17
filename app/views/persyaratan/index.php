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
        <h1 class="text-3xl font-semibold mb-3">List Persyaratan</h1>
        <?php require_once "../app/views/templates/breadcrumbs.php" ?>
        <div class="my-5">
            <?= Flasher::flash(); ?>
        </div>
        <form action="<?= BASEURL ?>/persyaratan/add" method="post"
            class="mt-3 bg-base-100 rounded-2xl shadow-md grid grid-flow-row grid-cols-2 p-5 gap-5 transition-all hover:-translate-y-1">
            <h2 class="font-bold text-2xl col-span-2">Input Persyaratan Baru</h2>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Deskripsi Persyaratan</span>
                </label>
                <label>
                    <input type="text" class="input input-bordered rounded-sm" id="persyaratan" name="deskripsi"
                        placeholder="Ketikan Deskripsi persyaratannya" required />
                </label>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Kategori Persyaratan</span>
                </label>
                <select class="select rounded-sm select-bordered" id="kategori" name="kategori" required>
                    <option disabled selected>-- Pilih Kategori --</option>
                    <option value="Umum">Umum</option>
                    <option value="Teknis">Teknis</option>
                </select>
            </div>
            <div class="modal-action col-span-2 text-right">
                <button type="submit" class="btn btn-secondary text-white rounded-sm">tambah persyaratan</button>
            </div>
        </form>
        <table class="table w-full rounded-xs shadow-lg mt-5">
            <thead>
                <tr>
                    <th class="bg-base-100"></th>
                    <th class="bg-base-100">Deskripsi</th>
                    <th class="bg-base-100">Tipe</th>
                    <th class="bg-base-100"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['list-persyaratan'] as $persyaratan) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $persyaratan['deskripsi'] ?></td>
                    <td><?= $persyaratan['kategori'] ?></td>
                    <td>
                        <ul class="flex gap-2 items-center">
                            <li>
                                <a href="<?= BASEURL ?>/persyaratan/edit/<?= $persyaratan['id'] ?>"
                                    for="edit-requirement-<?= $persyaratan['id'] ?>"
                                    class="bg-primary hover:bg-info px-1.5 py-1 text-white rounded-sm uppercase flex items-center gap-1 cursor-pointer">
                                    <img src="<?= BASEURL ?>/img/info_white.svg" class="w-5" alt="info">
                                    <span class="font-semibold">ubah</span></a>
                            </li>
                            <li>
                                <label for="delete-requirement-<?= $persyaratan['id'] ?>"
                                    class="border-2 rounded-sm text-accent/50 border-accent/50 px-2 py-1 uppercase hover:text-white hover:bg-accent/50 hover:border-accent/0 flex items-center gap-1 cursor-pointer">
                                    <img src="<?= BASEURL ?>/img/delete_accent.svg" class="w-5" alt="delete">
                                    <span class="font-semibold">hapus</span></label>
                            </li>
                        </ul>


                    </td>
                </tr>
                <!-- Put this part before </body> tag -->
                <input type="checkbox" id="delete-requirement-<?= $persyaratan['id'] ?>" class="modal-toggle" />
                <div class="modal modal-bottom sm:modal-middle bg-[#EDF4F8]/50">
                    <div class="modal-box ">
                        <h3 class="font-bold text-2xl">Hapus Persyaratan</h3>
                        <p class="py-4 text-lg">Apakah anda yakin untuk menghapus persyaratan ini?</p>
                        <form action="<?= BASEURL ?>/persyaratan/delete/<?= $persyaratan['id'] ?>" method="post"
                            class="modal-action">
                            <button type="submit" name="delete-user-<?= $user['id'] ?>"
                                class="btn btn-sm btn-outline btn-accent rounded-sm">hapus</button>
                            <label for="delete-requirement-<?= $persyaratan['id'] ?>"
                                class="btn btn-sm rounded-sm btn-secondary text-white">batal</label>
                        </form>
                    </div>
                </div>
                <?php $i++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="<?= BASEURL ?>/js/sidebar.js"></script>