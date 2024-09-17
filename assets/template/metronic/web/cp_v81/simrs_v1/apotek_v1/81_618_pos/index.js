$(document).ready(function () {

  updateRowNumbers();
  updateRowNumbers2();
  initDialer();
  countTotal();
});

const form = document.getElementById("form_barang");
let validator = FormValidation.formValidation(form, {
  fields: {
    no_batch: {
      validators: {
        notEmpty: {
          message: "Mohon isi batch number",
        },
      },
    },
  },

  plugins: {
    trigger: new FormValidation.plugins.Trigger(),
    bootstrap: new FormValidation.plugins.Bootstrap5({
      rowSelector: ".fv-row",
      eleInvalidClass: "",
      eleValidClass: "",
    }),
  },
});

$("#form_barang").on("submit", function (e) {
  e.preventDefault();
  if (validator) {
    validator.validate().then(function (status) {
      if (status == "Valid") {
        let url = $("#form_barang").attr("href");
        let data = $("#form_barang").serialize();
        $.ajax({
          url: url,
          type: "GET",
          dataType: "json",
          data: data,
          beforeSend: function () {
            hideOverlay();
          },
          complete: function () {
            hideOverlay();
          },
          success: (results) => {
            $("#row_barang_default").remove();
                        // <button class="btn btn-icon btn-outline btn-active-color-primary" type="button" data-kt-dialer-control="decrease">
                        //   <i class="ki-duotone ki-minus fs-2"></i>
                        // </button>
                        // <button class="btn btn-icon btn-outline btn-active-color-primary" type="button" data-kt-dialer-control="increase">
                        //     <i class="ki-duotone ki-plus fs-2"></i>
                        // </button>
            let item = `
                <tr>
                <td class="text-center barang_no"></td>
                <td class="text-center"><button type="button" class="btn btn-sm btn-danger delete_row">Delete</button></td>
                <td class="text-left">
                  <span class="racik"></span> <input type="hidden" name="racik_tipe[]" class="racik_tipe" value="RACIK">
                  <span class="badge badge-info racik_row"></span>  <input type="hidden" name="racik[]" class="racik_input" value="RACIK">
                </td>
                <td>${results.data.nama_produk}</td>
                <td>
                    <div class="input-group w-md-200px kt_dialer_qty">
                        <input type="text" name="qty_barang[]" class="form-control input_qty" placeholder="Amount" value="1" data-kt-dialer-control="input" />
                    </div>
                </td>
                <td class="text-end">
                    Rp <span class="barang_subtotal_label">${results.data.harga}</span>
                    <input type="hidden" name="id_barang[]" value="${results.data.id_produk}">
                    <input type="hidden" name="harga_barang[]" class="input_barang" value="${results.data.harga}">
                    <input type="hidden" name="subtotal[]" class="barang_subtotal" value="${results.data.harga}">
                </td>
                </tr>
              `;
            $("#list_barang > tbody").append(item);
            updateRowNumbers();
            updateRowNumbers2();
            initDialer();
            countTotal();

            $("#no_batch").val("");
            $("#csrf_token_hash").val(results.csrf_token_hash);
          },
          error: (data) => {
            console.log(csrf_token_hash);
            console.log(csrf_token_hash);
            if (typeof data.responseJSON === "undefined") {
              alertNotice((data.status == 200 ? "Berhasil !" : "Gagal !"), data.statusText , (data.status == 200 ? 'success' : 'danger'))
              $("#no_batch").val('');
            } else {
              alertNotice("Gagal !", data.responseJSON.message , 'danger')
              $("#no_batch").val('');
            }
          },
        });
      }
    });
  }
});

const initDialer = () => {
  let dialerElements = document.querySelectorAll(".kt_dialer_qty");
  dialerElements.forEach((dialerElement) => {
    let dialerObject = new KTDialer(dialerElement, {
      min: 1,
      max: 999999,
      step: 1,
      decimals: 0,
    });

    $(dialerElement)
      .find('input[data-kt-dialer-control="input"]')
      .on("change", function () {
        let row = $(dialerElement).closest("tr");
        countSubtotal(row);
        countTotal();
      });
  });
};

const updateRowNumbers = () => {
  $("#list_barang > tbody > tr").each(function (index, element) {
    $(element)
      .find(".barang_no")
      .text(index + 1 + ".");
  });
};
const updateRowNumbers2 = () => {
  $("#list_barang > tbody > tr").each(function (index, element) {
    $(element)
    .find(".racik")
    .text("R/"+(index + 1));
    $(element)
    .find(".racik_tipe")
    .val("R/"+(index + 1));
    $(element)
      .find(".racik_row")
      .text("");
    if(index > 0){
      $(element)
      .find(".racik_row")
      .text("RACIK");
    }
  });
};
const countSubtotal = ($row) => {
  const price = $row.find(".input_barang").val() || 0;
  const qty = $row.find(".input_qty").val() || 0;
  const subtotal = Number.parseFloat(price) * Number.parseFloat(qty);

  $row.find(".barang_subtotal").val(subtotal);
  $row
    .find(".barang_subtotal_label")
    .text(Number.parseFloat(subtotal).toLocaleString("id-ID"));
};

const countTotal = () => {
  let total = 0;

  $("#list_barang > tbody > tr").each(function () {
    const subtotal = $(this).find(".barang_subtotal").val() || 0;
    total += Number.parseFloat(subtotal);
  });

  $("#barang_total").val(total);
  $("#barang_total_label").text(total.toLocaleString("id-ID"));
};

$("#list_barang > tbody").on("input", "tr > td > .input_qty", function () {
  countSubtotal($(this).parents("tr"));
  countTotal();
});

$("#list_barang > tbody").on("click", "tr > td > .delete_row", function () {
  $(this).parents("tr").remove();
  updateRowNumbers();
  countTotal();

  if ($("#list_barang > tbody > tr").length === 0) {
    $("#list_barang > tbody").append(`
          <tr id="row_barang_default">
              <td colspan="5" class="text-center">- Belum ada Tarif -</td>
          </tr>
      `);
  }
});

$("#list_barang > tbody").on("click", "tr > td > .racik_row", function () {
  $(this).text($(this).text() === "BATAL" ? "RACIK" : "BATAL");
  $(this).siblings(".racik_input").val($(this).text());
});


$("#form_daftar_barang").on("submit", function (e) {
  e.preventDefault();
  let url = $("#form_daftar_barang").attr("href");
  let data = $("#form_barang, #form_daftar_barang").serialize();
  $.ajax({
    url: url,
    type: "POST",
    dataType: "json",
    data: data,
    beforeSend: function () {
      showOverlay("Proses menambah data . . .");
    },
    complete: function () {
      hideOverlay();
    },
    success: (results) => {
      location.reload();
    },
    error: (data) => {
      if (typeof data.responseJSON === "undefined") {
        Swal.fire("Gagal !", `${data.status} - ${data.statusText}`, "error");
      } else {
        Swal.fire("Gagal !", data.responseJSON.message, "error").then(
          (results) => {
            $("#csrf_token_hash").val(data.responseJSON.csrf_token_hash);
          }
        );
      }
    },
  });
});

const alertPlaceholder = document.getElementById('liveAlertPlaceholder');
  
  const alertNotice = (message, message2, type) => {
    // Clear previous alerts
    alertPlaceholder.innerHTML = '';
  
    // Create the alert element
    const alert = document.createElement('div');
    alert.classList.add('alert', `alert-${type}`, 'd-flex', 'align-items-center', 'p-5');
  
    // Create the icon element
    const icon = document.createElement('i');
    icon.classList.add('ki-duotone', 'ki-shield-tick', 'fs-2hx', `text-${type}`, 'me-4');
    icon.innerHTML = '<span class="path1"></span><span class="path2"></span>';
  
    // Create the content element
    const content = document.createElement('div');
    content.classList.add('d-flex', 'flex-column');
    const title = document.createElement('h4');
    title.textContent = message;
    title.classList.add('mb-1', `text-${type}`);
    const description = document.createElement('span');
    description.textContent = message2;
    content.appendChild(title);
    content.appendChild(description);
  
    // Append elements to the alert
    alert.appendChild(icon);
    alert.appendChild(content);
  
    // Append the alert to the placeholder
    alertPlaceholder.appendChild(alert);
  
    // Set a timeout to remove the alert after 5 seconds
    setTimeout(() => {
      alertPlaceholder.removeChild(alert);
    }, 3000);
  };
  