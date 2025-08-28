$(document).ready(function () {
     $.ajaxSetup({
          headers: {
               "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          },
     });

     $(document).on("submit", ".ajax-form", function (e) {
          e.preventDefault();
          $(".loader-wrapper").show();


          let $this = $(this);
          let formData = new FormData(this);

          $this.find(".has-danger").removeClass("has-error");
          $this.find(".form-errors").remove();
          $this.find(".text-danger").removeClass("text-danger");

          $.ajax({
               type: $this.attr("method"),
               url: $this.attr("action"),
               data: formData,
               contentType: false,
               processData: false,
               cache: false,

               xhr: function () {
                    let xhr = new XMLHttpRequest();

                    // Listen to the `progress` event to update the progress bar
                    xhr.upload.addEventListener("progress", function (e) {
                         if (e.lengthComputable) {
                              let percent = (e.loaded / e.total) * 100;
                              $("#uploadProgress").val(percent); // Update progress bar
                         }
                    });

                    return xhr;
               },

               success: function (response) {
                    successResponseProcess(response);
               },

               error: function (response) {
                    errorResponseProcess(response);
               },
          });
     });
});

function successResponseProcess(response) {
     $(".loader-wrapper").hide();

     swal("",response.message,response.status);

     let tableName = response.tableName

     if (tableName && $(tableName).length && $.fn.DataTable.isDataTable(tableName)) {
          let table = $(tableName).DataTable();
          let currentPage = table.page();
          table.ajax.reload(function () {
               table.page(currentPage).draw(false);
          }, false);
     }

     if(response.locationReload) {
          setTimeout(function () {
               window.location.href = response.url;
          }, 1500);
     }
}

function errorResponseProcess(response) {
     $(".loader-wrapper").hide();
     swal("",response.message,response.status);
     let data = JSON.parse(response.responseText);
     $.each(data.errors, (key, value) => {
          $("[name^=" + key + "]")
               .parent()
               .addClass("text-danger");
          $("[name^=" + key + "]")
               .parent()
               .append(
                    '<small class="text-danger text-danger form-errors">' +
                    value[0] +
                    "</small>"
               );
          toastr.error(value[0]);
     });
}
