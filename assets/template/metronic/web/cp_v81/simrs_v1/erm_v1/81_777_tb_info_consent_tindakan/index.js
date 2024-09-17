'use strict'

var signaturePadPasien_777 = ''
var signaturePadSaksi_777 = ''
var validator_777 = ''

var Erm777 = (function () {
  let is_tab = $('[data-is_tab]').data('is_tab')

  let handleForm777 = () => {
    const form = document.getElementById('form_777')

    validator_777 = FormValidation.formValidation(form, {
      fields: {
        notes_777_status_pemberi_pernyataan: {
          validators: {
            notEmpty: {
              message: 'Mohon pilih status pemberi pernyataan'
            }
          }
        },
        notes_777_ttd_pasien: {
          validators: {
            notEmpty: {
              message: 'Mohon isi tanda tangan pasien'
            }
          }
        },
        notes_777_ttd_saksi: {
          validators: {
            notEmpty: {
              message: 'Mohon isi tanda tangan saksi'
            }
          }
        },
        notes_777_nama_saksi: {
            validators: {
              notEmpty: {
                message: 'Mohon isi nama saksi'
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

    $('#form_777').on('submit', function (e) {
      e.preventDefault()

      if (!signaturePadPasien_777.isEmpty()) {
        $('input[name=notes_777_ttd_pasien]').val(
          signaturePadPasien_777.toDataURL('image/png')
        )
      }
      if (!signaturePadSaksi_777.isEmpty()) {
        $('input[name=notes_777_ttd_saksi]').val(
          signaturePadSaksi_777.toDataURL('image/png')
        )
      }
     

      if (validator_777) {
        validator_777.validate().then(function (status) {
          if (status == 'Valid') {
            showOverlay('Proses menyimpan data . . .')

            let data = $('#form_777').serialize()
            let url = $('#form_777').attr('href')

            $.ajax({
              url: url,
              type: 'POST',
              dataType: 'JSON',
              data,
              success: data => {
                hideOverlay()

                $('#form_777')
                  .find('#csrf_token_hash_777')
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

                  $('#form_777')
                    .find('#csrf_token_hash_777')
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
    signaturePadPasien_777 = new SignaturePad(
      document.getElementById('notes_777_ttd_pasien'),
      {
        penColor: '#000000'
      }
    )
    $('#clear_notes_777_ttd_pasien').click(function (e) {
      e.preventDefault()

      signaturePadPasien_777.clear()
      $('input[name=notes_777_ttd_pasien]').val('')
    })
    $('#undo_notes_777_ttd_pasien').click(function (e) {
      e.preventDefault()

      var data_signature_pad = signaturePadPasien_777.toData()
      if (data_signature_pad) {
        data_signature_pad.pop()
        signaturePadPasien_777.fromData(data_signature_pad)
      }
    })
    signaturePadPasien_777.fromDataURL(
      $('input[name=notes_777_ttd_pasien]').val()
    )



    signaturePadSaksi_777 = new SignaturePad(
        document.getElementById('notes_777_ttd_saksi'),
        {
          penColor: '#000000'
        }
      )
      $('#clear_notes_777_ttd_saksi').click(function (e) {
        e.preventDefault()
  
        signaturePadSaksi_777.clear()
        $('input[name=notes_777_ttd_saksi]').val('')
      })
      $('#undo_notes_777_ttd_saksi').click(function (e) {
        e.preventDefault()
  
        var data_signature_pad = signaturePadSaksi_777.toData()
        if (data_signature_pad) {
          data_signature_pad.pop()
          signaturePadSaksi_777.fromData(data_signature_pad)
        }
      })
      signaturePadSaksi_777.fromDataURL(
        $('input[name=notes_777_ttd_saksi]').val()
      )
  }

  let handlePemberiPertanyaan = () => {
    $('input[name=notes_777_status_pemberi_pernyataan]').change(function (e) {
      e.preventDefault()

      if ($(this).val() == 'Pasien') {
        $('[name=notes_777_telpon_pemberi_pernyataan]').val('')
        $('[name=notes_777_nama_pemberi_pernyataan]').val('')
        $('[name=notes_777_umur_pemberi_pernyataan]').val('')
        $('[name=notes_777_alamat_pemberi_pernyataan]').val('')
        $('[name=notes_777_pekerjaan_pemberi_pernyataan]').val('')

        $('[name=notes_777_telpon_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_777_nama_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_777_umur_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_777_alamat_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_777_pekerjaan_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')

        let note_fields = [
          'notes_777_telpon_pemberi_pernyataan',
          'notes_777_nama_pemberi_pernyataan',
          'notes_777_umur_pemberi_pernyataan',
          'notes_777_alamat_pemberi_pernyataan',
          'notes_777_pekerjaan_pemberi_pernyataan'
        ]

        let fv_fields = validator_777.getFields()
        $.each(fv_fields, function (k, v) {
          if (note_fields.includes(k)) {
            validator_777.removeField(k)
          }
        })
      } else {
        $('[name=notes_777_telpon_pemberi_pernyataan]').val('')
        $('[name=notes_777_nama_pemberi_pernyataan]').val('')
        $('[name=notes_777_umur_pemberi_pernyataan]').val('')
        $('[name=notes_777_alamat_pemberi_pernyataan]').val('')
        $('[name=notes_777_pekerjaan_pemberi_pernyataan]').val('')

        $('[name=notes_777_telpon_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_777_nama_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_777_umur_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_777_alamat_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_777_pekerjaan_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        

        validator_777.addField('notes_777_telpon_pemberi_pernyataan', {
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
        
        validator_777.addField('notes_777_nama_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi nama pemberi pernyataan'
            }
          }
        })
        validator_777.addField('notes_777_umur_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi umur pemberi pernyataan'
            }
          }
        })
        validator_777.addField('notes_777_alamat_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi alamat pemberi pernyataan'
            }
          }
        })
        validator_777.addField('notes_777_pekerjaan_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi pekerjaan pemberi pernyataan'
            }
          }
        })
       
      }
    })
  }

  let handleIsiInformasi = () => {
    $('input[name=notes_777_paraf_diagnosis2]').change(function (e) {
      e.preventDefault()

      if ($(this).val() == 'on') {
        
        let note_fields = [
          'notes_777_diagnosis',
        ]

        let fv_fields = validator_777.getFields()
        $.each(fv_fields, function (k, v) {
          if (note_fields.includes(k)) {
            validator_777.removeField(k)
          }
        })
      } 
    })
  }

  let handleDelete777 = () => {
    $('#delete_777').click(function (e) {
      e.preventDefault()

      let url = $(this).attr('href')
      let csrf_name = $('#csrf_token_hash_777').attr('name')
      let csrf_token = $('#csrf_token_hash_777').val()

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

            $('#form_777')
              .find('#csrf_token_hash_777')
              .val(data.responseJSON.csrf_token_hash)
          }
        }
      })
    })
  }

  return {
    init: () => {
      handleForm777(),
        handleSignaturePad(),
        handlePemberiPertanyaan(),
        handleIsiInformasi(),
        handleDelete777()
    }
  }
})()

jQuery(document).ready(function () {
  Erm777.init()
  KTApp.init()
  $('#erm_131 .label_id_visit:first').trigger('click')
  $('#erm_131 input[name="id_visit"]:first').trigger('click')
})
