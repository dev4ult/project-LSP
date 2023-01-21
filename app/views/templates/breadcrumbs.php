<div class="text-xl font-semibold breadcrumbs">
    <ul>
        <li><a href="<?= BASEURL ?>">
                <img src="<?= BASEURL ?>/img/home.svg" class="w-6" alt="home">
            </a></li>
        <?php for ($i = 0; $i < count($data["page-link"]["name"]); $i++) : ?>
        <li><a href="<?= BASEURL ?>/<?= $data["page-link"]["link"][$i] ?>"
                class="text-primary"><?= $data["page-link"]["name"][$i] ?></a></li>
        <?php endfor; ?>
        <li><?= $data["page-title"] ?></li>
    </ul>
</div>