<div class="navbar text-primary max-w-5xl mx-auto">
    <div class="navbar-start">
        <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </label>
            <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                <li><a href="<?= BASEURL ?>/login">DASHBOARD</a></li>
                <li><a>PROFIL </a></li>
                <li><a>HUBUNGI KAMI</a></li>
            </ul>
        </div>
        <a href="<?= BASEURL ?>" class="btn btn-ghost hover:bg-primary hover:text-white normal-case text-xl">LSPPNJ</a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal p-0 gap-2 font-semibold">
            <li><a class="hover:bg-primary hover:text-white rounded-lg" href="<?= BASEURL ?>/dashboard">DASHBOARD</a>
            </li>
            <li><a class="hover:bg-primary hover:text-white rounded-lg" href="<?= BASEURL ?>/login">PROFIL</a></li>
            <li><a class="hover:bg-primary hover:text-white rounded-lg" href="<?= BASEURL ?>">HUBUNGI KAMI</a></li>

        </ul>
    </div>
    <div class="navbar-end">
        <a href="<?= BASEURL ?>/signup"
            class="btn btn-outline rounded-full text-primary hover:text-white hover:bg-[#2882EB] hover:border-[#2882EB]">registrasi
            asesi</a>
    </div>
</div>