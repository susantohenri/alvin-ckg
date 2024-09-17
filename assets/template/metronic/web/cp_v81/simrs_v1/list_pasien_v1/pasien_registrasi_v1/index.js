showOverlay('Proses menampilkan data . . .')

$(document).ready(function () {
  let tanggal_mulai = moment().startOf('month').format('YYYY-MM-DD')
  let tanggal_selesai = moment().endOf('month').format('YYYY-MM-DD')
  let jenis_rawat = ''
  let status = 'aktif'
  let list_registrasi = 'akses'

  const query = d => {
    d.tanggal_mulai = tanggal_mulai
    d.tanggal_selesai = tanggal_selesai
    d.jenis_rawat = jenis_rawat
    d.status = status
    d.list_registrasi = list_registrasi
  }

  var table = $('#table_reg').DataTable({
    columnDefs: [
      {
        targets: [0, 1],
        orderable: false,
        searchable: false
      }
    ],
    language: {
      searchPlaceholder: "Tekan 'Enter' untuk pencarian.",
      lengthMenu: 'Tampilkan _MENU_ data',
      zeroRecords: 'Tidak ada data untuk ditampilkan.',
      info: 'Menampilkan _START_ - _END_ dari _TOTAL_ data',
      infoEmpty: 'Informasi belum tersedia.',
      infoFiltered: '(difilter dari _MAX_ total data)'
    },
    oLanguage: {
      sSearch: 'Cari:'
    },

    dom:
      "<'row'" +
      "<'col-12 col-sm-6 d-flex align-items-center justify-content-center justify-content-sm-start'l>" +
      "<'col-12 col-sm-6 d-flex align-items-center justify-content-center justify-content-sm-end'f>" +
      '>' +
      "<'table-responsive'tr>" +
      "<'row'" +
      "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
      "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
      '>',

    // scrollX: true,
    processing: true,
    serverSide: true,
    // width: '100%',
    ajax: {
      url: `${target}/get_datatables`,
      type: 'GET',
      data: query
    },
    drawCallback: function (settings) {
      hideOverlay()
    },
    footerCallback: function (settings) {}
  })

  $('.dataTables_filter input')
    .unbind() // Unbind previous default bindings
    .bind('keyup', function (e) {
      // Bind our desired behavior
      // If the length is 3 or more characters, or the user pressed ENTER, search
      if (e.keyCode == 13) {
        // Call the API search function
        $('#table_reg').DataTable().search(this.value).draw()
      }
      return
    })

  $('#jenis_rawat').change(function (e) {
    e.preventDefault()

    jenis_rawat = $(this).val()
    table.ajax.reload()
  })

  $('#status_pasien').change(function (e) {
    e.preventDefault()

    status = $(this).val()
    table.ajax.reload()
  })

  $('#bulan').change(function (e) {
    e.preventDefault()
    showOverlay('Proses menampilkan data . . .')

    let month = $(this).val()
    let year = $('#tahun').val()

    tanggal_mulai = moment(year + '-' + month + '-01')
      .startOf('month')
      .format('YYYY-MM-DD')
    tanggal_selesai = moment(year + '-' + month + '-01')
      .endOf('month')
      .format('YYYY-MM-DD')

    table.ajax.reload()
  })

  $('#tahun').change(function (e) {
    e.preventDefault()
    showOverlay('Proses menampilkan data . . .')

    let year = $(this).val()
    let month = $('#bulan').val()

    tanggal_mulai = moment(year + '-' + month + '-01')
      .startOf('month')
      .format('YYYY-MM-DD')
    tanggal_selesai = moment(year + '-' + month + '-01')
      .endOf('month')
      .format('YYYY-MM-DD')

    table.ajax.reload()
  })

  $('input[name="list_registrasi"]').on('change', function (e) {
    list_registrasi = $(this).val()
    table.ajax.reload()
  })
})
