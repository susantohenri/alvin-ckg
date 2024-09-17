'use strict'

var signaturePadPasien_118 = ''
var validator_118 = ''

var Erm118 = (function () {
  let is_tab = $('[data-is_tab]').data('is_tab')

  let handleForm118 = () => {
    const form = document.getElementById('form_118')

    validator_118 = FormValidation.formValidation(form, {
      fields: {
        notes_118_status_pemberi_pernyataan: {
          validators: {
            notEmpty: {
              message: 'Mohon pilih status pemberi pernyataan'
            }
          }
        },
        notes_118_ttd_pasien: {
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

    $('#form_118').on('submit', function (e) {
      e.preventDefault()

      if (!signaturePadPasien_118.isEmpty()) {
        $('input[name=notes_118_ttd_pasien]').val(
          signaturePadPasien_118.toDataURL('image/png')
        )
      }

      if (validator_118) {
        validator_118.validate().then(function (status) {
          if (status == 'Valid') {
            showOverlay('Proses menyimpan data . . .')

            let data = $('#form_118').serialize()
            let url = $('#form_118').attr('href')

            $.ajax({
              url: url,
              type: 'POST',
              dataType: 'JSON',
              data,
              success: data => {
                hideOverlay()

                $('#form_118')
                  .find('#csrf_token_hash_118')
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

                  $('#form_118')
                    .find('#csrf_token_hash_118')
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
    signaturePadPasien_118 = new SignaturePad(
      document.getElementById('notes_118_ttd_pasien'),
      {
        penColor: '#000000'
      }
    )

    $('#clear_notes_118_ttd_pasien').click(function (e) {
      e.preventDefault()

      signaturePadPasien_118.clear()
      $('input[name=notes_118_ttd_pasien]').val('')
    })

    $('#undo_notes_118_ttd_pasien').click(function (e) {
      e.preventDefault()

      var data_signature_pad = signaturePadPasien_118.toData()
      if (data_signature_pad) {
        data_signature_pad.pop()
        signaturePadPasien_118.fromData(data_signature_pad)
      }
    })

    signaturePadPasien_118.fromDataURL(
      $('input[name=notes_118_ttd_pasien]').val()
    )
  }

  let handlePemberiPertanyaan = () => {
    $('input[name=notes_118_status_pemberi_pernyataan]').change(function (e) {
      e.preventDefault()

      if ($(this).val() == 'Pasien') {
        $('[name=notes_118_nama_pemberi_pernyataan]').val('')
        $('[name=notes_118_alamat_pemberi_pernyataan]').val('')
        $('[name=notes_118_telpon_pemberi_pernyataan]').val('')
        $('[name=notes_118_no_ktp_pemberi_pernyataan]').val('')

        $('[name=notes_118_nama_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_118_alamat_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_118_telpon_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_118_no_ktp_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')

        let note_fields = [
          'notes_118_nama_pemberi_pernyataan',
          'notes_118_alamat_pemberi_pernyataan',
          'notes_118_telpon_pemberi_pernyataan',
          'notes_118_no_ktp_pemberi_pernyataan'
        ]

        let fv_fields = validator_118.getFields()
        $.each(fv_fields, function (k, v) {
          if (note_fields.includes(k)) {
            validator_118.removeField(k)
          }
        })
      } else {
        $('[name=notes_118_nama_pemberi_pernyataan]').val('')
        $('[name=notes_118_alamat_pemberi_pernyataan]').val('')
        $('[name=notes_118_telpon_pemberi_pernyataan]').val('')
        $('[name=notes_118_no_ktp_pemberi_pernyataan]').val('')
        
        $('[name=notes_118_nama_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_118_alamat_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_118_telpon_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_118_no_ktp_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')

        validator_118.addField('notes_118_telpon_pemberi_pernyataan', {
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
        validator_118.addField('notes_118_nama_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi nama pemberi pernyataan'
            }
          }
        })
        validator_118.addField('notes_118_alamat_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi alamat pemberi pernyataan'
            }
          }
        })
        validator_118.addField('notes_118_ttd_pasien', {
          validators: {
            notEmpty: {
              message: 'Mohon isi tanda tangan pasien'
            }
          }
        })
        validator_118.addField('notes_118_no_ktp_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi no ktp pemberi pernyataan'
            },
            numeric: {
                message: 'Nomor ktp harus berupa angka'
            },
          }
        })
        
      }
    })
  }

  let handleDelete118 = () => {
    $('#delete_118').click(function (e) {
      e.preventDefault()

      let url = $(this).attr('href')
      let csrf_name = $('#csrf_token_hash_118').attr('name')
      let csrf_token = $('#csrf_token_hash_118').val()

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

            $('#form_118')
              .find('#csrf_token_hash_118')
              .val(data.responseJSON.csrf_token_hash)
          }
        }
      })
    })
  }

  return {
    init: () => {
      handleForm118(),
        handleSignaturePad(),
        handlePemberiPertanyaan(),
        handleDelete118()
    }
  }
})()

jQuery(document).ready(function () {
  Erm118.init()
  KTApp.init()
  $('#erm_131 .label_id_visit:first').trigger('click')
  $('#erm_131 input[name="id_visit"]:first').trigger('click')
})
