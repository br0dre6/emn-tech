$(document).ready(function () {
  signUpButton();
  getCmsInformation();
  function signUpButton() {
    $("form.edit-cms").on("submit", function (e) {
      e.preventDefault();
      let $form = $(this).closest("form.edit-cms");
      $form.find("input.edit-cms-hidden").val("true");
      //e.stopImmediatePropagation();

      let fd = new FormData(this);
      /* to append in FormData here is the syntax:
                fd.append("name",name);
            */
      $.ajax({
        url: "../actions/admin/edit-cms.php",
        method: "post",
        data: fd,
        contentType: false,
        processData: false,
        success: function (data) {
          console.log("data: ", data)
          $.confirm({
            title: "Confirm",
            type: "green",
            content: "Cms has been updated succesfully",
            buttons: {
              confirm: function () {
                // window.location.href = "./signin.php";
              },
            },
          });
        },
      });
    });
  }

  function getCmsInformation() {
    $.ajax({
      url: "../actions/admin/edit-cms.php",
      method: "post",
      data: {
        getCmsInformation: 1,
      },
      success: function (data) {
        // Parse the JSON data
        var cmsInformationList = JSON.parse(data);

        // Now you can use cmsInformationList as a JavaScript object
        console.log("cmsInformationList: ", cmsInformationList);
        $("#myImage").attr(
          "src",
          "../images/admin/" + cmsInformationList[0].logoImage
        );
        $("#headerBrandName").val(cmsInformationList[0].headerBrandName);
        $("#homepageHeader").val(cmsInformationList[0].homepageHeader);
        $("#homepageSubheader").val(cmsInformationList[0].homepageSubheader);
        $("#myImage2").attr(
          "src",
          "../images/admin/" + cmsInformationList[0].optometristImage
        );
        $("#optometristName").val(cmsInformationList[0].optometristName);
        $("#optometristDescription").val(
          cmsInformationList[0].optometristDescription
        );
        $("#aboutUs").val(cmsInformationList[0].aboutUs);
        $("#mission").val(cmsInformationList[0].mission);
        $("#vision").val(cmsInformationList[0].vision);
        $("#objective").val(cmsInformationList[0].objective);
        $("#address").val(cmsInformationList[0].address);
        $("#contact").val(cmsInformationList[0].contact);
        $("#email").val(cmsInformationList[0].email);
      },
      error: function (error) {
        console.log("Error:", error);
      },
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

function showImage2() {
  if (this.files && this.files[0]) {
    let obj = new FileReader();
    const file = this.files[0];
    const fileType = file["type"];
    const validImageTypes = ["image/gif", "image/jpeg", "image/png"];
    if (!validImageTypes.includes(fileType)) {
    } else {
      obj.onload = function (data) {
        var image = document.getElementById("myImage2");
        image.src = data.target.result;
      };
      obj.readAsDataURL(this.files[0]);
    }
  }
}
