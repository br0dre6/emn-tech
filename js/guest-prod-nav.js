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
      url: "./actions/guest-prod-nav.php",
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
          url: "./actions/guest-prod-nav.php",
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
            $("div.guest-product-card-list").html(data);
            // previousProductTableButton();
            // nextProductTableButton();
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

  //   function previousProductTableButton() {
  //     $("button.previous-product-table-buttonn").on("click", function (e) {
  //       e.preventDefault();
  //       e.stopImmediatePropagation();
  //       let currentPage = $("input#currentPage").val();
  //       if (currentPage != 1) {
  //         $("input#currentPage").val(currentPage - 1);
  //         productTable();
  //       }
  //     });
  //   }
  //   function nextProductTableButton() {
  //     $("button.next-product-table-button").on("click", function (e) {
  //       e.preventDefault();
  //       e.stopImmediatePropagation();
  //       let currentPage = parseInt($("input#currentPage").val());
  //       let numberOfPage = parseInt($("input#numberOfPages").val());
  //       if (currentPage != numberOfPage) {
  //         $("input#currentPage").val(currentPage + 1);
  //         productTable();
  //       }
  //     });
  //   }
});
