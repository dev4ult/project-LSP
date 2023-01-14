let selectedJurusan = $('#nama-jurusan').text();
let selectedProdi = $('#nama-prodi').text();

$('select[name="prodi"]').empty();
for (let i = 0; i < prodi[selectedJurusan].length; i++) {
  // Output choice in the target field
  $('select[name="prodi"]').append('<option ' + (selectedProdi == prodi[selectedJurusan][i] ? 'disabled selected' : '') + " value='" + prodi[selectedJurusan][i] + "'>" + prodi[selectedJurusan][i] + '</option>');
}
