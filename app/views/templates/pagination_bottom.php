<div class="btn-group rounded-sm mt-3">
    <?php if ($data['page'] > 1) : ?>

    <a href="<?= BASEURL ?>/<?= $data['page-controller'] ?>/<?= ($data['page'] <= 1) ? 1 : $data['page'] - 1 ?>"
        class="btn rounded-xs hover:border-secondary bg-base-100 hover:bg-secondary border-base-100 text-black hover:text-white">«</a>
    <?php endif ?>

    <?php if ($data['page'] > 2) : ?>
    <a href="<?= BASEURL ?>/<?= $data['page-controller'] ?>/<?= $data["page"] - 2 ?>"
        class="btn border-base-100 hover:border-secondary bg-base-100 hover:bg-secondary hover:text-white text-black"><?= $data["page"] - 2 ?></a>
    <?php endif ?>
    <?php if ($data['page'] > 1) : ?>

    <a href="<?= BASEURL ?>/<?= $data['page-controller'] ?>/<?= $data["page"] - 1 ?>"
        class="btn border-base-100 hover:border-secondary bg-base-100 hover:bg-secondary hover:text-white text-black"><?= $data["page"] - 1 ?></a>
    <?php endif ?>
    <button class="btn bg-black text-white border-black hover:border-black hover:bg-black"><?= $data["page"] ?></button>
    <?php if ($data['page-total'] >= $data['page'] + 1) : ?>
    <a href="<?= BASEURL ?>/<?= $data['page-controller'] ?>/<?= $data["page"] + 1 ?>"
        class="btn border-base-100 hover:border-secondary bg-base-100 hover:bg-secondary hover:text-white text-black"><?= $data["page"] + 1 ?></a>
    <?php endif ?>
    <?php if ($data['page-total'] >= $data['page'] + 2) : ?>
    <a href="<?= BASEURL ?>/<?= $data['page-controller'] ?>/<?= $data["page"] + 2 ?>"
        class="btn border-base-100 hover:border-secondary bg-base-100 hover:bg-secondary hover:text-white text-black"><?= $data["page"] + 2 ?></a>
    <?php endif ?>
    <?php if ($data['page-total'] != $data['page']) : ?>
    <a href="<?= BASEURL ?>/<?= $data['page-controller'] ?>/<?= $data['page'] + 1 ?>"
        class="btn rounded-xs hover:border-secondary bg-base-100 hover:bg-secondary border-base-100 hover:text-white text-black">»</a>
    <?php endif ?>
</div>