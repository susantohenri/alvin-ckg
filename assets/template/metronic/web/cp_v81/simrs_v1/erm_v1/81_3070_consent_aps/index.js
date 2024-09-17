'use strict'

var signaturePadPasien_3070 = ''
var validator_3070 = ''

var Erm3070 = (function () {
  let is_tab = $('[data-is_tab]').data('is_tab')

  let handleForm3070 = () => {
    const form = document.getElementById('form_3070')

    validator_3070 = FormValidation.formValidation(form, {
      fields: {
        notes_3070_status_pemberi_pernyataan: {
          validators: {
            notEmpty: {
              message: 'Mohon pilih status pemberi pernyataan'
            }
          }
        },
        notes_3070_prognosa: {
          validators: {
            notEmpty: {
              message: 'Mohon isi alasan pulang'
            }
          }
        },
        notes_3070_instruksi_pulang: {
          validators: {
            notEmpty: {
              message: 'Mohon isi intruksi pulang'
            }
          }
        },
        notes_3070_ttd_pasien: {
          validators: {
            notEmpty: {
              message: 'Mohon isi tanda tangan pasien'
            }
          }
        }
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

    $('#form_3070').on('submit', function (e) {
      e.preventDefault()

      if (!signaturePadPasien_3070.isEmpty()) {
        $('input[name=notes_3070_ttd_pasien]').val(
          signaturePadPasien_3070.toDataURL('image/png')
        )
      }

      if (validator_3070) {
        validator_3070.validate().then(function (status) {
          if (status == 'Valid') {
            showOverlay('Proses menyimpan data . . .')

            let data = $('#form_3070').serialize()
            let url = $('#form_3070').attr('href')

            $.ajax({
              url: url,
              type: 'POST',
              dataType: 'JSON',
              data,
              success: data => {
                hideOverlay()

                $('#form_3070')
                  .find('#csrf_token_hash_3070')
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

                  $('#form_3070')
                    .find('#csrf_token_hash_3070')
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
    signaturePadPasien_3070 = new SignaturePad(
      document.getElementById('notes_3070_ttd_pasien'),
      {
        penColor: '#000000'
      }
    )

    $('#clear_notes_3070_ttd_pasien').click(function (e) {
      e.preventDefault()

      signaturePadPasien_3070.clear()
      $('input[name=notes_3070_ttd_pasien]').val('')
    })

    $('#undo_notes_3070_ttd_pasien').click(function (e) {
      e.preventDefault()

      var data_signature_pad = signaturePadPasien_3070.toData()
      if (data_signature_pad) {
        data_signature_pad.pop()
        signaturePadPasien_3070.fromData(data_signature_pad)
      }
    })

    signaturePadPasien_3070.fromDataURL(
      $('input[name=notes_3070_ttd_pasien]').val()
    )
  }

  let handlePemberiPertanyaan = () => {
    $('input[name=notes_3070_status_pemberi_pernyataan]').change(function (e) {
      e.preventDefault()

      if ($(this).val() == 'Pasien') {
        $('[name=notes_3070_telpon_pemberi_pernyataan]').val('')
        $('[name=notes_3070_nama_pemberi_pernyataan]').val('')
        $('[name=notes_3070_tgl_lahir_pemberi_pernyataan]').val('')
        $('[name=notes_3070_jenis_kelamin_pemberi_pernyataan]').val('')

        $('[name=notes_3070_telpon_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_3070_nama_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_3070_tgl_lahir_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_3070_jenis_kelamin_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')

        let note_fields = [
          'notes_3070_telpon_pemberi_pernyataan',
          'notes_3070_nama_pemberi_pernyataan',
          'notes_3070_tgl_lahir_pemberi_pernyataan',
          'notes_3070_jenis_kelamin_pemberi_pernyataan'
        ]

        let fv_fields = validator_3070.getFields()
        $.each(fv_fields, function (k, v) {
          if (note_fields.includes(k)) {
            validator_3070.removeField(k)
          }
        })
      } else {
        $('[name=notes_3070_telpon_pemberi_pernyataan]').val('')
        $('[name=notes_3070_nama_pemberi_pernyataan]').val('')
        $('[name=notes_3070_tgl_lahir_pemberi_pernyataan]').val('')
        $('[name=notes_3070_jenis_kelamin_pemberi_pernyataan]').val('')
        
        $('[name=notes_3070_telpon_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_3070_nama_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_3070_tgl_lahir_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_3070_jenis_kelamin_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')

        validator_3070.addField('notes_3070_telpon_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi no. telp pemberi pernyataan'
            },
            numeric: {
              message: 'Nomor telepon harus berupa angka'
            },
            regexp: {
                regexp: /^628\d{7,17}$/,
                message: 'Telepon Pemberi pernyataan diawali dengan 628 dan terdiri dari 10-20 digit angka'
            }
          }
        })
        validator_3070.addField('notes_3070_nama_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi nama pemberi pernyataan'
            }
          }
        })
        validator_3070.addField('notes_3070_tgl_lahir_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi tanggal lahir pernyataan'
            }
          }
        })
        validator_3070.addField('notes_3070_jenis_kelamin_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi jenis kelamin pemberi pernyataan'
            }
          }
        })
      }
    })
  }

  let handleDelete3070 = () => {
    $('#delete_3070').click(function (e) {
      e.preventDefault()

      let url = $(this).attr('href')
      let csrf_name = $('#csrf_token_hash_3070').attr('name')
      let csrf_token = $('#csrf_token_hash_3070').val()

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

            $('#form_3070')
              .find('#csrf_token_hash_3070')
              .val(data.responseJSON.csrf_token_hash)
          }
        }
      })
    })
  }

  return {
    init: () => {
      handleForm3070(),
        handleSignaturePad(),
        handlePemberiPertanyaan(),
        handleDelete3070()
    }
  }
})()

jQuery(document).ready(function () {
  Erm3070.init()
  KTApp.init()
  $('#erm_131 .label_id_visit:first').trigger('click')
  $('#erm_131 input[name="id_visit"]:first').trigger('click')
})
