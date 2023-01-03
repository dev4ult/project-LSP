<div class="min-h-screen w-full">
    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
                <tr>
                    <th></th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = ($data['page'] - 1) * 5 + 1; ?>
                <?php foreach ($data['list-user'] as $user) : ?>
                <tr>
                    <th><?= $i ?></th>
                    <td><?= $user['nama'] ?></td>
                    <td><?= $user['alamat'] ?></td>
                    <td><?= $user['no_telepon'] ?></td>
                    <td><a href="" class="btn btn-sm btn-outline">detail</a></td>
                </tr>
                <?php $i++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="btn-group mt-10">
        <a href="<?= BASEURL ?>/dashboard/list_user/<?= $data['user-type'] ?>/<?= ($data['page'] == 1) ? 1 : $data['page'] - 1 ?>"
            class="btn">«</a>
        <button class="btn">Page <?= $data["page"] ?></button>
        <a href="<?= BASEURL ?>/dashboard/list_user/<?= $data['user-type'] ?>/<?= $data['page'] + 1 ?>"
            class="btn">»</a>
    </div>
</div>