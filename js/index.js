$(document).ready(function () {
  getCmsInformation();
  sentContactUsEmail();
  function getCmsInformation() {
    $.ajax({
      url: "./actions/admin/edit-cms.php",
      method: "post",
      data: {
        getCmsInformation: 1,
      },
      success: function (data) {
        // Parse the JSON data
        var cmsInformationList = JSON.parse(data);

        // Now you can use cmsInformationList as a JavaScript object
        console.log("cmsInformationList: ", cmsInformationList);
        $(".logo-image").attr(
          "src",
          "./images/admin/" + cmsInformationList[0].logoImage
        );

        $("div.body1").css(
          "background-image",
          'url("./images/admin/' + cmsInformationList[0].optometristImage + '")'
        );
        $(".emn-logo-sub").text(cmsInformationList[0].headerBrandName);
        $(".heading-text").text(cmsInformationList[0].homepageHeader);
        $(".sub-text2").text(cmsInformationList[0].homepageSubheader);
        // $(".optometrist-image").attr(
        //   "src",
        //   "./images/admin/" + cmsInformationList[0].optometristImage
        // );
        $("h1.optometrist-name").text(cmsInformationList[0].optometristName);
        $(".optometrist-description").text(
          cmsInformationList[0].optometristDescription
        );
        $(".about-us").text(cmsInformationList[0].aboutUs);
        $(".mission").text(cmsInformationList[0].mission);
        $(".vision").text(cmsInformationList[0].vision);
        $(".objective").text(cmsInformationList[0].objective);
        $(".address").text(cmsInformationList[0].address);
        $(".contact").text(cmsInformationList[0].contact);
        $(".email").text(cmsInformationList[0].email);
      },
      error: function (error) {
        console.log("Error:", error);
      },
    });
  }

  function sentContactUsEmail() {
    $("input.contact-us-button").on("click", function (e) {
      e.preventDefault();
      let name = $("input.name").val();
      let email = $("input.email").val();
      let message = $("textarea.message").val();
      if (
        (email == null || email == "") &&
        (message == null || message == "")
      ) {
        $.confirm({
          title: "<p class='text-warning'>Alert</p>",
          type: "red",
          content: "Email and Message is required",
          buttons: {
            ok: function () {
              $("body").css("overflow-y", "scroll");
            },
          },
        });
      } else {
        $.ajax({
          url: "./actions/index.php",
          method: "post",
          data: {
            sentContactUsEmail: 1,
            name,
            email,
            message,
          },
          success: function (data) {
            $("input.name").val("");
            $("input.email").val("");
            $("textarea.message").val("");
            console.log("data: ", data);
            $.confirm({
              title: "<p class='text-success'>Alert</p>",
              type: "green",
              content: "Email is sent successfully",
              buttons: {
                ok: function () {
                  $("body").css("overflow-y", "scroll");
                },
              },
            });
          },
          error: function (error) {
            console.log("Error:", error);
          },
        });
      }
    });
  }
});
