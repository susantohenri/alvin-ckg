'use strict'

var signaturePadPasien_108 = ''
var validator_108 = ''

var Erm108 = (function () {
  let is_tab = $('[data-is_tab]').data('is_tab')

  let handleForm108 = () => {
    const form = document.getElementById('form_108')

    validator_108 = FormValidation.formValidation(form, {
      fields: {
        notes_108_diagnosa_akhir: {
          validators: {
            notEmpty: {
              message: 'Mohon isi diagnosa akhir'
            }
          }
        },
        terapi: {
          validators: {
            notEmpty: {
              message: 'Mohon isi rekomendasi lanjutan / evaluasi terapi'
            }
          }
        },
        obat_terapi_pulang: {
          validators: {
            notEmpty: {
              message: 'Mohon isi terapi obat Pulang'
            }
          }
        },
        // notes_108_ttd_pasien: {
        //   validators: {
        //     notEmpty: {
        //       message: 'Mohon isi tanda tangan pasien'
        //     }
        //   }
        // }
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

    $('#form_108').on('submit', function (e) {
      e.preventDefault()

      // if (!signaturePadPasien_108.isEmpty()) {
      //   $('input[name=notes_108_ttd_pasien]').val(
      //     signaturePadPasien_108.toDataURL('image/png')
      //   )
      // }

      if (validator_108) {
        validator_108.validate().then(function (status) {
          if (status == 'Valid') {
            showOverlay('Proses menyimpan data . . .')

            let data = $('#form_108').serialize()
            let url = $('#form_108').attr('href')

            $.ajax({
              url: url,
              type: 'POST',
              dataType: 'JSON',
              data,
              success: data => {
                hideOverlay()

                $('#form_108')
                  .find('#csrf_token_hash_108')
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

                  $('#form_108')
                    .find('#csrf_token_hash_108')
                    .val(data.responseJSON.csrf_token_hash)
                }
              }
            })
          }
        })
      }
    })
  }

  let handleSignaturePad = () => {
    signaturePadPasien_108 = new SignaturePad(
      document.getElementById('notes_108_ttd_pasien'),
      {
        penColor: '#000000'
      }
    )

    $('#clear_notes_108_ttd_pasien').click(function (e) {
      e.preventDefault()

      signaturePadPasien_108.clear()
      $('input[name=notes_108_ttd_pasien]').val('')
    })

    $('#undo_notes_108_ttd_pasien').click(function (e) {
      e.preventDefault()

      var data_signature_pad = signaturePadPasien_108.toData()
      if (data_signature_pad) {
        data_signature_pad.pop()
        signaturePadPasien_108.fromData(data_signature_pad)
      }
    })

    signaturePadPasien_108.fromDataURL(
      $('input[name=notes_108_ttd_pasien]').val()
    )
  }


  let handleDelete108 = () => {
    $('#delete_108').click(function (e) {
      e.preventDefault()

      let url = $(this).attr('href')
      let csrf_name = $('#csrf_token_hash_108').attr('name')
      let csrf_token = $('#csrf_token_hash_108').val()

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

            $('#form_108')
              .find('#csrf_token_hash_108')
              .val(data.responseJSON.csrf_token_hash)
          }
        }
      })
    })
  }

  return {
    init: () => {
      handleForm108(),
        // handleSignaturePad(),
        handleDelete108()
    }
  }
})()

jQuery(document).ready(function () {
  Erm108.init()
  KTApp.init()
  $('#erm_131 .label_id_visit:first').trigger('click')
  $('#erm_131 input[name="id_visit"]:first').trigger('click')
})
