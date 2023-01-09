<section class="upload-syarat-doc">
    <div class="title-page">
        <h1 class="text-2xl font-semibold my-3">Unggah Persyaratan Assesmen</h1><hr>
    </div>
    <?= Flasher::flash() ?>
    
    <div class="skema-list mt-10">
        <div class="head flex justify-between my-5">
            <h1 class="text-xl font-semibold my-3">Skema Sertifikasi Profesi yang Anda ikuti</h1>
            <div class="form-control">
                <form action="<?= BASEURL; ?>/asesi/search_skema" method="post">  
                    <div class="input-group rounded-lg">
                        <input type="text" placeholder="Search" class="input input-bordered" name="keyword" id="keyword" autocomplete="off"/>
                        <button class="btn btn-square" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                        </button>  
                    </div>
                </form>
            </div>
        </div>
        <div class="list-skema mb-10">
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Skema Serifikasi</th>
                            <th>Status Persyaratan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>NULL</td>
                            <td>NULL</td>
                            <td><a href="<?= BASEURL ?>" class="btn btn-success">Unggah Persyaratan</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>