<div class="flex justify-center items-center flex-col gap-10 min-h-screen ">
    <?= Flasher::flash() ?>
    <div class="bg-base-100 flex rounded-xl overflow-hidden shadow-xl">
        <div class="bg-[#20F89D] p-16">
            <img src="<?= BASEURL ?>/img/login-vector.png" class="w-56" alt="woman raise hand">
        </div>
        <form action="<?= BASEURL ?>/login/validate" method="post"
            class="p-8 my-auto w-full min-w-[24rem] max-w-sm text-center">
            <h1 class="text-3xl font-bold mb-2">Login</h1>
            <p>Login untuk mengakses fitur dari aplikasi LSPPNJ</p>
            <div class="card-body">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Username / Email</span>
                    </label>
                    <input type="text" placeholder="Ketikan Username atau Email-mu" name="umail"
                        class="rounded-sm input input-bordered" required />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input type="password" placeholder="Ketikan Password-mu" name="password"
                        class="rounded-sm input input-bordered" required />
                </div>
                <div class="form-control mt-5">
                    <label class="cursor-pointer label">
                        <span class="label-text">Ingat username / email</span>
                        <input type="checkbox" checked="checked" class="checkbox checkbox-success" />
                    </label>
                </div>
                <label for="captcha-modal" class="btn btn-secondary rounded-sm text-white">Login</label>
            </div>
            <input type="checkbox" id="captcha-modal" class="modal-toggle" />
            <div class="modal">
                <div class="modal-box relative w-[430px] p-12">
                    <h3 class="font-semibold text-2xl text-center">Verifikasi Kode Captcha!</h3>
                    <?php $captcha_code = substr(md5(rand()), 0, 7); ?>
                    <h2 class="bg-[#394452] my-5 text-2xl p-3 w-fit text-white mx-auto"><s><?= $captcha_code ?></s></h2>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Kode Captcha</span>
                        </label>
                        <input type="text" placeholder="Ketikan kode captcha yang sesuai" name="captcha-confirmation"
                            class="input input-bordered w-full rounded-sm" required />

                    </div>
                    <input type="text" class="hidden" name="captcha-code" value="<?= $captcha_code ?>">
                    <div class="modal-action">
                        <label for="captcha-modal" class="btn btn-sm btn-circle btn-outline absolute top-5 right-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </label>
                        <button type="submit" class="btn w-full rounded-sm text-white">VERIFIKASI CAPTCHA</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>