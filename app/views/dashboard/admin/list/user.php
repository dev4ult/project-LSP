<?php $nomor_induk = $data['user-type'] == "asesor" ? "nip" : "nim" ?>
<?= Flasher::flash() ?>

<div class="min-h-screen w-full">
    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
                <tr>
                    <th></th>
                    <th>Username</th>
                    <th>Name</th>
                    <th class="uppercase"><?= $nomor_induk ?></th>
                    <th>Phone Number</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = ($data['page'] - 1) * (int)$data['limit'] + 1; ?>
                <?php foreach ($data['list-user'] as $user) : ?>
                <tr>
                    <th><?= $i ?></th>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['nama'] ?></td>
                    <td><?= $user[$nomor_induk] ?></td>
                    <td><?= $user['no_telepon'] ?></td>

                    <td><a href="<?= BASEURL ?>/dashboard/user_detail/<?= $data['user-type'] ?>/<?= $user['id'] ?>"
                            class="btn btn-sm">detail</a>
                        <label for="delete-user-<?= $user['id'] ?>" class="btn btn-sm btn-outline">delete</label>
                    </td>
                </tr>
                <!-- Put this part before </body> tag -->
                <input type="checkbox" id="delete-user-<?= $user['id'] ?>" class="modal-toggle" />
                <div class="modal modal-bottom sm:modal-middle">
                    <div class="modal-box">
                        <h3 class="font-bold text-lg">Are you sure you want to delete this user?</h3>
                        <p class="py-4">The account and its bio will be deleted at the same time</p>
                        <form action="<?= BASEURL ?>/dashboard/delete_user/<?= $data['user-type'] ?>/<?= $user['id'] ?>"
                            method="post" class="modal-action">
                            <button type="submit" name="delete-user-<?= $user['id'] ?>"
                                class="btn btn-sm btn-outline">yes</button>
                            <label for="delete-user-<?= $user['id'] ?>" class="btn btn-sm">no</label>
                        </form>
                    </div>
                </div>
                <?php $i++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="btn-group mt-3">
        <a href="<?= BASEURL ?>/dashboard/user_list/<?= $data['user-type'] ?>/<?= ($data['page'] <= 1) ? 1 : $data['page'] - 1 ?>"
            class="btn">«</a>
        <button class="btn">Page <?= $data["page"] ?></button>
        <a href="<?= BASEURL ?>/dashboard/user_list/<?= $data['user-type'] ?>/<?= $data['page'] + 1 ?>"
            class="btn">»</a>
    </div>

</div>