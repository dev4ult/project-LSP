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
            <h1 class="text-4xl font-semibold">Dashboard Asesi</h1>
            <ul class="flex gap-4">
                <li>
                    <a href="<?= BASEURL ?>" class="">
                        <img src="<?= BASEURL ?>/img/home.svg" alt="home">
                    </a>
                </li>
                <li>
                    <a href="<?= BASEURL ?>/dashboard/logout"
                        class="btn btn-outline rounded-full text-primary hover:text-white hover:bg-primary btn-sm hover:border-primary">logout</a>
                </li>
            </ul>
        </div>
        <div class="flex flex-wrap gap-5 mt-10">
            <a href="<?= BASEURL ?>/skema/list"
                class="bg-gradient-to-r from-primary to-info hover:bg-gradient-to-r hover:from-info hover:to-info hover:bg-primary w-fit gap-14 flex justify-between text-white py-3.5 px-8 rounded-2xl">
                <div class="text-lg ">
                    <p class="font-bold uppercase">cari skema</p>
                    <p class="font-semibold"><?= $data['total-skema'] ?> Skema</p>
                </div>
                <img class="w-12" src="<?= BASEURL ?>/img/search_white.svg" alt="people">
            </a>
            <a href="<?= BASEURL ?>/asesi/sertifikat_asesi"
                class="bg-gradient-to-r from-primary to-info hover:bg-gradient-to-r hover:from-info hover:to-info hover:bg-primary w-fit gap-14 flex justify-between text-white py-3.5 px-8 rounded-2xl">
                <div class="text-lg ">
                    <p class="font-bold uppercase">terbit sertifikat</p>
                    <p class="font-semibold"><?= $data['total-skema-saya'] ?> Sertifikat</p>
                </div>
                <img class="w-12" src="<?= BASEURL ?>/img/library_books.svg" alt="people outline">
            </a>
        </div>
        <div class="grid grid-flow-row grid-cols-3 gap-5 mt-10">
            <div
                class="bg-white flex justify-between rounded-2xl shadow-md p-5 hover:-translate-y-1 transition-all col-span-2 ">
                <div class="flex flex-col justify-between">
                    <div>
                        <h3 class="text-2xl capitalize font-semibold">skema yang didaftari</h3>
                        <p class="text-lg max-w-md">Persyaratan sertifikasi spesifik yang berkaitan dengan kategori
                            profesi</p>
                    </div>
                    <h4 class="font-semibold text-lg mt-auto">Total : <?= $data['total-skema-saya'] ?></h4>
                </div>
                <div class="text-center self-end">
                    <img src="<?= BASEURL ?>/img/book.svg" alt="book">
                    <a href="<?= BASEURL ?>/skema/list/asesi"
                        class="btn btn-sm btn-secondary text-white rounded-sm">lihat</a>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-md p-5 hover:-translate-y-1 transition-all row-span-2 text-center">
                <div>
                    <h3 class="text-2xl capitalize font-semibold">jadwal asesmen</h3>
                    <p class="text-lg">Pelaksanaan uji kompetensi untuk nama kegiatan dan tempatnya</p>
                </div>
                <div class="text-center mt-2">
                    <img src="<?= BASEURL ?>/img/access_time.svg" alt="clock" class="mx-auto">
                    <a href="<?= BASEURL ?>/asesi/jadwal_asesmen" class="btn btn-secondary text-white rounded-sm">lihat
                        jadwal</a>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-md p-5 hover:-translate-y-1 transition-all col-span-2 flex">
                <div>
                    <h3 class="text-2xl capitalize font-semibold">dokumen persyaratan</h3>
                    <p class="text-lg max-w-md">Dokumen dokumen yang diperlukan untuk mendaftarkan diri kedalam skema
                        sertifikasi
                    </p>
                </div>
                <div class="self-end flex flex-col items-center">
                    <img src="<?= BASEURL ?>/img/drafts.svg" alt="draft">
                    <a href="<?= BASEURL ?>/asesi/upload_document"
                        class="btn btn-secondary text-white rounded-sm">unggah</a>
                </div>
            </div>
        </div>
    </div>
    <?php require_once("../app/views/templates/dashboard_right.php") ?>
</div>
<script src="<?= BASEURL ?>/js/sidebar.js"></script>