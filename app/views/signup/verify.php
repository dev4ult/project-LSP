<div class="min-h-screen bg-[#EDF4F8]">
    <div class="my-5">
        <?= Flasher::flash() ?>
    </div>
    <div class="flex flex-col">
        <div class="text-center ">
            <h1 class="text-5xl font-bold">Verify your account</h1>
            <p class="py-6 max-w-3xl">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi
                exercitationem
                quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
        </div>
        <div class="card flex-shrink-0 shadow-2xl bg-base-100">
            <div class="card-body w-fit">
                <form action="<?= BASEURL ?>/signup/checkotp" method="post">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Verify your account with this email,
                                <?= $data['unreg-email'] ?></span>
                        </label>
                        <input type="email" value="<?= $data['unreg-email'] ?>" class="hidden" name="email" required>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Type your otp code below</span>
                        </label>
                        <input type="text" placeholder="otp code" class="input input-bordered uppercase" name="otp-code"
                            required />
                    </div>
                    <div class="form-control mt-6">
                        <button type="submit" class="btn btn-primary" name="sign-up-btn">Verify</button>
                    </div>
                </form>
                <form action="<?= BASEURL ?>/signup/sendnewcode" method="post">

                    <input type="text" class="hidden" value="<?= $data['unreg-username'] ?>" name="username">
                    <input type="email" class="hidden" value="<?= $data['unreg-email'] ?>" name="email">
                    <input type="text" class="hidden" value="<?= $data['unreg-password'] ?>" name="password">

                    <?php $otp_code = strtoupper(substr(md5(rand()), 0, 7)); ?>
                    <input type="text" class="hidden" value="<?= $otp_code ?>" name="otp-code">
                    <button type="submit" class="link link-neutral">Send new otp code</button>
                </form>
            </div>
        </div>
    </div>
</div>