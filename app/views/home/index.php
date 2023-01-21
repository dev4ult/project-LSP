<div class="container mx-auto max-w-5xl">
    <div class="my-10">
        <h1 class="text-7xl font-extrabold uppercase py-5 text-center">[ Selamat
            Datang ]
        </h1>
        <div class="flex justify-between mt-20">
            <div class="text-4xl font-bold flex flex-col gap-10">
                <h2
                    class="bg-neutral text-info rounded-full p-5 w-fit px-10 shadow-md transition-all hover:-translate-y-1 ml-auto">
                    Asesor</h2>
                <h2
                    class="bg-primary text-white rounded-full p-5 w-fit px-10 shadow-md transition-all hover:-translate-y-1 ml-auto">
                    Peserta Asesmen</h2>
                <h2
                    class="bg-accent/50 text-secondary rounded-full p-5 w-fit px-10 shadow-md transition-all hover:-translate-y-1 ml-auto">
                    Administrator</h2>

                <h2
                    class="bg-secondary text-neutral rounded-full p-5 w-fit px-10 shadow-md transition-all hover:-translate-y-1 ml-auto">
                    Politeknik Negri Jakarta
                </h2>
            </div>
            <img src="<?= BASEURL ?>/img/lsppeople.png" alt="people" class="flex-shrink-0 flex-grow">
        </div>
    </div>
</div>
<div class="bg-primary py-32 mt-36">
    <div class="text-center max-w-5xl mx-auto">
        <h3 class="text-4xl font-bold uppercase text-white">Info grafis</h3>
        <p class="text-4xl font-bold uppercase text-white">lsp politeknik negeri jakarta</p>
        <div class="flex gap-10 justify-center text-black mt-10">
            <div
                class="p-5 text-center bg-white rounded-lg shadow-md flex flex-col justify-between max-w-xs transition-all hover:-translate-y-1">
                <img class="mx-auto w-32" src="<?= BASEURL ?>/img/asesor.png" alt="asesor">
                <div>
                    <p class="font-bold text-2xl mt-5">Asesor</p>
                    <p class="text-xl mt-3">pegawai yang menguji asesi atau peserta dalam
                        penilaian uji kompetensi</p>
                    <p class="mt-5 text-3xl font-bold uppercase"><?= $data['total-asesor'] ?> Pegawai</p>
                </div>
            </div>
            <div
                class="p-5 text-center bg-white rounded-lg shadow-md flex flex-col justify-between max-w-xs transition-all hover:-translate-y-1">
                <img class="mx-auto w-32" src="<?= BASEURL ?>/img/asesi.png" alt="asesi">
                <div>
                    <p class="font-bold text-2xl mt-5">Asesi</p>
                    <p class="text-xl mt-3">peserta yang mengikuti uji kompetensi untuk
                        mendapatkan sertifikat profesi</p>
                    <p class="mt-5 text-3xl font-bold uppercase"><?= $data['total-asesi'] ?> Peserta</p>
                </div>
            </div>
            <div
                class="p-5 text-center bg-white rounded-lg shadow-md flex flex-col justify-between max-w-xs transition-all hover:-translate-y-1">
                <img class="mx-auto w-32" src="<?= BASEURL ?>/img/skema.png" alt="skema">
                <div>
                    <p class="font-bold text-2xl mt-5">Sertifikasi</p>
                    <p class="text-xl mt-3">sistem skema yang dibuatkan untuk asesi mendapatkan
                        sertifikat profesi</p>
                    <p class="mt-5 text-3xl font-bold uppercase"><?= $data['total-skema'] ?> Skema</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="max-w-5xl mx-auto mt-20 py-10">
    <h2 class="text-5xl font-bold uppercase">Kinerja Kami</h2>
    <div class="flex gap-20">
        <p class="text-3xl mt-5">Kami telah melaksanakan kegiatan
            asesmen uji kompetensi. Perkembangan yang terus menerus dan pelayanan
            sertifikasi kepada masyarakat,
            dengan serangkaian pengalaman
            kami.</p>
        <img src="<?= BASEURL ?>/img/peoplework.png" alt="people" class="flex-grow flex-shrink-0 w-96">
    </div>
</div>