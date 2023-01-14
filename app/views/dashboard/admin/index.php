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
        <div class="flex justify-between items-center">
            <h1 class="text-4xl font-semibold">Dashboard Admin</h1>
            <ul class="flex gap-4">
                <li>
                    <a href="<?= BASEURL ?>" class="">
                        <img src="<?= BASEURL ?>/img/home.svg" alt="home">
                    </a>
                </li>
                <li>
                    <a href="<?= BASEURL ?>/logout"
                        class="btn btn-outline rounded-full text-primary hover:text-white hover:bg-primary btn-sm hover:border-primary">logout</a>
                </li>
            </ul>
        </div>
        <div class="flex flex-wrap gap-5 mt-10">
            <a href="<?= BASEURL ?>/dashboard/user_list/asesor"
                class="bg-gradient-to-r from-primary to-info hover:bg-gradient-to-r hover:from-info hover:to-info hover:bg-primary w-fit gap-14 flex justify-between text-white py-3.5 px-8 rounded-2xl">
                <div class="text-lg ">
                    <p class="font-bold uppercase">asesor</p>
                    <p class="font-semibold"><?= $data['total-asesor'] ?> Pegawai</p>
                </div>
                <img class="w-12" src="<?= BASEURL ?>/img/people.svg" alt="people">
            </a>
            <a href="<?= BASEURL ?>/dashboard/user_list/asesi"
                class="bg-gradient-to-r from-primary to-info hover:bg-gradient-to-r hover:from-info hover:to-info hover:bg-primary w-fit gap-14 flex justify-between text-white py-3.5 px-8 rounded-2xl">
                <div class="text-lg ">
                    <p class="font-bold uppercase">asesi</p>
                    <p class="font-semibold"><?= $data['total-asesi'] ?> Peserta</p>
                </div>
                <img class="w-12" src="<?= BASEURL ?>/img/people_outline.svg" alt="people outline">
            </a>
            <a href="<?= BASEURL ?>/dashboard/user_list/asesi"
                class="bg-gradient-to-r from-primary to-info hover:bg-gradient-to-r hover:from-info hover:to-info hover:bg-primary w-fit gap-14 flex justify-between text-white py-3.5 px-8 rounded-2xl">
                <div class="text-lg ">
                    <p class="font-bold uppercase">persyaratan skema</p>
                    <p class="font-semibold"><?= $data['total-list-persyaratan'] ?> Persyaratan</p>
                </div>
                <img class="w-12" src="<?= BASEURL ?>/img/playlist_add_check_white.svg" alt="list check">
            </a>
        </div>
        <div class="grid grid-flow-row grid-cols-3 gap-5 mt-10">
            <div
                class="bg-white flex justify-between rounded-2xl shadow-lg p-5 hover:-translate-y-1 transition-all col-span-2 ">
                <div class="flex flex-col justify-between">
                    <div>
                        <h3 class="text-2xl capitalize font-semibold">skema sertifikasi</h3>
                        <p class="text-lg max-w-md">Persyaratan sertifikasi spesifik yang berkaitan dengan kategori
                            profesi</p>
                    </div>
                    <h4 class="font-semibold text-lg mt-auto">Total : <?= $data['total-skema'] ?></h4>
                </div>
                <div class="text-center self-end">
                    <img src="<?= BASEURL ?>/img/book.svg" alt="book">
                    <a href="<?= BASEURL ?>/skema" class="btn btn-sm btn-secondary text-white rounded-sm">kelola</a>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-lg p-5 hover:-translate-y-1 transition-all row-span-2 text-center">
                <div>
                    <h3 class="text-2xl capitalize font-semibold">jadwal asesmen</h3>
                    <p class="text-lg">Pelaksanaan uji kompetensi untuk nama kegiatan dan tempatnya</p>
                </div>
                <div class="text-center mt-2">
                    <img src="<?= BASEURL ?>/img/access_time.svg" alt="clock" class="mx-auto">
                    <a href="<?= BASEURL ?>/jadwal_asesmen" class="btn btn-secondary text-white rounded-sm">kelola
                        jadwal</a>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-lg p-5 hover:-translate-y-1 transition-all col-span-2">
                <div>
                    <h3 class="text-2xl capitalize font-semibold">persentase kelulusan</h3>
                    <p class="text-lg">Total perbandingan antara peserta yang
                        lulus dengan tidak lulus dalam pendaftaran skema sertifikasi</p>
                </div>
            </div>
        </div>
    </div>
    <div class="h-full pt-14 pb-5 bg-base-100">
        <div class="px-8 flex-shrink-0 flex-grow min-w-[200px] overflow-y-auto h-screen pb-5">
            <h1 class="text-xl font-semibold">Profil</h1>
            <div class="px-5 py-3 bg-neutral rounded-lg mt-3 w-full">
                <h3 class="font-semibold text-info text-2xl"><?= $data['username'] ?></h3>
                <h3 class="text-info "><?= $data['nomor-induk'] ?></h3>
                <a href="<?= BASEURL ?>/dashboard/edit_profile/<?= $data['user-type'] ?>"
                    class="mt-3 btn btn-sm rounded-full bg-primary text-white hover:bg-info">edit
                    profil</a>
            </div>
            <div class="mt-10">
                <h3 class="font-semibold text-xl">Skema Terbaru</h3>
                <ul class="mt-5 whitespace-nowrap flex flex-col gap-2">
                    <li class="flex items-center">
                        <img src="<?= BASEURL ?>/img/bookmark.svg" alt="bookmark">
                        <div>
                            <h4 class="text-sm font-semibold">Front End Developer</h4>
                            <a href="<?= BASEURL ?>/" class="uppercase text-xs text-primary">lihat skema sertifikasi</a>
                        </div>
                    </li>
                    <li class="flex items-center">
                        <img src="<?= BASEURL ?>/img/bookmark.svg" alt="bookmark">
                        <div>
                            <h4 class="text-sm font-semibold">Front End Developer</h4>
                            <a href="<?= BASEURL ?>/" class="uppercase text-xs text-primary">lihat skema sertifikasi</a>
                        </div>
                    </li>
                    <li class="flex items-center">
                        <img src="<?= BASEURL ?>/img/bookmark.svg" alt="bookmark">
                        <div>
                            <h4 class="text-sm font-semibold">Front End Developer</h4>
                            <a href="<?= BASEURL ?>/" class="uppercase text-xs text-primary">lihat skema sertifikasi</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="mt-10">
                <h3 class="font-semibold text-xl">Aktifitas Terakhir</h3>
                <ul class="mt-5 flex flex-col gap-2">
                    <li>
                        <a href="" class="flex bg-accent/50 justify-between gap-3 hover:bg-accent rounded-sm p-3">
                            <div>
                                <h4 class="text-sm font-semibold">Android Developer</h4>
                                <p class="text-xs">Skema sertifikasi</p>
                            </div>
                            <img src="<?= BASEURL ?>/img/info_black.svg" alt="info">
                        </a>
                    </li>
                    <li>
                        <a href="" class="flex bg-accent/50 justify-between gap-3 hover:bg-accent rounded-sm p-3">
                            <div>
                                <h4 class="text-sm font-semibold">Android Developer</h4>
                                <p class="text-xs">Skema sertifikasi</p>
                            </div>
                            <img src="<?= BASEURL ?>/img/info_black.svg" alt="info">
                        </a>
                    </li>
                    <li>
                        <a href="" class="flex bg-accent/50 justify-between gap-3 hover:bg-accent rounded-sm p-3">
                            <div>
                                <h4 class="text-sm font-semibold">Android Developer</h4>
                                <p class="text-xs">Skema sertifikasi</p>
                            </div>
                            <img src="<?= BASEURL ?>/img/info_black.svg" alt="info">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script src="<?= BASEURL ?>/js/sidebar.js"></script>