'use strict'

var signaturePadPasien_11 = ''
var validator_11 = ''

var Erm11 = (function () {
  let is_tab = $('[data-is_tab]').data('is_tab')

  let handleForm11 = () => {
    const form = document.getElementById('form_11')

    validator_11 = FormValidation.formValidation(form, {
      fields: {
        // diagnosa_awal: {
        //   validators: {
        //     notEmpty: {
        //       message: 'Mohon isi diagnosa awal'
        //     }
        //   }
        // },
        // diagnosa_akhir: {
        //   validators: {
        //     notEmpty: {
        //       message: 'Mohon isi diagnosa akhir'
        //     }
        //   }
        // },
        // diagnosa_banding: {
        //   validators: {
        //     notEmpty: {
        //       message: 'Mohon isi diagnosa banding'
        //     }
        //   }
        // },
        // terapi_obat: {
        //   validators: {
        //     notEmpty: {
        //       message: 'Mohon isi terapi obat'
        //     }
        //   }
        // },
      },

      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap: new FormValidation.plugins.Bootstrap5({
          rowSelector: '.fv-row',
          eleInvalidClass: '',
          eleValidClass: ''
        })
      }
    })

    $('#form_11').on('submit', function (e) {
      e.preventDefault()

      if (validator_11) {
        validator_11.validate().then(function (status) {
          if (status == 'Valid') {
            showOverlay('Proses menyimpan data . . .')

            let data = $('#form_11').serialize()
            let url = $('#form_11').attr('href')

            $.ajax({
              url: url,
              type: 'POST',
              dataType: 'JSON',
              data,
              success: data => {
                hideOverlay()

                $('#form_11')
                  .find('#csrf_token_hash_11')
                  .val(data.csrf_token_hash)

                if ($('.nav-link.active').length > 0) {
                  $('.nav-link.active').trigger('click')
                } else {
                  location.reload()
                }
              },
              error: data => {
                hideOverlay()

                if (typeof data.responseJSON == 'undefined') {
                  alert(`${data.status} - ${data.statusText}`)
                } else {
                  alert(data.responseJSON.message)

                  $('#form_11')
                    .find('#csrf_token_hash_11')
                    .val(data.responseJSON.csrf_token_hash)
                }
              }
            })
          }
        })
      }
    })
  }

  let handleDelete11 = () => {
    $('#delete_11').click(function (e) {
      e.preventDefault()

      let url = $(this).attr('href')
      let csrf_name = $('#csrf_token_hash_11').attr('name')
      let csrf_token = $('#csrf_token_hash_11').val()

      let conf = confirm('Apakah anda yakin akan menghapus berkas ini ?')

      if (!conf) {
        return false
      }

      showOverlay('Proses menghapus berkas . . .')

      $.ajax({
        url: url,
        type: 'POST',
        dataType: 'JSON',
        data: {
          [csrf_name]: csrf_token
        },
        success: data => {
          hideOverlay()

          if ($('.nav-link.active').length > 0) {
            $('.nav-link.active').trigger('click')
          } else {
            location.reload()
          }
        },
        error: data => {
          hideOverlay()

          if (typeof data.responseJSON == 'undefined') {
            alert(`${data.status} - ${data.statusText}`)
          } else {
            alert(data.responseJSON.message)

            $('#form_11')
              .find('#csrf_token_hash_11')
              .val(data.responseJSON.csrf_token_hash)
          }
        }
      })
    })
  }

  return {
    init: () => {
      handleForm11(),
      handleDelete11()
    }
  }
})()

jQuery(document).ready(function () {
  Erm11.init()
  KTApp.init()
  $('#erm_131 .label_id_visit:first').trigger('click')
  $('#erm_131 input[name="id_visit"]:first').trigger('click')
})
