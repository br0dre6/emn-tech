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
  onChangeSelectType();
  adminEditProd();
  getAdminProductInformationById();

  function onChangeSelectType() {
    $("select.shape-type").on("change", function () {
      let shapeType = $(this).val();
      changeSelectType(shapeType);
    });
  }

  function changeSelectType(shapeType) {
    if (shapeType.indexOf("HEART-") !== -1)
      $("img.shape-type-image").attr(
        "src",
        "../images/admin/HEART/" + shapeType + ".png"
      );
    else if (shapeType.indexOf("OVAL-") !== -1)
      $("img.shape-type-image").attr(
        "src",
        "../images/admin/OVAL/" + shapeType + ".png"
      );
    else if (shapeType.indexOf("ROUND-") !== -1)
      $("img.shape-type-image").attr(
        "src",
        "../images/admin/ROUND/" + shapeType + ".png"
      );
    else if (shapeType.indexOf("SQUARE-") !== -1)
      $("img.shape-type-image").attr(
        "src",
        "../images/admin/SQUARE/" + shapeType + ".png"
      );
    else if (shapeType.indexOf("TRIANGLE-") !== -1)
      $("img.shape-type-image").attr(
        "src",
        "../images/admin/TRIANGLE/" + shapeType + ".png"
      );
  }

  function getAdminProductInformationById() {
    $.ajax({
      url: "../actions/admin/admin-edit-prod.php",
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
        $("#myImage").attr(
          "src",
          "../images/admin/" + productInformationList[0].productImage
        );
        $("input.product-name").val(productInformationList[0].productName);
        $("textarea.product-description").val(
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

  function adminEditProd() {
    $("form.admin-edit-prod").on("submit", function (e) {
      e.preventDefault();
      let $form = $(this).closest("form.admin-edit-prod");
      $form.find("input.admin-edit-prod-hidden").val("true");
      let productName = $form.find("input.product-name").val();
      let productDescription = $form.find("textarea.product-description").val();
      let shapeType = $form.find("select.shape-type").val();
      let stock = $form.find("input.stock").val();
      //e.stopImmediatePropagation();
      let fd = new FormData(this);
      fd.append("productId", productId);
      /* to append in FormData here is the syntax:
                        fd.append("name",name);
                    */
      if (
        productName != "" &&
        productDescription != "" &&
        shapeType != "" &&
        stock != ""
      ) {
        $.ajax({
          url: "../actions/admin/admin-edit-prod.php",
          method: "post",
          data: fd,
          contentType: false,
          processData: false,
          success: function (data) {
            console.log("data: ", data);
            $.confirm({
              title: "Confirm",
              type: "green",
              content: "Edit product updated succesfully",
              buttons: {
                confirm: function () {
                  window.location.href =
                    "./admin-edit-prod.php?product_id=" + productId;
                },
              },
            });
          },
        });
      } else {
        $.confirm({
          title: "Confirm",
          type: "red",
          content: "please fill up all fields",
          buttons: {
            confirm: function () {
              window.location.href = "./admin-edit-prod.php";
            },
          },
        });
      }
    });
  }
});

function showImage() {
  if (this.files && this.files[0]) {
    let obj = new FileReader();
    const file = this.files[0];
    const fileType = file["type"];
    const validImageTypes = ["image/gif", "image/jpeg", "image/png"];
    if (!validImageTypes.includes(fileType)) {
    } else {
      obj.onload = function (data) {
        var image = document.getElementById("myImage");
        image.src = data.target.result;
      };
      obj.readAsDataURL(this.files[0]);
    }
  }
}
