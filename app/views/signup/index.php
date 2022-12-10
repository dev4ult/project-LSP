<div class="hero min-h-screen bg-base-200">
    <div class="hero-content flex-col">
        <div class="text-center ">
            <h1 class="text-5xl font-bold">Sign Up now!</h1>
            <p class="py-6 max-w-3xl">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi
                exercitationem
                quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
        </div>
        <div class="card flex-shrink-0 shadow-2xl bg-base-100">
            <?= Flasher::flash() ?>
            <form action="<?= BASEURL ?>/signup/add" method="post" class="card-body w-fit">
                <div class="form-control flex-row gap-5">
                    <div>
                        <label class="label">
                            <span class="label-text">Username</span>
                        </label>
                        <input type="text" placeholder="username" class="input input-bordered" name="username"
                            required />
                    </div>
                    <div>
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="email" placeholder="email" class="input input-bordered" name="email" required />
                    </div>
                </div>
                <div class="form-control flex-row gap-5">
                    <div>
                        <label class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <input type="password" placeholder="password" class="input input-bordered" name="password"
                            required />
                    </div>
                    <div>
                        <label class="label">
                            <span class="label-text">Password Confirmation</span>
                        </label>
                        <input type="password" placeholder="password confirmation" class="input input-bordered"
                            name="password-confirmation" required />
                    </div>
                </div>
                <div class="form-control mt-6">
                    <button type="submit" class="btn btn-primary" name="sign-up-btn">Sign up</button>
                    <span>
                        Already have an account?
                        <a href="<?= BASEURL ?>/login" class="link link-info"> Login here</a>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>