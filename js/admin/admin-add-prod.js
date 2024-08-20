$(document).ready(function () {
  onChangeSelectType();
  adminAddProd();
  function onChangeSelectType() {
    $("select.shape-type").on("change", function () {
      let shapeType = $(this).val();

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
    });
  }

  function adminAddProd() {
    $("form.admin-add-prod").on("submit", function (e) {
      e.preventDefault();
      let $form = $(this).closest("form.admin-add-prod");
      $form.find("input.admin-add-prod-hidden").val("true");
      let productName = $form.find("input.product-name").val();
      let productDescription = $form.find("textarea.product-description").val();
      let shapeType = $form.find("select.shape-type").val();
      let stock = $form.find("input.stock").val();
      //e.stopImmediatePropagation();
      let fd = new FormData(this);
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
          url: "../actions/admin/admin-add-prod.php",
          method: "post",
          data: fd,
          contentType: false,
          processData: false,
          success: function (data) {
            console.log("data: ", data);
            $.confirm({
              title: "Confirm",
              type: "green",
              content: "Add product has been added succesfully",
              buttons: {
                confirm: function () {
                  window.location.href = "./admin-add-prod.php";
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
                    window.location.href= "./admin-add-prod.php";
                }
            }
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
