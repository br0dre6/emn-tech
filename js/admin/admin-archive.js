$(document).ready(function () {
  productTable();
  productSearch();
  function productTable() {
    let currentPage = parseFloat($("input#currentPage").val());
    let resultPerPage = parseFloat($("input#resultPerPage").val());
    let thisPageFirstResult = (currentPage - 1) * resultPerPage;
    let productSearch = $("input.product-search").val();
    $("input#thisPageFirstResult").val(thisPageFirstResult);
    $.ajax({
      url: "../actions/admin/admin-archive.php",
      method: "post",
      data: {
        getProductTableCount: 1,
        resultPerPage,
        productSearch,
      },
      success: function (data) {
        $("input#numberOfPages").val(data);
        let numberOfPage = data;
        $.ajax({
          url: "../actions/admin/admin-archive.php",
          method: "post",
          data: {
            getProductTable: 1,
            productSearch,
            currentPage,
            numberOfPage,
            thisPageFirstResult,
            resultPerPage,
          },
          success: function (data) {
            $("div.product-table").html(data);
            previousProductTableButton();
            nextProductTableButton();
            nextProductTableButton();
          },
        });
      },
    });
  }

  function productSearch() {
    $("input.product-search").on("keyup", function (e) {
      e.preventDefault();
      setTimeout(function () {
        $("input#currentPage").val(1);
        productTable();
      }, 300);
    });
  }

  function previousProductTableButton() {
    $("button.previous-product-table-buttonn").on("click", function (e) {
      e.preventDefault();
      e.stopImmediatePropagation();
      let currentPage = $("input#currentPage").val();
      if (currentPage != 1) {
        $("input#currentPage").val(currentPage - 1);
        productTable();
      }
    });
  }
  function nextProductTableButton() {
    $("button.next-product-table-button").on("click", function (e) {
      e.preventDefault();
      e.stopImmediatePropagation();
      let currentPage = parseInt($("input#currentPage").val());
      let numberOfPage = parseInt($("input#numberOfPages").val());
      if (currentPage != numberOfPage) {
        $("input#currentPage").val(currentPage + 1);
        productTable();
      }
    });
  }

  function nextProductTableButton() {
    $("form.product-edit").on("submit", function (e) {
      e.preventDefault();
      e.stopImmediatePropagation();
      let $form = $(this).closest("form.product-edit");
      $form.find("input.product-edit-hidden").val("true");
      let productId = $form.find("input.product-id").val();
      let fd = new FormData(this);
      $.confirm({
        title: "Confirmation",
        type: "orange",
        content:
          "Are you sure you want to archive this product? click confirm to proceed",
        buttons: {
          confirm: {
            text: "Confirm",
            btnClass: "btn-success",
            columnClass: "col-md-4",
            action: function () {
              fd.append("productId", productId);
              $.ajax({
                url: "../actions/admin/admin-archive.php",
                method: "post",
                data: fd,
                contentType: false,
                processData: false,
                success: function (data) {
                  $.confirm({
                    title: "<p class='text-success'>Notification</p>",
                    type: "green",
                    content: "Successfully set the product to active",
                    buttons: {
                      ok: function () {
                        //to hide modal
                        // $(".open-close-modal").click();
                        productTable();
                      },
                    },
                  });
                },
              });
            },
          },
          cancel: {
            text: "Cancel",
            btnClass: "btn-danger",
            columnClass: "col-md-4",
            action: function () {},
          },
        },
      });
    });
  }
});
