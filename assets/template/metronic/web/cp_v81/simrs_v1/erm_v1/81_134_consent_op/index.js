'use strict'

var signaturePadPasien_134 = ''
var signaturePadSaksi_134 = ''
var validator_134 = ''

var Erm134 = (function () {
  let is_tab = $('[data-is_tab]').data('is_tab')

  let handleForm134 = () => {
    const form = document.getElementById('form_134')

    validator_134 = FormValidation.formValidation(form, {
      fields: {
        notes_134_status_pemberi_pernyataan: {
          validators: {
            notEmpty: {
              message: 'Mohon pilih status pemberi pernyataan'
            }
          }
        },
        notes_134_dokter_pelaksanaan_tindakan: {
          validators: {
            notEmpty: {
              message: 'Mohon isi dokter pelaksanaan tindakan'
            }
          }
        },
        notes_134_penerima_informasi: {
          validators: {
            notEmpty: {
              message: 'Mohon isi pemerima informasi'
            }
          }
        },
        notes_134_penerima_informasi: {
          validators: {
            notEmpty: {
              message: 'Mohon isi pemerima informasi'
            }
          }
        },
        notes_134_nama_saksi: {
          validators: {
            notEmpty: {
              message: 'Mohon isi nama saksi'
            }
          }
        },
        notes_134_tindakan_medis: {
          validators: {
            notEmpty: {
              message: 'Mohon isi tindakan medis'
            }
          }
        },
        notes_134_ttd_pasien: {
          validators: {
            notEmpty: {
              message: 'Mohon isi tanda tangan pasien'
            }
          }
        },
        notes_134_ttd_saksi: {
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

    $('#form_134').on('submit', function (e) {
      e.preventDefault()

      if (!signaturePadPasien_134.isEmpty()) {
        $('input[name=notes_134_ttd_pasien]').val(
          signaturePadPasien_134.toDataURL('image/png')
        )
      }
     
      if (!signaturePadSaksi_134.isEmpty()) {
        $('input[name=notes_134_ttd_saksi]').val(
          signaturePadSaksi_134.toDataURL('image/png')
        )
      }
     

      if (validator_134) {
        validator_134.validate().then(function (status) {
          if (status == 'Valid') {
            showOverlay('Proses menyimpan data . . .')

            let data = $('#form_134').serialize()
            let url = $('#form_134').attr('href')

            $.ajax({
              url: url,
              type: 'POST',
              dataType: 'JSON',
              data,
              success: data => {
                hideOverlay()

                $('#form_134')
                  .find('#csrf_token_hash_134')
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

                  $('#form_134')
                    .find('#csrf_token_hash_134')
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
    signaturePadPasien_134 = new SignaturePad(
      document.getElementById('notes_134_ttd_pasien'),
      {
        penColor: '#000000'
      }
    )
    

    $('#clear_notes_134_ttd_pasien').click(function (e) {
      e.preventDefault()

      signaturePadPasien_134.clear()
      $('input[name=notes_134_ttd_pasien]').val('')
    })

   
    $('#undo_notes_134_ttd_pasien').click(function (e) {
      e.preventDefault()

      var data_signature_pad = signaturePadPasien_134.toData()
      if (data_signature_pad) {
        data_signature_pad.pop()
        signaturePadPasien_134.fromData(data_signature_pad)
      }
    })

    signaturePadPasien_134.fromDataURL(
      $('input[name=notes_134_ttd_pasien]').val()
    )


    



    signaturePadSaksi_134 = new SignaturePad(
      document.getElementById('notes_134_ttd_saksi'),
      {
        penColor: '#000000'
      }
    )
    

    $('#clear_notes_134_ttd_saksi').click(function (e) {
      e.preventDefault()

      signaturePadSaksi_134.clear()
      $('input[name=notes_134_ttd_saksi]').val('')
    })

   
    $('#undo_notes_134_ttd_saksi').click(function (e) {
      e.preventDefault()

      var data_signature_pad = signaturePadSaksi_134.toData()
      if (data_signature_pad) {
        data_signature_pad.pop()
        signaturePadSaksi_134.fromData(data_signature_pad)
      }
    })

    signaturePadSaksi_134.fromDataURL(
      $('input[name=notes_134_ttd_saksi]').val()
    )
  }

  let handlePemberiPertanyaan = () => {
    $('input[name=notes_134_status_pemberi_pernyataan]').change(function (e) {
      e.preventDefault()

      if ($(this).val() == 'Pasien') {
        $('[name=notes_134_telpon_pemberi_pernyataan]').val('')
        $('[name=notes_134_nama_pemberi_pernyataan]').val('')
        $('[name=notes_134_umur_pemberi_pernyataan]').val('')
        $('[name=notes_134_alamat_pemberi_pernyataan]').val('')
        $('[name=notes_134_pekerjaan_pemberi_pernyataan]').val('')

        $('[name=notes_134_telpon_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_134_nama_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_134_umur_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_134_alamat_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_134_pekerjaan_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')

        let note_fields = [
          'notes_134_telpon_pemberi_pernyataan',
          'notes_134_nama_pemberi_pernyataan',
          'notes_134_umur_pemberi_pernyataan',
          'notes_134_alamat_pemberi_pernyataan',
          'notes_134_pekerjaan_pemberi_pernyataan'
        ]

        let fv_fields = validator_134.getFields()
        $.each(fv_fields, function (k, v) {
          if (note_fields.includes(k)) {
            validator_134.removeField(k)
          }
        })
      } else {
        $('[name=notes_134_telpon_pemberi_pernyataan]').val('')
        $('[name=notes_134_nama_pemberi_pernyataan]').val('')
        $('[name=notes_134_umur_pemberi_pernyataan]').val('')
        $('[name=notes_134_alamat_pemberi_pernyataan]').val('')
        $('[name=notes_134_pekerjaan_pemberi_pernyataan]').val('')

        $('[name=notes_134_telpon_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_134_nama_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_134_umur_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_134_alamat_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_134_pekerjaan_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        

        validator_134.addField('notes_134_telpon_pemberi_pernyataan', {
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
        
        validator_134.addField('notes_134_nama_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi nama pemberi pernyataan'
            }
          }
        })
        validator_134.addField('notes_134_umur_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi umur pemberi pernyataan'
            }
          }
        })
        validator_134.addField('notes_134_alamat_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi alamat pemberi pernyataan'
            }
          }
        })
        validator_134.addField('notes_134_pekerjaan_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi pekerjaan pemberi pernyataan'
            }
          }
        })
       
      }
    })
  }

  let handleDelete134 = () => {
    $('#delete_134').click(function (e) {
      e.preventDefault()

      let url = $(this).attr('href')
      let csrf_name = $('#csrf_token_hash_134').attr('name')
      let csrf_token = $('#csrf_token_hash_134').val()

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

            $('#form_134')
              .find('#csrf_token_hash_134')
              .val(data.responseJSON.csrf_token_hash)
          }
        }
      })
    })
  }

  return {
    init: () => {
      handleForm134(),
        handleSignaturePad(),
        handlePemberiPertanyaan(),
        handleDelete134()
    }
  }
})()

jQuery(document).ready(function () {
  Erm134.init()
  KTApp.init()
  $('#erm_131 .label_id_visit:first').trigger('click')
  $('#erm_131 input[name="id_visit"]:first').trigger('click')
})
