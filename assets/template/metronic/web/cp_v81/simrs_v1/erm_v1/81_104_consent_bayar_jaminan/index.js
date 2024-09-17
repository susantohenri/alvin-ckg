'use strict'

var signaturePadPasien_104 = ''
var validator_104 = ''

var Erm104 = (function () {
  let is_tab = $('[data-is_tab]').data('is_tab')

  let handleForm104 = () => {
    const form = document.getElementById('form_104')

    validator_104 = FormValidation.formValidation(form, {
      fields: {
        notes_104_status_pemberi_pernyataan: {
          validators: {
            notEmpty: {
              message: 'Mohon pilih status pemberi pernyataan'
            }
          }
        },
        notes_104_no_bpjs_pasien: {
          validators: {
            notEmpty: {
              message: 'Mohon isi no bpjs'
            }
          }
        },
        notes_104_kelas_bpjs_pasien: {
          validators: {
            notEmpty: {
              message: 'Mohon isi kelas bpjs'
            }
          }
        },
        notes_104_ttd_pasien: {
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

    $('#form_104').on('submit', function (e) {
      e.preventDefault()

      if (!signaturePadPasien_104.isEmpty()) {
        $('input[name=notes_104_ttd_pasien]').val(
          signaturePadPasien_104.toDataURL('image/png')
        )
      }

      if (validator_104) {
        validator_104.validate().then(function (status) {
          if (status == 'Valid') {
            showOverlay('Proses menyimpan data . . .')

            let data = $('#form_104').serialize()
            let url = $('#form_104').attr('href')

            $.ajax({
              url: url,
              type: 'POST',
              dataType: 'JSON',
              data,
              success: data => {
                hideOverlay()

                $('#form_104')
                  .find('#csrf_token_hash_104')
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

                  $('#form_104')
                    .find('#csrf_token_hash_104')
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
    signaturePadPasien_104 = new SignaturePad(
      document.getElementById('notes_104_ttd_pasien'),
      {
        penColor: '#000000'
      }
    )

    $('#clear_notes_104_ttd_pasien').click(function (e) {
      e.preventDefault()

      signaturePadPasien_104.clear()
      $('input[name=notes_104_ttd_pasien]').val('')
    })

    $('#undo_notes_104_ttd_pasien').click(function (e) {
      e.preventDefault()

      var data_signature_pad = signaturePadPasien_104.toData()
      if (data_signature_pad) {
        data_signature_pad.pop()
        signaturePadPasien_104.fromData(data_signature_pad)
      }
    })

    signaturePadPasien_104.fromDataURL(
      $('input[name=notes_104_ttd_pasien]').val()
    )
  }

  let handlePemberiPertanyaan = () => {
    $('input[name=notes_104_status_pemberi_pernyataan]').change(function (e) {
      e.preventDefault()

      if ($(this).val() == 'Pasien') {
        $('[name=notes_104_telpon_pemberi_pernyataan]').val('')
        $('[name=notes_104_nama_pemberi_pernyataan]').val('')
        $('[name=notes_104_umur_pemberi_pernyataan]').val('')
        $('[name=notes_104_alamat_pemberi_pernyataan]').val('')

        $('[name=notes_104_telpon_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_104_nama_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_104_umur_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_104_alamat_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')

        let note_fields = [
          'notes_104_telpon_pemberi_pernyataan',
          'notes_104_nama_pemberi_pernyataan',
          'notes_104_umur_pemberi_pernyataan',
          'notes_104_alamat_pemberi_pernyataan'
        ]

        let fv_fields = validator_104.getFields()
        $.each(fv_fields, function (k, v) {
          if (note_fields.includes(k)) {
            validator_104.removeField(k)
          }
        })
      } else {
        $('[name=notes_104_telpon_pemberi_pernyataan]').val('')
        $('[name=notes_104_nama_pemberi_pernyataan]').val('')
        $('[name=notes_104_umur_pemberi_pernyataan]').val('')
        $('[name=notes_104_alamat_pemberi_pernyataan]').val('')
        
        $('[name=notes_104_telpon_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_104_nama_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_104_umur_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_104_alamat_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')

        validator_104.addField('notes_104_telpon_pemberi_pernyataan', {
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
        validator_104.addField('notes_104_nama_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi nama pemberi pernyataan'
            }
          }
        })
        validator_104.addField('notes_104_umur_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi umur pemberi pernyataan'
            }
          }
        })
        validator_104.addField('notes_104_alamat_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi alamat pemberi pernyataan'
            }
          }
        })
      }
    })
  }

  let handleDelete104 = () => {
    $('#delete_104').click(function (e) {
      e.preventDefault()

      let url = $(this).attr('href')
      let csrf_name = $('#csrf_token_hash_104').attr('name')
      let csrf_token = $('#csrf_token_hash_104').val()

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

            $('#form_104')
              .find('#csrf_token_hash_104')
              .val(data.responseJSON.csrf_token_hash)
          }
        }
      })
    })
  }

  return {
    init: () => {
      handleForm104(),
        handleSignaturePad(),
        handlePemberiPertanyaan(),
        handleDelete104()
    }
  }
})()

jQuery(document).ready(function () {
  Erm104.init()
  KTApp.init()
  $('#erm_131 .label_id_visit:first').trigger('click')
  $('#erm_131 input[name="id_visit"]:first').trigger('click')
})
