<?php $nomor_induk = $data['user-type'] == "asesor" ? "nip" : "nim" ?>
<?= Flasher::flash() ?>

<div class="min-h-screen w-full flex">
    <div class="pt-14 pr-8 px-12">
        <button type="button" id="hamburger" class="text-primary">
            <!-- hamburger icon -->
            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
                <path d="M64,384H448V341.33H64Zm0-106.67H448V234.67H64ZM64,128v42.67H448V128Z" />
            </svg>
        </button>
    </div>
    <div class="overflow-x-auto px-8">
        <h1 class="text-3xl font-bold pt-14 mb-3">List <?= ucfirst($data['user-type']) ?></h1>
        <?php require_once "../app/views/templates/breadcrumbs.php" ?>
        <div class="flex justify-between items-center gap-5 my-5">
            <?php require_once "../app/views/dashboard/admin/form/add_" . $data['user-type'] . ".php" ?>
            <?php require_once "../app/views/dashboard/admin/form/pagination.php" ?>
        </div>
        <table class="table w-full rounded-xs shadow-lg">
            <thead>
                <tr>
                    <th class="bg-base-100"></th>
                    <th class="bg-base-100">Nama Lengkap</th>
                    <th class="uppercase bg-base-100"><?= $nomor_induk ?></th>
                    <th class="bg-base-100">No Telepon</th>
                    <th class="bg-base-100">Email</th>
                    <th class="bg-base-100"></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = ($data['page'] - 1) * (int)$data['limit'] + 1; ?>
                <?php foreach ($data['list-user'] as $user) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $user['nama'] ?></td>
                    <td><?= $user[$nomor_induk] ?></td>
                    <td><?= $user['no_telepon'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td>
                        <ul class="flex gap-2 items-center">
                            <li>
                                <a href="<?= BASEURL ?>/dashboard/user_detail/<?= $data['user-type'] ?>/<?= $user['id'] ?>"
                                    class="bg-primary hover:bg-info px-1.5 py-1 text-white rounded-sm uppercase flex items-center gap-1">
                                    <img src="<?= BASEURL ?>/img/info_white.svg" class="w-5" alt="info">
                                    <span class="font-semibold">info</span></a>
                            </li>
                            <li>
                                <label for="delete-user-<?= $user['id'] ?>"
                                    class="border-2 rounded-sm text-accent/50 border-accent/50 px-2 py-1 uppercase cursor-pointer hover:text-white hover:bg-accent/50 hover:border-accent/0 flex items-center gap-1">
                                    <img src="<?= BASEURL ?>/img/delete_accent.svg" class="w-5" alt="delete">
                                    <span class="font-semibold">hapus</span></label>
                            </li>
                        </ul>
                    </td>
                </tr>
                <!-- Put this part before </body> tag -->
                <input type="checkbox" id="delete-user-<?= $user['id'] ?>" class="modal-toggle" />
                <div class="modal modal-bottom sm:modal-middle bg-[#EDF4F8]/50">
                    <div class="modal-box ">
                        <h3 class="font-bold text-2xl">Hapus <?= ucfirst($data['user-type']) ?></h3>
                        <p class="py-4 text-lg">Apakah anda yakin untuk menghapus asesor ini?</p>
                        <form action="<?= BASEURL ?>/dashboard/delete_user/<?= $data['user-type'] ?>/<?= $user['id'] ?>"
                            method="post" class="modal-action">
                            <button type="submit" name="delete-user-<?= $user['id'] ?>"
                                class="btn btn-sm btn-outline btn-accent rounded-sm">hapus</button>
                            <label for="delete-user-<?= $user['id'] ?>"
                                class="btn btn-sm rounded-sm btn-secondary text-white">batal</label>
                        </form>
                    </div>
                </div>
                <?php $i++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php require_once "../app/views/templates/pagination_bottom.php" ?>
    </div>
</div>
<script src="<?= BASEURL ?>/js/sidebar.js"></script>