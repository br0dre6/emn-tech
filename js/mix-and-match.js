$(document).ready(function () {
    onChangeSelectType();
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
        "./images/admin/HEART/" + shapeType + ".png"
      );
    else if (shapeType.indexOf("OVAL-") !== -1)
      $("img.shape-type-image").attr(
        "src",
        "./images/admin/OVAL/" + shapeType + ".png"
      );
    else if (shapeType.indexOf("ROUND-") !== -1)
      $("img.shape-type-image").attr(
        "src",
        "./images/admin/ROUND/" + shapeType + ".png"
      );
    else if (shapeType.indexOf("SQUARE-") !== -1)
      $("img.shape-type-image").attr(
        "src",
        "./images/admin/SQUARE/" + shapeType + ".png"
      );
    else if (shapeType.indexOf("TRIANGLE-") !== -1)
      $("img.shape-type-image").attr(
        "src",
        "./images/admin/TRIANGLE/" + shapeType + ".png"
      );
  }
});
