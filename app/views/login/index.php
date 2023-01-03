<div class="flex justify-center items-center flex-col gap-10 min-h-screen bg-base-200">
    <div>
        <h1 class="text-4xl font-bold">Silahkan Login</h1>
    </div>
    <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
        <?= Flasher::flash() ?>
        <form action="<?= BASEURL ?>/login/validate" method="post" class="card-body">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Username / Email</span>
                </label>
                <input type="text" placeholder="Username / Email" name="umail" class="input input-bordered" required />
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Password</span>
                </label>
                <input type="password" placeholder="password" name="password" class="input input-bordered" required />
            </div>
            <div class="form-control">
                <?php $captcha_code = substr(md5(rand()), 0, 7); ?>
                <label class="label">
                    <span class="label-text">Captcha code : <?= $captcha_code ?></span>
                </label>
                <input type="text" class="hidden" name="captcha-code" value="<?= $captcha_code ?>">
                <input type="text" placeholder="captcha" name="captcha-confirmation" class="input input-bordered"
                    required />
            </div>
            <div class="form-control mt-6">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</div>