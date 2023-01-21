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
            <h1 class="text-4xl font-semibold">Dashboard Asesor</h1>
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
            <a href="<?= BASEURL ?>/asesor/jadwal_asesmen/"
                class="bg-gradient-to-r from-primary to-info hover:bg-gradient-to-r hover:from-info hover:to-info hover:bg-primary w-fit gap-14 flex justify-between text-white py-3.5 px-8 rounded-2xl">
                <div class="text-lg ">
                    <p class="font-bold uppercase">unit kompetensi</p>
                    <p class="font-semibold"><?= $data['total-asesmen'] ?> Asesmen</p>
                </div>
                <img class="w-12" src="<?= BASEURL ?>/img/people.svg" alt="people">
            </a>
        </div>
        <div class="grid grid-flow-row grid-cols-3 gap-5 mt-10">
            <div
                class="bg-white flex justify-between rounded-2xl shadow-md p-5 hover:-translate-y-1 transition-all col-span-2 ">
                <div class="flex flex-col justify-between">
                    <div>
                        <h3 class="text-2xl capitalize font-semibold">skema yang diawasi</h3>
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
            <div
                class="bg-white rounded-2xl shadow-md p-5 hover:-translate-y-1 transition-all row-span-2 text-center flex flex-col justify-center gap-10">
                <div>
                    <h3 class="text-2xl capitalize font-semibold">jadwal asesmen</h3>
                    <p class="text-lg">Pelaksanaan uji kompetensi untuk nama kegiatan dan tempatnya</p>
                </div>
                <div class="text-center mt-2 flex flex-col items-center gap-5">
                    <img src="<?= BASEURL ?>/img/access_time.svg" alt="clock" class="mx-auto">
                    <a href="<?= BASEURL ?>/asesor/jadwal_asesmen/"
                        class="btn btn-secondary text-white rounded-sm">kelola
                        jadwal</a>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-md p-5 hover:-translate-y-1 transition-all col-span-2">
                <div>
                    <h3 class="text-2xl capitalize font-semibold">Total Peserta Skema yang diawasi</h3>
                    <p class="text-lg">Total perbandingan antara peserta yang
                        lulus dengan tidak lulus dalam pendaftaran skema sertifikasi</p>
                </div>
                <div>
                    <canvas id="chart-kelulusan"></canvas>
                </div>
            </div>
        </div>
    </div>
    <?php require_once("../app/views/templates/dashboard_right.php") ?>
</div>
<script src="<?= BASEURL ?>/js/sidebar.js"></script>
<script>
const configData = {
    data: {
        datasets: [{
            label: 'Total Asesi Terdaftar',
            data: [
                <?php foreach ($data['total-asesi-skema'] as $asesi) : ?>
                <?= $asesi["jumlah"] ?>,
                <?php endforeach ?>
            ],
            backgroundColor: [
                '#2882EB',
                '#2C3A4B',
                '#E86C00',
                '#BBFFE2',
                '#2561DE',
                '#37F477',
                '#FBBD23',
                '#FA3B3B',
            ],
        }],

        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
            <?php foreach ($data['skema-asesor'] as $skema) : ?> "<?= $skema["nama_skema"] ?>",
            <?php endforeach ?>
        ]
    },
};

const barContainer = document.querySelector('#chart-kelulusan');

new Chart(barContainer, {
    type: 'bar',
    ...configData,
})
</script>