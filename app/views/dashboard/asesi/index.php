<section class="dashboard-container border-collapse">
    <section class="head m-4">
        <h1 class="text-2xl font-semibold">Dashboard
            <span class="text-sm text-slate-500 font-semibold">Sistem informasi Lembaga Sertifikasi Profesi</span>
        </h1>
        <h2 class="text-2xl py-4 font-semibold">Selamat Datang, <?= $data['username'] ?></h2>
        <p> Terima kasih telah bergabung menjadi Asesi dengan Lembaga Sertifikasi Profesi. 
            Untuk mengikuti ujian sertifikasi profesi keahlian, Prosedur yang harus dilalui sebagai berikut.
        </p>
    </section>
    <section class="menu-selection flex mx-4 my-8 justify-center align-middle flex-wrap">
        <div class="schema-sertification m-3 bg-slate-900 rounded-xl">
            <div class="text-white px-4 py-3">
                <h1 class="text-3xl font-semibold">1</h1>
                <h3 class="py-1">Pilih Skema</h3>
                <a class="link link-hover py-1" href="<?= BASEURL ?>/asesi/list_skema"> -> Selengkapnya</a>
            </div>
        </div>
        <div class="upload-document-menu m-3 bg-slate-900 rounded-xl">
            <div class="text-white px-4 py-3">
                <h1 class="text-3xl font-semibold">2</h1>
                <h3 class="py-1">Upload Dokumen</h3>
                <a class="link link-hover py-1" href="<?= BASEURL ?>/asesi/upload_document"> -> Selengkapnya</a>
            </div>
        </div>
        <div class="schedule-view-menu m-3 bg-slate-900 rounded-xl">
            <div class="text-white px-4 py-3">
                <h1 class="text-3xl font-semibold">3</h1>
                <h3 class="py-1">Lihat Jadwal</h3>
                <a class="link link-hover py-1" href="<?= BASEURL ?>/asesi/jadwal_asesmen"> -> Selengkapnya</a>
            </div>   
        </div>
        <div class="sertification-menu m-3 bg-slate-900 rounded-xl">
            <div class="text-white px-4 py-3">
                <h1 class="text-3xl font-semibold">4</h1> 
                <h3 class="py-1">Terbit Sertifikat</h3>
                <a class="link link-hover py-1" href="<?= BASEURL ?>/dashboard/asesi/#"> -> Selengkapnya</a> 
            </div>
        </div>
    </section>
</section>