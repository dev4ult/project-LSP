<a href="<?= BASEURL ?>/asesor/info/<?= $data['id-skema'] ?>" class="btn btn-outline btn-warning my-5">Back</a>

<h1 class="text-3xl text-center font-bold uppercase mb-8">DAFTAR PENILAIAN</h1>

<form action="<?= BASEURL ?>/asesor/addPenilaian/<?= $data['id-skema'] ?>/<?= $data['id-asesi'] ?>" method="post" class="mb-8">
  <table class="table table-zebra w-full">
    <!-- head -->
    <thead>
      <tr class="text-center text-5xl">
        <th>No.</th>
        <th>Nama Kompetensi</th>
        <th>Tanggal Ujian</th>
        <th>File Soal</th>
        <th>Jawaban Asesi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      <?php $no = 1;
      $file = "";
      $notMatch = true; ?>
      <?php if (count($data['list-kompetensi']) > 0) : ?>
        <?php foreach ($data['list-kompetensi'] as $ds) : ?>

          <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td><?= $ds['nama_kompetensi']; ?></td>
            <td><?= $ds['tgl_ujian_kompetensi']; ?></td>
            <?php if ($ds['file_opsional'] != null) : ?>
              <td><?= $ds['file_opsional']; ?></td>
            <?php else : ?>
              <td>Tidak ada file soal</td>
            <?php endif; ?>
            <?php if (count($data['list-dokumen-asesi']) > 0) : ?>
              <?php foreach ($data['list-dokumen-asesi'] as $dd) : ?>
                <?php $notMatch = true; ?>
                <?php if ($dd['id'] == $ds['id']) : ?>
                  <td><?= $dd['file']; ?></td>
                  <?php $notMatch = false;
                  break; ?>
                <?php endif; ?>
              <?php endforeach; ?>
            <?php endif; ?>
            <?php if (count($data['list-dokumen-asesi']) == 0 || ($notMatch == true)) : ?>
              <td>Tidak file jawaban</td>
            <?php endif; ?>
            <td class="text-center flex items-center justify-around">
              <?php if (isset($data['nilai-asesi'])) : ?>
                <?php foreach ($data['nilai-asesi'] as $na) : ?>
                  <?php $notMatch = true; ?>
                  <?php if ($na['id'] == $ds['id']) : ?>
                    <select class="select select-bordered" id="nilai" name="nilai[]">
                      <option disabled>-- Pilih Nilai --</option>
                      <?php if ($na['nilai'] == "A") : ?>
                        <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/A" selected>A</option>
                        <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/B">B</option>
                        <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/C">C</option>
                        <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/D">D</option>
                      <?php endif ?>
                      <?php if ($na['nilai'] == "B") : ?>
                        <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/A">A</option>
                        <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/B" selected>B</option>
                        <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/C">C</option>
                        <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/D">D</option>
                      <?php endif ?>
                      <?php if ($na['nilai'] == "C") : ?>
                        <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/A">A</option>
                        <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/B">B</option>
                        <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/C" selected>C</option>
                        <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/D">D</option>
                      <?php endif ?>
                      <?php if ($na['nilai'] == "D") : ?>
                        <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/A">A</option>
                        <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/B">B</option>
                        <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/C">C</option>
                        <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/D" selected>D</option>
                      <?php endif ?>
                    </select>
                    <?php $notMatch = false;
                    break; ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              <?php endif; ?>
              <?php if (!isset($data['nilai-asesi']) || $notMatch) : ?>
                <select class="select select-bordered" id="nilai" name="nilai[]">
                  <option disabled selected>-- Pilih Nilai --</option>
                  <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/A">A</option>
                  <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/B">B</option>
                  <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/C">C</option>
                  <option value="<?= $ds['id']; ?>/<?= $data['id-asesi']; ?>/D">D</option>
                </select>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else : ?>
        <tr>
          <td>
            <h1 class="text-lg">Belum ada Asesi Terdaftar</h1>
          </td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
  <button type="submit" class="btn btn-info text-white my-5">Beri Nilai</button>
</form>