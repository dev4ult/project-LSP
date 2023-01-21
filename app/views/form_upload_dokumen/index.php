<div class="w-full min-h-screen flex">
    <div class="pt-14 pr-8 px-12">
        <button type="button" id="hamburger" class="text-primary">
            <!-- hamburger icon -->
            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
                <path d="M64,384H448V341.33H64Zm0-106.67H448V234.67H64ZM64,128v42.67H448V128Z" />
            </svg>
        </button>
    </div>
    <div class="px-8 w-full">
        <h1 class="text-3xl font-semibold mb-3 pt-14">List Status Unggah</h1>
        <?php require_once "../app/views/templates/breadcrumbs.php" ?>
        <div class="my-5">
            <?= Flasher::flash() ?>
        </div>

        <table class="table rounded-xs shadow-lg">
            <thead>
                <tr>
                    <th class="bg-base-100"></th>
                    <th class="bg-base-100">Skema Sertifikasi</th>
                    <th class="bg-base-100"></th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data['skema-asesi'] as $skema) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td class=""><?= $skema['nama_skema'] ?></td>

                    <td>
                        <a href="<?= BASEURL ?>/asesi/form_upload_document/<?= $skema['id'] ?>"
                            class="btn btn-primary text-white rounded-sm">Lengkapi</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
<script src="<?= BASEURL ?>/js/sidebar.js"></script>