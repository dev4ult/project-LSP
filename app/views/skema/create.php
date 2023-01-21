<?= Flasher::flash(); ?>

<div class="container-form w-full h-fit mb-4">
    <form action="<?= BASEURL ?>/skema/add" method="post" class="w-full">
        <div class="group-input flex justify-between">
            <div class="left-form w-1/2">
                <div class="form-control w-[500px]">
                    <label class="label" for="skema">
                        <span
                            class="label-text text-lg font-semibold after:content-['*'] after:text-pink-500 after:ml-0.5">Nama
                            Skema Profesi</span>
                    </label>
                    <input type="text" placeholder="" class="input input-bordered" id="skema" name="skema" required />
                </div>
                <div class="form-control w-[500px] mt-4">
                    <label class="label" for="level">
                        <span
                            class="label-text text-lg font-semibold after:content-['*'] after:text-pink-500 after:ml-0.5">Level
                            KKNI</span>
                    </label>
                    <select class="select select-bordered" id="level" name="level" required>
                        <option disabled selected>-- Pilih Level --</option>
                        <option value="Level I">Level I</option>
                        <option value="Level II">Level II</option>
                        <option value="Level III">Level III</option>
                        <option value="Level IV">Level IV</option>
                        <option value="Level V">Level V</option>
                    </select>
                </div>
                <div class="form-control w-[500px] mt-4">
                    <label class="label" for="jurusan">
                        <span
                            class="label-text text-lg font-semibold after:content-['*'] after:text-pink-500 after:ml-0.5">Jurusan</span>
                    </label>
                    <select class="select select-bordered" id="jurusan" name="jurusan">
                        <option disabled selected>-- Pilih Jurusan --</option>
                        <?php foreach ($data['jurusan'] as $jurusan) : ?>
                        <option value="<?= $jurusan['nama']; ?>"><?= $jurusan['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="right-form w-1/2">
                <div class="form-control w-full">
                    <label class="label" for="SKKNI">
                        <span
                            class="label-text text-lg font-semibold after:content-['*'] after:text-pink-500 after:ml-0.5">SKK/KKNI
                            LSP</span>
                    </label>
                    <select class="select select-bordered" id="SKKNI" name="SKKNI" required>
                        <option disabled selected>-- Pilih SKK/KKNI --</option>
                        <?php foreach ($data['skkni'] as $skkni) : ?>
                        <option value="<?= $skkni['skkni']; ?>"><?= $skkni['skkni']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-control w-full mt-4">
                    <label class="label" for="status">
                        <span
                            class="label-text text-lg font-semibold after:content-['*'] after:text-pink-500 after:ml-0.5">Status</span>
                    </label>
                    <select class="select select-bordered" id="status" name="status">
                        <option disabled selected>-- Pilih Status --</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Nonaktif">Nonaktif</option>
                    </select>
                </div>
                <div class="form-control w-full mt-4">
                    <label class="label" for="asesor">
                        <span
                            class="label-text text-lg font-semibold after:content-['*'] after:text-pink-500 after:ml-0.5">Asesor</span>
                    </label>
                    <select class="select select-bordered" id="asesor" name="asesor">
                        <option disabled selected>-- Pilih Asesor --</option>
                        <?php foreach ($data['asesor'] as $asesor) : ?>
                        <option value="<?= $asesor['nama']; ?>"><?= $asesor['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-info my-5 mt-8">Tambahkan</button>
    </form>
</div>