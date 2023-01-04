<div class="text-sm breadcrumbs">
    <ul>
        <?php for ($i = 0; $i < count($data["page"]); $i++) : ?>
        <li><a href="<?= BASEURL ?>/<?= $data["page"]["link"][$i] ?>"><?= $data["page"]["name"][$i] ?></a></li>
        <?php endfor; ?>
        <li><?= $data["page-title"] ?></li>
    </ul>
</div>