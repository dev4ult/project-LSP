<div class="bg-base-100 pt-14 px-8 absolute h-full z-10 top-0 -translate-x-full transition-all duration-300"
    id="sidebar">
    <button type="button" id="close" class="text-primary">
        <!-- close icon -->
        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
            <polygon
                points="400 145.49 366.51 112 256 222.51 145.49 112 112 145.49 222.51 256 112 366.51 145.49 400 256 289.49 366.51 400 400 366.51 289.49 256 400 145.49" />
        </svg>
    </button>
    <ul class="flex flex-col gap-4 mt-10">
        <li>
            <a href="<?= BASEURL ?>/"
                class="rounded-full bg-primary text-white flex items-center hover:bg-info gap-3 px-4 py-2">
                <img src="<?= BASEURL ?>/img/home_white.svg" alt="home">
                <span class="uppercase font-semibold text-lg">homepage</span>
            </a>
        </li>
        <li>
            <a href="<?= BASEURL ?>/"
                class="rounded-full bg-primary text-white flex items-center hover:bg-info gap-3 px-4 py-2">
                <img src="<?= BASEURL ?>/img/person_white.svg" alt="person">
                <span class="uppercase font-semibold text-lg">profil saya</span>
            </a>
        </li>
        <li>
            <a href="<?= BASEURL ?>/"
                class="rounded-full bg-primary text-white flex items-center hover:bg-info gap-3 px-4 py-2">
                <img src="<?= BASEURL ?>/img/book_white.svg" alt="book">
                <span class="uppercase font-semibold text-lg">skema sertifikasi</span>
            </a>
        </li>
    </ul>
</div>