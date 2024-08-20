$(document).ready(function () {
  let patientNameTextError = 1;
  let patientAddressTextError = 1;
  let dateTextError = 1;
  let emailTextError = 1;
  let phoneTextError = 1;
  let passwordTextError = 1;
  let confirmPasswordTextError = 1;
  firstNameKeyPress();
  patientAddressKeyPress();
  dataOnChange();
  emailTextKeyPress();
  phoneNumberKeyPress();
  passwordKeyPress();
  saveWalkInButton();
  $("button.save-walkin").prop("disabled", true);
  function firstNameKeyPress() {
    $("input.patient-name").on("keyup", function (e) {
      e.preventDefault();
      let $form = $(this).closest("form.walk-in-sign-up");
      let patientName = $form.find("input.patient-name").val();

      if (patientName == "") {
        patientNameTextError = 1;
        $("input.patient-name").css("border", "1px solid red");
      } else {
        patientNameTextError = 0;
        $("input.patient-name").css("border", "1px solid green");
      }
      enableDisableSignupButton();
    });
  }
  function patientAddressKeyPress() {
    $("input.patient-address").on("keyup", function (e) {
      e.preventDefault();
      let $form = $(this).closest("form.walk-in-sign-up");
      let patientAddress = $form.find("input.patient-address").val();

      if (patientAddress == "") {
        patientAddressTextError = 1;
        $("input.patient-address").css("border", "1px solid red");
      } else {
        patientAddressTextError = 0;
        $("input.patient-address").css("border", "1px solid green");
      }
      enableDisableSignupButton();
    });
  }

  function dataOnChange() {
    $("input.date").on("change", function () {
      dateInput = $("input.date").val();
      if (dateInput != "") {
        dateTextError = 0;
        $("input.date").css("border", "1px solid green");
      } else {
        dateTextError = 1;
        $("input.date").css("border", "1px solid red");
        $("p.date-error").text("Select your birth date");
      }
      enableDisableSignupButton();
    });
  }

  function emailTextKeyPress() {
    $("input.patient-email").on("keyup", function (e) {
      e.preventDefault();
      let email = $("input.patient-email").val();
      let emailValidationExpression =
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      $.ajax({
        url: "../actions/create-account.php",
        method: "post",
        data: {
          getExistingEmail: 1,
          email,
        },
        success: function (data) {
          if (data === "1") {
            $("p.email-error").text("this email is already taken");
          } else if (email.match(emailValidationExpression)) {
            $("p.email-error").text("");
          } else {
            $("p.email-error").text("invalid email");
          }
          //if exist and short not valid email
          if (data === "1" || !email.match(emailValidationExpression)) {
            emailTextError = 1;
            $("input.patient-email").css("border", "1px solid red");
          } else {
            emailTextError = 0;
            $("input.patient-email").css("border", "1px solid green");
          }
        },
      });
      enableDisableSignupButton();
    });
  }

  function phoneNumberKeyPress() {
    // Restricts input for each element in the set of matched elements to the given inputFilter.
    $("input.patient-phone").on("input", function (e) {
      e.preventDefault();
      let $form = $(this).closest("form.walk-in-sign-up");
      let phone = $form.find("input.patient-phone").val();
      if (phone.indexOf(".") !== -1) {
        $form.find("input.patient-phone").val("");
      }
      this.value = this.value.replace(/[^0-9\.]/g, "");
      if (phone.length < 12) {
        $("p.phone-error").text("");
        if (phone.length > 11) {
          $("input.patient-phone").val(phone.substring(0, 11));
        }
        if (phone < 0) {
          $("input.patient-phone").val("");
        }
        if (phone.length <= 10) {
          phoneTextError = 1;
          $("input.patient-phone").css("border", "1px solid red");
          $("p.phone-error").text("invalid phone");
        } else {
          phoneTextError = 0;
          $("input.patient-phone").css("border", "1px solid green");
          $("p.phone-error").text("");
        }
      } else {
        $("input.patient-phone").val(phone.substring(0, 11));
      }

      enableDisableSignupButton();
    });
  }

  function passwordKeyPress() {
    $("input.patient-password").on("keyup", function (e) {
      e.preventDefault();
      let $form = $(this).closest("form.walk-in-sign-up");
      let password = $form.find("input.patient-password").val();
      let confirmPassword = $form.find("input.patient-confirm-password").val();
      //validate the length
      if (password.length < 8) {
        $("#length").removeClass("valid").addClass("invalid");
      } else {
        $("#length").removeClass("invalid").addClass("valid");
      }
      //validate letter
      if (password.match(/[A-z]/)) {
        $("#letter").removeClass("invalid").addClass("valid");
      } else {
        $("#letter").removeClass("valid").addClass("invalid");
      }

      //validate capital letter
      if (password.match(/[A-Z]/)) {
        $("#capital").removeClass("invalid").addClass("valid");
      } else {
        $("#capital").removeClass("valid").addClass("invalid");
      }

      //validate number
      if (password.match(/\d/)) {
        $("#number").removeClass("invalid").addClass("valid");
      } else {
        $("#number").removeClass("valid").addClass("invalid");
      }
      if (password.match(/[ `!@#$%^&*()_+\-=\[\]{};":"\\|,.<>\/?~]/)) {
        $("#special").removeClass("invalid").addClass("valid");
      } else {
        $("#special").removeClass("valid").addClass("invalid");
      }
      //if valid password
      if (
        !password.length < 8 &&
        password.match(/[A-z]/) &&
        password.match(/[A-Z]/) &&
        password.match(/\d/) &&
        password.match(/[ `!@#$%^&*()_+\-=\[\]{};":"\\|,.<>\/?~]/)
      ) {
        passwordTextError = 0;
        $("input.patient-password").css("border", "1px solid green");
      } else {
        passwordTextError = 1;
        $("input.patient-password").css("border", "1px solid red");
      }
      if (password > 16) {
        $("input.patient-password").val(password.substring(0, 16));
      }
      if (password > 16) {
        $("input.patient-password").val(password.substring(0, 16));
      }

      if (confirmPassword.length > 16) {
        $("input.patient-confirm-password").val(
          confirmPassword.substring(0, 16)
        );
      }
      if (confirmPassword != password) {
        confirmPasswordTextError = 1;
        $("input.patient-confirm-password").css("border", "1px solid red");
        $("p.confirm-password-error").text("password did not match");
      } else {
        confirmPasswordTextError = 0;
        $("input.patient-confirm-password").css("border", "1px solid green");
        $("p.confirm-password-error").text("");
      }
      enableDisableSignupButton();
    });
    $("input.patient-confirm-password").on("keyup", function (e) {
      e.preventDefault();
      let $form = $(this).closest("form.walk-in-sign-up");
      let password = $form.find("input.patient-password").val();
      let confirmPassword = $form.find("input.patient-confirm-password").val();
      if (confirmPassword.length > 16) {
        $("input.patient-confirm-password").val(
          confirmPassword.substring(0, 16)
        );
      }
      if (confirmPassword != password) {
        confirmPasswordTextError = 1;
        $("input.patient-confirm-password").css("border", "1px solid red");
        $("p.confirm-password-error").text("password did not match");
      } else {
        confirmPasswordTextError = 0;
        $("input.patient-confirm-password").css("border", "1px solid green");
        $("p.confirm-password-error").text("");
      }
      enableDisableSignupButton();
    });
    $("input.patient-password").on("focusin", function (e) {
      e.preventDefault();
      $("div#pswd_info").show();
    });
    $("input.patient-password").on("focusout", function (e) {
      e.preventDefault();
      $("div#pswd_info").hide();
    });
  }

  function saveWalkInButton() {
    $("form.walk-in-sign-up").on("submit", function (e) {
      e.preventDefault();
      let $form = $(this).closest("form.walk-in-sign-up");
      $form.find("input.walk-in-sign-up-hidden").val("true");

      //e.stopImmediatePropagation();
      if (
        patientNameTextError === 1 ||
        patientAddressTextError === 1 ||
        dateTextError === 1 ||
        emailTextError === 1 ||
        phoneTextError === 1 ||
        passwordTextError === 1 ||
        confirmPasswordTextError === 1
      ) {
        $.alert({
          title: "Alert!",
          content: "fill it up properly",
          type: "red",
        });
      } else {
        let fd = new FormData(this);

        /* to append in FormData here is the syntax:
                    fd.append("name",name);
                */
        $.ajax({
          url: "../actions/admin/patient.php",
          method: "post",
          data: fd,
          contentType: false,
          processData: false,
          success: function (data) {
            console.log("data: ", data);
            $.confirm({
              title: "Confirm",
              type: "green",
              content: "successfully created walk-in account",
              buttons: {
                confirm: function () {
                  window.location.href = "./patient.php";
                },
              },
            });
          },
        });
      }
    });
  }

  function enableDisableSignupButton() {
    if (
      patientNameTextError == 0 &&
      patientAddressTextError == 0 &&
      dateTextError == 0 &&
      emailTextError == 0 &&
      phoneTextError == 0 &&
      confirmPasswordTextError == 0
    ) {
      $("button.save-walkin").prop("disabled", false);
    } else {
      $("button.save-walkin").prop("disabled", true);
    }
  }
});
