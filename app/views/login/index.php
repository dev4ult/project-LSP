<div class="hero min-h-screen bg-base-200">
    <div class="hero-content flex-col lg:flex-row-reverse">
        <div class="text-center lg:text-left">
            <h1 class="text-5xl font-bold">Login now!</h1>
            <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
                quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
        </div>

        <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
            <?= Flasher::flash() ?>
            <form action="<?= BASEURL ?>/login/validate" method="post" class="card-body">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Username / Email</span>
                    </label>
                    <input type="text" placeholder="username / email" name="umail" class="input input-bordered"
                        required />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input type="password" placeholder="password" name="password" class="input input-bordered"
                        required />
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
                    <span>
                        Don't have an account?
                        <a href="<?= BASEURL ?>/signup" class="link link-info"> Signup here</a>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>