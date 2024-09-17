'use strict'

var signaturePadPasien_138 = ''
var signaturePadSaksi_138 = ''
var validator_138 = ''

var Erm138 = (function () {
  let is_tab = $('[data-is_tab]').data('is_tab')

  let handleForm138 = () => {
    const form = document.getElementById('form_138')

    validator_138 = FormValidation.formValidation(form, {
      fields: {
        notes_138_status_pemberi_pernyataan: {
          validators: {
            notEmpty: {
              message: 'Mohon pilih status pemberi pernyataan'
            }
          }
        },
        notes_138_dokter_pelaksanaan_tindakan: {
          validators: {
            notEmpty: {
              message: 'Mohon isi dokter pelaksanaan tindakan'
            }
          }
        },
        notes_138_penerima_informasi: {
          validators: {
            notEmpty: {
              message: 'Mohon isi pemerima informasi'
            }
          }
        },
        notes_138_penerima_informasi: {
          validators: {
            notEmpty: {
              message: 'Mohon isi pemerima informasi'
            }
          }
        },
        notes_138_nama_saksi: {
          validators: {
            notEmpty: {
              message: 'Mohon isi nama saksi'
            }
          }
        },
        notes_138_ttd_pasien: {
          validators: {
            notEmpty: {
              message: 'Mohon isi tanda tangan pasien'
            }
          }
        },
        notes_138_ttd_saksi: {
          validators: {
            notEmpty: {
              message: 'Mohon isi tanda tangan saksi'
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

    $('#form_138').on('submit', function (e) {
      e.preventDefault()

      if (!signaturePadPasien_138.isEmpty()) {
        $('input[name=notes_138_ttd_pasien]').val(
          signaturePadPasien_138.toDataURL('image/png')
        )
      }
      if (!signaturePadSaksi_138.isEmpty()) {
        $('input[name=notes_138_ttd_saksi]').val(
          signaturePadSaksi_138.toDataURL('image/png')
        )
      }
     

      if (validator_138) {
        validator_138.validate().then(function (status) {
          if (status == 'Valid') {
            showOverlay('Proses menyimpan data . . .')

            let data = $('#form_138').serialize()
            let url = $('#form_138').attr('href')

            $.ajax({
              url: url,
              type: 'POST',
              dataType: 'JSON',
              data,
              success: data => {
                hideOverlay()

                $('#form_138')
                  .find('#csrf_token_hash_138')
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

                  $('#form_138')
                    .find('#csrf_token_hash_138')
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
    signaturePadPasien_138 = new SignaturePad(
      document.getElementById('notes_138_ttd_pasien'),
      {
        penColor: '#000000'
      }
    )
    $('#clear_notes_138_ttd_pasien').click(function (e) {
      e.preventDefault()

      signaturePadPasien_138.clear()
      $('input[name=notes_138_ttd_pasien]').val('')
    })
    $('#undo_notes_138_ttd_pasien').click(function (e) {
      e.preventDefault()

      var data_signature_pad = signaturePadPasien_138.toData()
      if (data_signature_pad) {
        data_signature_pad.pop()
        signaturePadPasien_138.fromData(data_signature_pad)
      }
    })
    signaturePadPasien_138.fromDataURL(
      $('input[name=notes_138_ttd_pasien]').val()
    )

    

    signaturePadSaksi_138 = new SignaturePad(
      document.getElementById('notes_138_ttd_saksi'),
      {
        penColor: '#000000'
      }
    )
    $('#clear_notes_138_ttd_saksi').click(function (e) {
      e.preventDefault()

      signaturePadSaksi_138.clear()
      $('input[name=notes_138_ttd_saksi]').val('')
    })
    $('#undo_notes_138_ttd_saksi').click(function (e) {
      e.preventDefault()

      var data_signature_pad = signaturePadSaksi_138.toData()
      if (data_signature_pad) {
        data_signature_pad.pop()
        signaturePadSaksi_138.fromData(data_signature_pad)
      }
    })
    signaturePadSaksi_138.fromDataURL(
      $('input[name=notes_138_ttd_saksi]').val()
    )

  }

  let handlePemberiPertanyaan = () => {
    $('input[name=notes_138_status_pemberi_pernyataan]').change(function (e) {
      e.preventDefault()

      if ($(this).val() == 'Pasien') {
        $('[name=notes_138_telpon_pemberi_pernyataan]').val('')
        $('[name=notes_138_nama_pemberi_pernyataan]').val('')
        $('[name=notes_138_umur_pemberi_pernyataan]').val('')
        $('[name=notes_138_alamat_pemberi_pernyataan]').val('')
        $('[name=notes_138_pekerjaan_pemberi_pernyataan]').val('')

        $('[name=notes_138_telpon_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_138_nama_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_138_umur_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_138_alamat_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_138_pekerjaan_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')

        let note_fields = [
          'notes_138_telpon_pemberi_pernyataan',
          'notes_138_nama_pemberi_pernyataan',
          'notes_138_umur_pemberi_pernyataan',
          'notes_138_alamat_pemberi_pernyataan',
          'notes_138_pekerjaan_pemberi_pernyataan'
        ]

        let fv_fields = validator_138.getFields()
        $.each(fv_fields, function (k, v) {
          if (note_fields.includes(k)) {
            validator_138.removeField(k)
          }
        })
      } else {
        $('[name=notes_138_telpon_pemberi_pernyataan]').val('')
        $('[name=notes_138_nama_pemberi_pernyataan]').val('')
        $('[name=notes_138_umur_pemberi_pernyataan]').val('')
        $('[name=notes_138_alamat_pemberi_pernyataan]').val('')
        $('[name=notes_138_pekerjaan_pemberi_pernyataan]').val('')

        $('[name=notes_138_telpon_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_138_nama_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_138_umur_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_138_alamat_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_138_pekerjaan_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        

        validator_138.addField('notes_138_telpon_pemberi_pernyataan', {
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
        
        validator_138.addField('notes_138_nama_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi nama pemberi pernyataan'
            }
          }
        })
        validator_138.addField('notes_138_umur_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi umur pemberi pernyataan'
            }
          }
        })
        validator_138.addField('notes_138_alamat_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi alamat pemberi pernyataan'
            }
          }
        })
        validator_138.addField('notes_138_pekerjaan_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi pekerjaan pemberi pernyataan'
            }
          }
        })
       
      }
    })
  }

  let handleDelete138 = () => {
    $('#delete_138').click(function (e) {
      e.preventDefault()

      let url = $(this).attr('href')
      let csrf_name = $('#csrf_token_hash_138').attr('name')
      let csrf_token = $('#csrf_token_hash_138').val()

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

            $('#form_138')
              .find('#csrf_token_hash_138')
              .val(data.responseJSON.csrf_token_hash)
          }
        }
      })
    })
  }

  return {
    init: () => {
      handleForm138(),
        handleSignaturePad(),
        handlePemberiPertanyaan(),
        handleDelete138()
    }
  }
})()

jQuery(document).ready(function () {
  Erm138.init()
  KTApp.init()
  $('#erm_131 .label_id_visit:first').trigger('click')
  $('#erm_131 input[name="id_visit"]:first').trigger('click')
})
