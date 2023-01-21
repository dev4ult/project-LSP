<div class="flex gap-3 items-center">
    <label for="add-user"
        class="flex items-center bg-gradient-to-r from-primary to-info rounded-sm py-2 px-2 gap-2 cursor-pointer hover:bg-gradient-to-r hover:from-info hover:to-info">
        <img src="<?= BASEURL ?>/img/person_add.svg" alt="person add" class="w-6">
        <span class="font-semibold uppercase text-white">asesor baru</span>
    </label>
    <div class="form-control">
        <form action="<?= BASEURL ?>/dashboard/user_list/asesor/" method="post"
            class="bg-['#EDF4F8'] flex items-center rounded-sm overflow-hidden">
            <input type="text" name="search-key" placeholder="Search…" class="input rounded-none" />
            <button type="submit"
                class="btn btn-square bg-base-100 text-black rounded-none hover:border-base-100 border-base-100 hover:bg-base-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </form>
    </div>
</div>
<input type="checkbox" id="add-user" class="modal-toggle" />
<div class="modal bg-[#EDF4F8]/50 p-10">
    <form action="<?= BASEURL ?>/dashboard/add_user/asesor" method="post" class="modal-box max-w-none w-fit ">

        <input type="text" name="password" placeholder="Type here" class="hidden input input-bordered rounded-sm w-full"
            value="<?= hash('sha256', rand()) ?>" />

        <h2 class="text-3xl font-semibold mb-3">Tambah Asesor</h2>
        <div class="grid grid-flow-row grid-cols-2 gap-5">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Nama Lengkap</span>
                </label>
                <label class=" ">
                    <input type="text" placeholder="Type here" class="input input-bordered rounded-sm w-full "
                        name="nama" required />
                </label>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">NIP</span>
                </label>
                <label class=" ">
                    <input type="number" placeholder="Type here" class="input input-bordered rounded-sm w-full "
                        name="nip" required />
                </label>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">No Telepon</span>
                </label>
                <label class=" ">
                    <input type="text" placeholder="Type here" class="input input-bordered rounded-sm w-full "
                        name="no-telepon" required />
                </label>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">NIK</span>
                </label>
                <label class=" ">
                    <input type="number" placeholder="Type here" class="input input-bordered rounded-sm w-full "
                        name="nik" required />
                </label>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Tempat Lahir</span>
                </label>
                <label class=" ">
                    <input type="text" placeholder="Type here" class="input input-bordered rounded-sm w-full "
                        name="tempat-lahir" required />
                </label>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Tanggal Lahir</span>
                </label>
                <label class=" ">
                    <input type="date" placeholder="Type here" class="input input-bordered rounded-sm w-full "
                        name="tanggal-lahir" required />
                </label>
            </div>
            <div class="form-control">
                <label class="label-text mb-2">Jenis Kelamin</label>
                <div class="flex gap-2 justify-between">
                    <label
                        class="form-control flex-row items-center gap-3 border-2 rounded-sm border-slate-200 py-2 pl-3 pr-10">
                        <input type="radio" class="radio-1 radio " name="jenis-kelamin" value="Laki-laki" required />
                        <span>Laki-laki</span>
                    </label>
                    <label
                        class="form-control flex-row items-center gap-3 border-2 rounded-sm border-slate-200 py-2 pl-3 pr-10">
                        <input type="radio" class="radio-1 radio" name="jenis-kelamin" value="Perempuan" />
                        <span>Perempuan</span>
                    </label>
                </div>
            </div>
            <div class="form-control row-span-2">
                <label class="label pt-0">
                    <span class="label-text">Alamat</span>
                </label>
                <label class="">
                    <textarea name="alamat" class="p-3.5 input input-bordered rounded-sm w-full h-36 resize-none "
                        placeholder="alamat" required></textarea>
                </label>
            </div>
            <div class="form-control ">
                <label class="label">
                    <span class="label-text">Pendidikan Terakhir</span>
                </label>
                <select class="select select-bordered rounded-sm w-full" name="pendidikan-terakhir" required>
                    <option disabled>-- PILIH PENDIDIKAN TERAKHIR --</option>
                </select>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Username</span>
                </label>
                <label class=" ">
                    <input type="text" placeholder="Type here" class="input input-bordered rounded-sm w-full "
                        name="username" required />
                </label>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <label class="">
                    <input type="text" placeholder="Type here" class="input input-bordered rounded-sm w-full "
                        name="email" required />
                </label>
            </div>
            <div class="modal-action p-3 col-span-2 text-right">
                <button type="submit" class="btn btn-secondary rounded-sm text-white">Submit</button>
                <label for="add-user" class="btn btn-circle btn-outline absolute top-6 right-5 btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </label>
            </div>
        </div>

    </form>
</div>
<script src="<?= BASEURL ?>/js/pendidikan.js"></script>