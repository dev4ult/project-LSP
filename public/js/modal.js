// document.addEventListener("click", (el) => {
// 	el.preventDefault;
// 	// console.log(e.target);
// 	if (el.target.classList.contains("show-syarat")) {
// 		// console.log("test");
// 	}
// });

$(document).ready(() => {
  $(document).on('click', (el) => {
    // el.preventDefault();
    // console.log(e.target);
    if ($(el.target).hasClass('show-syarat')) {
      const data = {
        skema: $(el.target).data('skema'),
        level: $(el.target).data('level'),
      };
      $.ajax({
        url: 'http://localhost/FILE_PROJECT/project-lsp/public/skema/getSyaratSkema/',
        data: data,
        dataType: 'json',
        method: 'post',
        success: (syarat) => {
          // console.log(templateSyaratUmum(syarat[0]));
          // console.log(templateSyaratUmum(syarat[1]));
          let ket1 = syarat[0].length > 0 ? templateSyarat(syarat[0]) : 'Belum ada persyaratan';
          $('.input-umum').html(ket1);
          let ket2 = syarat[1].length > 0 ? templateSyarat(syarat[1]) : 'Belum ada persyaratan';
          $('.input-teknis').html(ket2);
        },
      });
    }
  });

  const templateSyarat = ($arrUmum) => {
    let str = '';
    $arrUmum.forEach((el) => {
      str += `<li>${el.deskripsi}</li>`;
    });
    return str;
  };
});
