'use strict'

var signaturePadPasien_41 = ''
var signaturePadSaksi_41 = ''
var validator_41 = ''

var Erm41 = (function () {
  let is_tab = $('[data-is_tab]').data('is_tab')

  let handleForm41 = () => {
    const form = document.getElementById('form_41')

    validator_41 = FormValidation.formValidation(form, {
      fields: {
        notes_41_status_pemberi_pernyataan: {
          validators: {
            notEmpty: {
              message: 'Mohon pilih status pemberi pernyataan'
            }
          }
        },
        notes_41_pernyataan: {
          validators: {
            notEmpty: {
              message: 'Mohon isi pernyataan'
            }
          }
        },
        notes_41_prognosis: {
          validators: {
            notEmpty: {
              message: 'Mohon isi prognosis'
            }
          }
        },
        notes_41_alternatif: {
          validators: {
            notEmpty: {
              message: 'Mohon isi alternatif'
            }
          }
        },
        notes_41_lain_lain: {
          validators: {
            notEmpty: {
              message: 'Mohon isi lain-lain'
            }
          }
        },
        notes_41_ttd_pasien: {
          validators: {
            notEmpty: {
              message: 'Mohon isi tanda tangan pasien'
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

    $('#form_41').on('submit', function (e) {
      e.preventDefault()

      if (!signaturePadPasien_41.isEmpty()) {
        $('input[name=notes_41_ttd_pasien]').val(
          signaturePadPasien_41.toDataURL('image/png')
        )
      }
     

      if (validator_41) {
        validator_41.validate().then(function (status) {
          if (status == 'Valid') {
            showOverlay('Proses menyimpan data . . .')

            let data = $('#form_41').serialize()
            let url = $('#form_41').attr('href')

            $.ajax({
              url: url,
              type: 'POST',
              dataType: 'JSON',
              data,
              success: data => {
                hideOverlay()

                $('#form_41')
                  .find('#csrf_token_hash_41')
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

                  $('#form_41')
                    .find('#csrf_token_hash_41')
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
    signaturePadPasien_41 = new SignaturePad(
      document.getElementById('notes_41_ttd_pasien'),
      {
        penColor: '#000000'
      }
    )
    

    $('#clear_notes_41_ttd_pasien').click(function (e) {
      e.preventDefault()

      signaturePadPasien_41.clear()
      $('input[name=notes_41_ttd_pasien]').val('')
    })

   
    $('#undo_notes_41_ttd_pasien').click(function (e) {
      e.preventDefault()

      var data_signature_pad = signaturePadPasien_41.toData()
      if (data_signature_pad) {
        data_signature_pad.pop()
        signaturePadPasien_41.fromData(data_signature_pad)
      }
    })

    signaturePadPasien_41.fromDataURL(
      $('input[name=notes_41_ttd_pasien]').val()
    )
  }

  let handlePemberiPertanyaan = () => {
    $('input[name=notes_41_status_pemberi_pernyataan]').change(function (e) {
      e.preventDefault()

      if ($(this).val() == 'Pasien') {
        $('[name=notes_41_telpon_pemberi_pernyataan]').val('')
        $('[name=notes_41_nama_pemberi_pernyataan]').val('')
        $('[name=notes_41_umur_pemberi_pernyataan]').val('')
        $('[name=notes_41_alamat_pemberi_pernyataan]').val('')
        $('[name=notes_41_pekerjaan_pemberi_pernyataan]').val('')

        $('[name=notes_41_telpon_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_41_nama_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_41_umur_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_41_alamat_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_41_pekerjaan_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')

        let note_fields = [
          'notes_41_telpon_pemberi_pernyataan',
          'notes_41_nama_pemberi_pernyataan',
          'notes_41_umur_pemberi_pernyataan',
          'notes_41_alamat_pemberi_pernyataan',
          'notes_41_pekerjaan_pemberi_pernyataan'
        ]

        let fv_fields = validator_41.getFields()
        $.each(fv_fields, function (k, v) {
          if (note_fields.includes(k)) {
            validator_41.removeField(k)
          }
        })
      } else {
        $('[name=notes_41_telpon_pemberi_pernyataan]').val('')
        $('[name=notes_41_nama_pemberi_pernyataan]').val('')
        $('[name=notes_41_umur_pemberi_pernyataan]').val('')
        $('[name=notes_41_alamat_pemberi_pernyataan]').val('')
        $('[name=notes_41_pekerjaan_pemberi_pernyataan]').val('')

        $('[name=notes_41_telpon_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_41_nama_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_41_umur_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_41_alamat_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_41_pekerjaan_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        

        validator_41.addField('notes_41_telpon_pemberi_pernyataan', {
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
        
        validator_41.addField('notes_41_nama_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi nama pemberi pernyataan'
            }
          }
        })
        validator_41.addField('notes_41_umur_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi umur pemberi pernyataan'
            }
          }
        })
        validator_41.addField('notes_41_alamat_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi alamat pemberi pernyataan'
            }
          }
        })
        validator_41.addField('notes_41_pekerjaan_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi pekerjaan pemberi pernyataan'
            }
          }
        })
       
      }
    })
  }

  let handleDelete41 = () => {
    $('#delete_41').click(function (e) {
      e.preventDefault()

      let url = $(this).attr('href')
      let csrf_name = $('#csrf_token_hash_41').attr('name')
      let csrf_token = $('#csrf_token_hash_41').val()

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

            $('#form_41')
              .find('#csrf_token_hash_41')
              .val(data.responseJSON.csrf_token_hash)
          }
        }
      })
    })
  }

  return {
    init: () => {
      handleForm41(),
        handleSignaturePad(),
        handlePemberiPertanyaan(),
        handleDelete41()
    }
  }
})()

jQuery(document).ready(function () {
  Erm41.init()
  KTApp.init()
  $('#erm_131 .label_id_visit:first').trigger('click')
  $('#erm_131 input[name="id_visit"]:first').trigger('click')
})
