// When an option is changed, search the above for matching choices
$('select[name="jurusan"]').on('change', function () {
  // Set selected option as variable
  var selectValue = $(this).val();

  // Empty the target field
  $('select[name="prodi"]').empty();

  // For each chocie in the selected option
  for (let i = 0; i < prodi[selectValue].length; i++) {
    // Output choice in the target field
    $('select[name="prodi"]').append("<option value='" + prodi[selectValue][i] + "'>" + prodi[selectValue][i] + '</option>');
  }
});

$('#close-alert').click(function () {
  $('.alert').addClass('hidden');
});
