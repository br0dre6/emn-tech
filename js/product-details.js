$(document).ready(function () {
  function getUrlParameter(name) {
    name = name.replace(/[[]/, "\\[").replace(/[\]]/, "\\]");
    const regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
    const results = regex.exec(location.search);
    return results === null
      ? ""
      : decodeURIComponent(results[1].replace(/\+/g, " "));
  }

  const productId = getUrlParameter("product_id");
  getAdminProductInformationById();

  function getAdminProductInformationById() {
    $.ajax({
      url: "./actions/admin/admin-edit-prod.php",
      method: "post",
      data: {
        getAdminProductInformationById: 1,
        productId,
      },
      success: function (data) {
        // Parse the JSON data
        var productInformationList = JSON.parse(data);
        // Now you can use productInformationList as a JavaScript object
        console.log("productInformationList: ", productInformationList);
        $(".img-prod-details").attr(
          "src",
          "./images/admin/" + productInformationList[0].productImage
        );
        $("h2.product-name").text(productInformationList[0].productName);
        $("p.product-description").text(
          productInformationList[0].productDescription
        );
        $("select.shape-type").val(productInformationList[0].shapeType);
        changeSelectType(productInformationList[0].shapeType);
        $("input.stock").val(productInformationList[0].stock);
      },
      error: function (error) {
        console.log("Error:", error);
      },
    });
  }
});
