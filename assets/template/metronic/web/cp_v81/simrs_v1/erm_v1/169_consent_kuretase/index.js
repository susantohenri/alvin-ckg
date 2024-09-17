'use strict'

var signaturePadPasien_169 = ''
var signaturePadSaksi_169 = ''
var validator_169 = ''

var Erm169 = (function () {
  let is_tab = $('[data-is_tab]').data('is_tab')

  let handleForm169 = () => {
    const form = document.getElementById('form_169')

    validator_169 = FormValidation.formValidation(form, {
      fields: {
        notes_169_status_pemberi_pernyataan: {
          validators: {
            notEmpty: {
              message: 'Mohon pilih status pemberi pernyataan'
            }
          }
        },
        notes_169_ttd_pasien: {
          validators: {
            notEmpty: {
              message: 'Mohon isi tanda tangan pasien'
            }
          }
        },
        notes_169_ttd_saksi: {
          validators: {
            notEmpty: {
              message: 'Mohon isi tanda tangan saksi'
            }
          }
        },
        
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

    $('#form_169').on('submit', function (e) {
      e.preventDefault()

      if (!signaturePadPasien_169.isEmpty()) {
        $('input[name=notes_169_ttd_pasien]').val(
          signaturePadPasien_169.toDataURL('image/png')
        )
      }
      if (!signaturePadSaksi_169.isEmpty()) {
        $('input[name=notes_169_ttd_saksi]').val(
          signaturePadSaksi_169.toDataURL('image/png')
        )
      }

      if (validator_169) {
        validator_169.validate().then(function (status) {
          if (status == 'Valid') {
            showOverlay('Proses menyimpan data . . .')

            let data = $('#form_169').serialize()
            let url = $('#form_169').attr('href')

            $.ajax({
              url: url,
              type: 'POST',
              dataType: 'JSON',
              data,
              success: data => {
                hideOverlay()

                $('#form_169')
                  .find('#csrf_token_hash_169')
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

                  $('#form_169')
                    .find('#csrf_token_hash_169')
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
    signaturePadPasien_169 = new SignaturePad(
      document.getElementById('notes_169_ttd_pasien'),
      {
        penColor: '#000000'
      }
    )
    signaturePadSaksi_169 = new SignaturePad(
      document.getElementById('notes_169_ttd_saksi'),
      {
        penColor: '#000000'
      }
    )

    $('#clear_notes_169_ttd_pasien').click(function (e) {
      e.preventDefault()

      signaturePadPasien_169.clear()
      $('input[name=notes_169_ttd_pasien]').val('')
    })

    $('#clear_notes_169_ttd_saksi').click(function (e) {
      e.preventDefault()

      signaturePadSaksi_169.clear()
      $('input[name=clear_notes_169_ttd_saksi]').val('')
    })

    $('#undo_notes_169_ttd_pasien').click(function (e) {
      e.preventDefault()

      var data_signature_pad = signaturePadPasien_169.toData()
      if (data_signature_pad) {
        data_signature_pad.pop()
        signaturePadPasien_169.fromData(data_signature_pad)
      }
    })
    $('#undo_notes_169_ttd_saksi').click(function (e) {
      e.preventDefault()

      var data_signature_pad = signaturePadPasien_169.toData()
      if (data_signature_pad) {
        data_signature_pad.pop()
        signaturePadSaksi_169.fromData(data_signature_pad)
      }
    })

    signaturePadPasien_169.fromDataURL(
      $('input[name=notes_169_ttd_pasien]').val()
    )
    signaturePadSaksi_169.fromDataURL(
      $('input[name=notes_169_ttd_saksi]').val()
    )
  }

  let handlePemberiPertanyaan = () => {
    $('input[name=notes_169_status_pemberi_pernyataan]').change(function (e) {
      e.preventDefault()

      if ($(this).val() == 'Pasien') {
        $('[name=notes_169_telpon_pemberi_pernyataan]').val('')
        $('[name=notes_169_nama_pemberi_pernyataan]').val('')
        $('[name=notes_169_umur_pemberi_pernyataan]').val('')
        $('[name=notes_169_alamat_pemberi_pernyataan]').val('')
        $('[name=notes_169_pekerjaan_pemberi_pernyataan]').val('')

        $('[name=notes_169_telpon_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_169_nama_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_169_umur_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_169_alamat_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_169_pekerjaan_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_169_ttd_saksi]')
          .closest('.fv-row')
          .hide('fast')

        let note_fields = [
          'notes_169_telpon_pemberi_pernyataan',
          'notes_169_nama_pemberi_pernyataan',
          'notes_169_umur_pemberi_pernyataan',
          'notes_169_alamat_pemberi_pernyataan',
          'notes_169_pekerjaan_pemberi_pernyataan',
          'notes_169_ttd_saksi'
        ]

        let fv_fields = validator_169.getFields()
        $.each(fv_fields, function (k, v) {
          if (note_fields.includes(k)) {
            validator_169.removeField(k)
          }
        })
      } else {
        $('[name=notes_169_telpon_pemberi_pernyataan]').val('')
        $('[name=notes_169_nama_pemberi_pernyataan]').val('')
        $('[name=notes_169_umur_pemberi_pernyataan]').val('')
        $('[name=notes_169_alamat_pemberi_pernyataan]').val('')
        $('[name=notes_169_pekerjaan_pemberi_pernyataan]').val('')

        $('[name=notes_169_telpon_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_169_nama_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_169_umur_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_169_alamat_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_169_pekerjaan_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_169_ttd_saksi]')
          .closest('.fv-row')
          .show('fast')

        validator_169.addField('notes_169_telpon_pemberi_pernyataan', {
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
        
        validator_169.addField('notes_169_nama_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi nama pemberi pernyataan'
            }
          }
        })
        validator_169.addField('notes_169_umur_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi umur pemberi pernyataan'
            }
          }
        })
        validator_169.addField('notes_169_alamat_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi alamat pemberi pernyataan'
            }
          }
        })
        validator_169.addField('notes_169_pekerjaan_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi pekerjaan pemberi pernyataan'
            }
          }
        })
        validator_169.addField('notes_169_ttd_saksi', {
          validators: {
            notEmpty: {
              message: 'Mohon isi ttd saksi'
            }
          }
        })
      }
    })
  }

  let handleDelete169 = () => {
    $('#delete_169').click(function (e) {
      e.preventDefault()

      let url = $(this).attr('href')
      let csrf_name = $('#csrf_token_hash_169').attr('name')
      let csrf_token = $('#csrf_token_hash_169').val()

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

            $('#form_169')
              .find('#csrf_token_hash_169')
              .val(data.responseJSON.csrf_token_hash)
          }
        }
      })
    })
  }

  return {
    init: () => {
      handleForm169(),
        handleSignaturePad(),
        handlePemberiPertanyaan(),
        handleDelete169()
    }
  }
})()

jQuery(document).ready(function () {
  Erm169.init()
  KTApp.init()
  $('#erm_131 .label_id_visit:first').trigger('click')
  $('#erm_131 input[name="id_visit"]:first').trigger('click')
})
