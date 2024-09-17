'use strict'

var signaturePadPasien_107 = ''
var signaturePadPemberiPernyataan_107 = ''
var signaturePadSaksi_107 = []
// var signaturePadSaksi2_107 = ''
var validator_107 = ''


var Erm107 = (function () {
  let is_tab = $('[data-is_tab]').data('is_tab')

  let handleForm107 = () => {
    const form = document.getElementById('form_107')

    if ($('[name=notes_107_jenis_hipnotik_pasien]').val() == 'spiral_epidural' || $('[name=notes_107_jenis_hipnotik_pasien]').val() == 'never_block') {
      validator_107 = FormValidation.formValidation(form, {
        fields: {
          notes_107_status_pemberi_pernyataan: {
            validators: {
              notEmpty: {
                message: 'Mohon pilih status pemberi pernyataan'
              }
            }
          },
          notes_107_teknik_pembiusan_pasien: {
            validators: {
              notEmpty: {
                message: 'Mohon isi teknik pembiusan'
              }
            }
          },
          notes_107_jenis_hipnotik_pasien: {
            validators: {
              notEmpty: {
                message: 'Mohon isi jenis hipotik'
              }
            }
          },
          notes_107_dokter_anestesi_pasien: {
            validators: {
              notEmpty: {
                message: 'Mohon isi dokter anestesi'
              }
            }
          },
          notes_107_ttd_pasien: {
            validators: {
              notEmpty: {
                message: 'Mohon isi tanda tangan pasien'
              }
            }
          },
          notes_107_ttd_pemberi_pernyataan: {
            validators: {
              notEmpty: {
                message: 'Mohon isi tanda tangan pemberi pernyataan'
              }
            }
          },
          // notes_107_ttd_saksi: {
          //   validators: {
          //     notEmpty: {
          //       message: 'Mohon isi tanda tangan saksi 1'
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
    } else {
      validator_107 = FormValidation.formValidation(form, {
        fields: {
          notes_107_status_pemberi_pernyataan: {
            validators: {
              notEmpty: {
                message: 'Mohon pilih status pemberi pernyataan'
              }
            }
          },
          notes_107_teknik_pembiusan_pasien: {
            validators: {
              notEmpty: {
                message: 'Mohon isi teknik pembiusan'
              }
            }
          },
          
          notes_107_dokter_anestesi_pasien: {
            validators: {
              notEmpty: {
                message: 'Mohon isi dokter anestesi'
              }
            }
          },
          notes_107_ttd_pasien: {
            validators: {
              notEmpty: {
                message: 'Mohon isi tanda tangan pasien'
              }
            }
          },
          notes_107_ttd_pemberi_pernyataan: {
            validators: {
              notEmpty: {
                message: 'Mohon isi tanda tangan pemberi pernyataan'
              }
            }
          },
          "notes_107_ttd_saksi[]": {
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
    }

    $('#form_107').on('submit', function (e) {
      e.preventDefault()

      if (!signaturePadPasien_107.isEmpty()) {
        $('input[name=notes_107_ttd_pasien]').val(
          signaturePadPasien_107.toDataURL('image/png')
        )
      }

      if (!signaturePadPemberiPernyataan_107.isEmpty()) {
        $('input[name=notes_107_ttd_pemberi_pernyataan]').val(
          signaturePadPemberiPernyataan_107.toDataURL('image/png')
        )
      }

      const signatureInputs = document.querySelectorAll('.signature-input');
      var rowIndex2 = signatureInputs.length;

      for (let i = 0; i < rowIndex2; i++) {
        if (!signaturePadSaksi_107[i].isEmpty()) {
          $('input[name="notes_107_ttd_saksi['+i+']"]').val(
            signaturePadSaksi_107[i].toDataURL('image/png')
          )
        }
      }

      if (validator_107) {
        validator_107.validate().then(function (status) {
          if (status == 'Valid') {
            showOverlay('Proses menyimpan data . . .')

            let data = $('#form_107').serialize()
            let url = $('#form_107').attr('href')

            $.ajax({
              url: url,
              type: 'POST',
              dataType: 'JSON',
              data,
              success: data => {
                hideOverlay()

                $('#form_107')
                  .find('#csrf_token_hash_107')
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

                  $('#form_107')
                    .find('#csrf_token_hash_107')
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

    // pasien
    signaturePadPasien_107 = new SignaturePad(
      document.getElementById('notes_107_ttd_pasien'),
      {
        penColor: '#000000'
      }
    )

    $('#clear_notes_107_ttd_pasien').click(function (e) {
      e.preventDefault()

      signaturePadPasien_107.clear()
      $('input[name=notes_107_ttd_pasien]').val('')
    })

    $('#undo_notes_107_ttd_pasien').click(function (e) {
      e.preventDefault()

      var data_signature_pad = signaturePadPasien_107.toData()
      if (data_signature_pad) {
        data_signature_pad.pop()
        signaturePadPasien_107.fromData(data_signature_pad)
      }
    })

    signaturePadPasien_107.fromDataURL(
      $('input[name=notes_107_ttd_pasien]').val()
    )

    
    // pemberi_pernyataan
    signaturePadPemberiPernyataan_107 = new SignaturePad(
      document.getElementById('notes_107_ttd_pemberi_pernyataan'),
      {
        penColor: '#000000'
      }
    )

    $('#clear_notes_107_ttd_pemberi_pernyataan').click(function (e) {
      e.preventDefault()

      signaturePadPemberiPernyataan_107.clear()
      $('input[name=notes_107_ttd_pemberi_pernyataan]').val('')
    })

    $('#undo_notes_107_ttd_pemberi_pernyataan').click(function (e) {
      e.preventDefault()

      var data_signature_pad = signaturePadPemberiPernyataan_107.toData()
      if (data_signature_pad) {
        data_signature_pad.pop()
        signaturePadPemberiPernyataan_107.fromData(data_signature_pad)
      }
    })

    signaturePadPemberiPernyataan_107.fromDataURL(
      $('input[name=notes_107_ttd_pemberi_pernyataan]').val()
    )

    // const signatureInputs = document.querySelectorAll('.signature-input');
    // var rowIndex2 = signatureInputs.length;
    // if(rowIndex2 == 1){
    //   signaturePadSaksi_107[0] = new SignaturePad(
    //     document.getElementById('notes_107_ttd_saksi_0'),
    //     {
    //       penColor: '#000000'
    //     }
    //   )
  
    //   $('#clear_notes_107_ttd_saksi_0').click(function (e) {
    //     e.preventDefault()
  
    //     signaturePadSaksi_107[0].clear()
    //     $('input[name=notes_107_ttd_saksi[0]]').val('')
    //   })
  
    //   $('#undo_notes_107_ttd_saksi_0').click(function (e) {
    //     e.preventDefault()
  
    //     var data_signature_pad = signaturePadSaksi_107[0].toData()
    //     if (data_signature_pad) {
    //       data_signature_pad.pop()
    //       signaturePadSaksi_107[0].fromData(data_signature_pad)
    //     }
    //   })
  
    //   signaturePadSaksi_107[0].fromDataURL(
    //     $('input[name=notes_107_ttd_saksi_0]').val()
    //   )
    // } 
    // if(rowIndex2 => 1){
    //   signaturePadSaksi_107[1] = new SignaturePad(
    //     document.getElementById('notes_107_ttd_saksi_1'),
    //     {
    //       penColor: '#000000'
    //     }
    //   )
  
    //   $('#clear_notes_107_ttd_saksi_1').click(function (e) {
    //     e.preventDefault()
  
    //     signaturePadSaksi_107[0].clear()
    //     $('input[name=notes_107_ttd_saksi[1]]').val('')
    //   })
  
    //   $('#undo_notes_107_ttd_saksi_1').click(function (e) {
    //     e.preventDefault()
  
    //     var data_signature_pad = signaturePadSaksi_107[1].toData()
    //     if (data_signature_pad) {
    //       data_signature_pad.pop()
    //       signaturePadSaksi_107[0].fromData(data_signature_pad)
    //     }
    //   })
  
    //   signaturePadSaksi_107[1].fromDataURL(
    //     $('input[name=notes_107_ttd_saksi_1]').val()
    //   )
      
    // } 
    
    
    
  }
  let handleSignaturePadSaksi = () => {
    const signatureInputs = document.querySelectorAll('.signature-input');
    var rowIndex2 = signatureInputs.length;

    for (let i = 0; i < rowIndex2; i++) {
      // if (!signaturePadSaksi_107[i].isEmpty()) {
        
        signaturePadSaksi_107[i] = new SignaturePad(
          document.getElementById('notes_107_ttd_saksi_'+i),
          {
            penColor: '#000000'
          }
        )

        $('#clear_notes_107_ttd_saksi_0').click(function (e) {
          e.preventDefault()

          signaturePadSaksi_107[i].clear()
          $('input[name="notes_107_ttd_saksi['+i+']"]').val('')
        })

        $('#undo_notes_107_ttd_saksi_'+i).click(function (e) {
          e.preventDefault()

          var data_signature_pad = signaturePadSaksi_107[i].toData()
          if (data_signature_pad) {
            data_signature_pad.pop()
            signaturePadSaksi_107[i].fromData(data_signature_pad)
          }
        })

        signaturePadSaksi_107[i].fromDataURL(
          $('input[name="notes_107_ttd_saksi['+i+']"]').val()
        )

      // }
    }    
    
  }

  let handlePemberiPertanyaan = () => {
    $('input[name=notes_107_status_pemberi_pernyataan]').change(function (e) {
      e.preventDefault()

      if ($(this).val() == 'Pasien') {
        $('[name=notes_107_telpon_pemberi_pernyataan]').val('')
        $('[name=notes_107_nama_pemberi_pernyataan]').val('')
        $('[name=notes_107_umur_pemberi_pernyataan]').val('')
        $('[name=notes_107_alamat_pemberi_pernyataan]').val('')

        $('[name=notes_107_telpon_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_107_nama_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_107_umur_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')
        $('[name=notes_107_alamat_pemberi_pernyataan]')
          .closest('.fv-row')
          .hide('fast')

        let note_fields = [
          'notes_107_telpon_pemberi_pernyataan',
          'notes_107_nama_pemberi_pernyataan',
          'notes_107_umur_pemberi_pernyataan',
          'notes_107_alamat_pemberi_pernyataan'
        ]

        let fv_fields = validator_107.getFields()
        $.each(fv_fields, function (k, v) {
          if (note_fields.includes(k)) {
            validator_107.removeField(k)
          }
        })
      } else {
        $('[name=notes_107_telpon_pemberi_pernyataan]').val('')
        $('[name=notes_107_nama_pemberi_pernyataan]').val('')
        $('[name=notes_107_umur_pemberi_pernyataan]').val('')
        $('[name=notes_107_alamat_pemberi_pernyataan]').val('')
        
        $('[name=notes_107_telpon_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_107_nama_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_107_umur_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')
        $('[name=notes_107_alamat_pemberi_pernyataan]')
          .closest('.fv-row')
          .show('fast')

        validator_107.addField('notes_107_telpon_pemberi_pernyataan', {
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
        validator_107.addField('notes_107_nama_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi nama pemberi pernyataan'
            }
          }
        })
        validator_107.addField('notes_107_umur_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi umur pemberi pernyataan'
            }
          }
        })
        validator_107.addField('notes_107_alamat_pemberi_pernyataan', {
          validators: {
            notEmpty: {
              message: 'Mohon isi alamat pemberi pernyataan'
            }
          }
        })
      }
    })
  }
 
  let handlePilihJenisHipnotik = () => {
    $('select[name=notes_107_teknik_pembiusan_pasien]').change(function (e) {
      e.preventDefault()

      if ($(this).val() == 'spiral_epidural' || $(this).val() == 'never_block') {
        $('[name=notes_107_jenis_hipnotik_pasien]').val('')

        $('[name=notes_107_jenis_hipnotik_pasien]').removeAttr('disabled')
        
      } else {
        $('[name=notes_107_jenis_hipnotik_pasien]').val('')
        
        $('[name=notes_107_jenis_hipnotik_pasien]').attr('disabled')
      }
    })
  }

  let handleDelete107 = () => {
    $('#delete_107').click(function (e) {
      e.preventDefault()

      let url = $(this).attr('href')
      let csrf_name = $('#csrf_token_hash_107').attr('name')
      let csrf_token = $('#csrf_token_hash_107').val()

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

            $('#form_107')
              .find('#csrf_token_hash_107')
              .val(data.responseJSON.csrf_token_hash)
          }
        }
      })
    })
  }

  return {
    init: () => {
      handleForm107(),
        handleSignaturePad(),
        handleSignaturePadSaksi(),
        handlePemberiPertanyaan(),
        handlePilihJenisHipnotik(),
        handleDelete107()
    }
  }
})()

jQuery(document).ready(function () {
  Erm107.init()
  KTApp.init()
  $('#erm_131 .label_id_visit:first').trigger('click')
  $('#erm_131 input[name="id_visit"]:first').trigger('click')
})

function addRow(containerId, addButtonId, deleteButtonClass) {
  var container = document.getElementById(containerId);
  var rowTemplate = container.querySelector('.row');
  var newRow = rowTemplate.cloneNode(true);
  var inputs = newRow.querySelectorAll('input');
  var rowIndex = container.querySelectorAll('.row').length;
  
  inputs.forEach(function(input, index) {
    input.value = '';
    input.name = 'notes_107_ttd_saksi['+rowIndex+']';
  });
  newRow.querySelectorAll('canvas').forEach(function(canvas) {
    canvas.id = 'notes_107_ttd_saksi_' + rowIndex;
  });
  newRow.querySelectorAll('button.clear_notes').forEach(function(button) {
    button.id = 'clear_notes_107_ttd_saksi_' + rowIndex;
  });
  newRow.querySelectorAll('button.undo_notes').forEach(function(button) {
    button.id = 'undo_notes_107_ttd_saksi_' + rowIndex;
  });


  container.appendChild(newRow);
  handleSignaturePad(rowIndex)
}

function handleSignaturePad(rowIndex) {
  signaturePadSaksi_107[rowIndex] = new SignaturePad(
      document.getElementById('notes_107_ttd_saksi_' + rowIndex), // Use dynamic ID
      {
          penColor: '#000000'
      }
  )

  $('#clear_notes_107_ttd_saksi_' + rowIndex).click(function (e) {
      e.preventDefault()

      signaturePadSaksi_107[rowIndex].clear()
      $('input[name="notes_107_ttd_saksi[' + rowIndex + ']"]').val('')
  })

  $('#undo_notes_107_ttd_saksi_' + rowIndex).click(function (e) {
      e.preventDefault()

      var data_signature_pad = signaturePadSaksi_107[rowIndex].toData()
      if (data_signature_pad) {
          data_signature_pad.pop()
          signaturePadSaksi_107[rowIndex].fromData(data_signature_pad)
      }
  })

  signaturePadSaksi_107[rowIndex].fromDataURL(
      $('input[name="notes_107_ttd_saksi[' + rowIndex + ']"]').val()
  )
}

function setupEventListeners(containerId, addButtonId, deleteButtonClass) {
  document.getElementById(addButtonId).addEventListener('click', function() {
    addRow(containerId, addButtonId, deleteButtonClass);
  });
  
  document.getElementById(containerId).addEventListener('click', function(event) {
    if (event.target.classList.contains(deleteButtonClass)) {
      var container = document.getElementById(containerId);
      var rows = container.querySelectorAll('.row');
      if (rows.length > 1) {
        var row = event.target.closest('.row');
        row.remove();
      } else {
        alert("Tidak bisa menghapus baris satu - satunya")
      }
    }
  });
}

setupEventListeners('container-1', 'addButton-1', 'delete');
