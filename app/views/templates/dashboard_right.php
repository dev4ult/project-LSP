<div class="pt-14 pb-5 bg-base-100">
    <div class="px-8 flex-shrink-0 flex-grow min-w-[270px] overflow-y-auto h-full pb-5">
        <h1 class="text-xl font-semibold">Profil</h1>
        <div class="px-5 py-3 bg-neutral rounded-lg mt-3 w-full">
            <h3 class="font-semibold text-info text-2xl"><?= $data['username'] ?></h3>
            <h3 class="text-info "><?= $data['nomor-induk'] ?></h3>
            <a href="<?= BASEURL ?>/dashboard/edit_profile/asesi"
                class="mt-3 btn btn-sm rounded-full bg-primary text-white hover:bg-info">edit
                profil</a>
        </div>
        <?php if ($data['user-type'] != "asesor") : ?>
        <div class="mt-10">
            <h3 class="font-semibold text-xl">Skema Terbaru</h3>
            <ul class="mt-5 whitespace-nowrap flex flex-col gap-2">
                <?php foreach ($data['last-3-created'] as $skema) : ?>
                <li class="flex items-center">
                    <img src="<?= BASEURL ?>/img/bookmark.svg" alt="bookmark">
                    <div>
                        <h4 class="text-sm font-semibold">
                            <?= (strlen($skema['nama_skema']) > 17 ? substr($skema['nama_skema'], 0, 17) . "..." : $skema['nama_skema']) ?>
                        </h4>
                        <a href="<?= BASEURL ?>/skema/detail/<?= $skema['id'] ?>"
                            class="uppercase text-xs text-primary">lihat skema sertifikasi</a>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif ?>
        <div class="mt-10">
            <h3 class="font-semibold text-xl">Aktifitas Terakhir</h3>
            <ul class="mt-5 flex flex-col gap-2">
                <?php if (isset($data['laf'])) : ?>
                <li>
                    <a href="<?= BASEURL ?>/skema/detail/<?= $data['laf']['id'] ?>"
                        class="flex bg-accent/50 justify-between gap-3 hover:bg-accent rounded-sm p-3">
                        <div>
                            <h4 class="text-sm font-semibold"><?= $data['laf']['name'] ?></h4>
                            <p class="text-xs">Skema sertifikasi</p>
                        </div>
                        <img src="<?= BASEURL ?>/img/info_black.svg" alt="info">
                    </a>
                </li>
                <?php endif; ?>
                <?php if (isset($data['las'])) : ?>
                <li>
                    <a href="<?= BASEURL ?>/skema/detail/<?= $data['las']['id'] ?>"
                        class="flex bg-accent/50 justify-between gap-3 hover:bg-accent rounded-sm p-3">
                        <div>
                            <h4 class="text-sm font-semibold"><?= $data['las']['name'] ?></h4>
                            <p class="text-xs">Skema sertifikasi</p>
                        </div>
                        <img src="<?= BASEURL ?>/img/info_black.svg" alt="info">
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>