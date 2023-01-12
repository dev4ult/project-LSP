<?php $tb_limit = (int)$data['limit'] ?>
<form action="<?= BASEURL ?>/<?= $data['url'] ?>" method="post" class="mb-5 flex gap-3 items-center">
    <p>Data</p>
    <select class="select select-bordered select-sm w-fit max-w-xs" name="table-limit">
        <?php $arr_limit = [5, 10, 25, 100]; ?>
        <?php foreach ($arr_limit as $limit) : ?>
        <option <?= ($limit == $tb_limit) ? "disabled selected" : "" ?> value="<?= $limit ?>"><?= $limit ?></option>
        <?php endforeach ?>
    </select>
    <button type="submit" class="btn btn-sm">go</button>
</form>