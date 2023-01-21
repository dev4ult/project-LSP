<?php $tb_limit = (int)$data['limit'] ?>
<form action="<?= BASEURL ?>/<?= $data['url'] ?>" method="post" class="flex gap-3 items-center">
    <select class="select rounded-sm select-sm w-fit max-w-xs" name="table-limit">
        <?php $arr_limit = [5, 10, 25, 100]; ?>
        <?php foreach ($arr_limit as $limit) : ?>
        <option <?= ($limit == $tb_limit) ? "disabled selected" : "" ?> value="<?= $limit ?>"><?= $limit ?></option>
        <?php endforeach ?>
    </select>
    <button type="submit" class="text-primary uppercase font-semibold">ubah</button>
</form>