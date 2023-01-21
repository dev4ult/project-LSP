const pendidikan_list = ['SD', 'SMP', 'SMA', 'SMK', 'D3', 'D4', 'S1', 'S2', 'S3'];

const pendidikan = $('#pendidikan').text().replace(/\s/g, '').toUpperCase();

for (let i = 0; i < pendidikan_list.length; i++) {
  $("select[name='pendidikan-terakhir']").append('<option ' + (pendidikan == pendidikan_list[i] ? 'disabled selected' : '') + " value='" + pendidikan_list[i] + "'>" + pendidikan_list[i] + '</option>');
  console.log(pendidikan_list[i]);
}
