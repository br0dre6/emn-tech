$(document).ready(function () {
  let emailTextError = 1;
  let phoneTextError = 1;
  let passwordTextError = 1;
  let confirmPasswordTextError = 1;
  $("input.sign-up").prop("disabled", true);
  emailTextKeyPress();
  phoneNumberKeyPress();
  passwordKeyPress();
  function emailTextKeyPress() {
    $("input.email").on("keyup", function (e) {
      e.preventDefault();
      let email = $("input.email").val();
      let emailValidationExpression =
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      $.ajax({
        url: "./actions/create-account.php",
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
            $("input.email").css("border", "1px solid red");
          } else {
            emailTextError = 0;
            $("input.email").css("border", "1px solid green");
          }
        },
      });
      enableDisableSignupButton();
    });
  }

  function phoneNumberKeyPress() {
    // Restricts input for each element in the set of matched elements to the given inputFilter.
    $("input.phone").on("input", function (e) {
      e.preventDefault();
      let $form = $(this).closest("form.create-account");
      let phone = $form.find("input.phone").val();
      if (phone.indexOf(".") !== -1) {
        $form.find("input.phone").val("");
      }
      this.value = this.value.replace(/[^0-9\.]/g, "");
      if (phone.length < 12) {
        $("p.phone-error").text("");
        if (phone.length > 11) {
          $("input.phone").val(phone.substring(0, 11));
        }
        if (phone < 0) {
          $("input.phone").val("");
        }
        if (phone.length <= 10) {
          phoneTextError = 1;
          $("input.phone").css("border", "1px solid red");
          $("p.phone-error").text("invalid phone");
        } else {
          phoneTextError = 0;
          $("input.phone").css("border", "1px solid green");
          $("p.phone-error").text("");
        }
      } else {
        $("input.phone").val(phone.substring(0, 11));
      }

      enableDisableSignupButton();
    });
  }

  function passwordKeyPress() {
    $("input.password").on("keyup", function (e) {
      e.preventDefault();
      let $form = $(this).closest("form.create-account");
      let password = $form.find("input.password").val();
      let confirmPassword = $form.find("input.confirm-password").val();
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
        $("input.password").css("border", "1px solid green");
      } else {
        passwordTextError = 1;
        $("input.password").css("border", "1px solid red");
      }
      if (password > 16) {
        $("input.password").val(password.substring(0, 16));
      }
      if (password > 16) {
        $("input.password").val(password.substring(0, 16));
      }

      if (confirmPassword.length > 16) {
        $("input.confirm-password").val(confirmPassword.substring(0, 16));
      }
      if (confirmPassword != password) {
        confirmPasswordTextError = 1;
        $("input.confirm-password").css("border", "1px solid red");
        $("p.confirm-password-error").text("password did not match");
      } else {
        confirmPasswordTextError = 0;
        $("input.confirm-password").css("border", "1px solid green");
        $("p.confirm-password-error").text("");
      }
      enableDisableSignupButton();
    });
    $("input.confirm-password").on("keyup", function (e) {
      e.preventDefault();
      let $form = $(this).closest("form.create-account");
      let password = $form.find("input.password").val();
      let confirmPassword = $form.find("input.confirm-password").val();
      if (confirmPassword.length > 16) {
        $("input.confirm-password").val(confirmPassword.substring(0, 16));
      }
      if (confirmPassword != password) {
        confirmPasswordTextError = 1;
        $("input.confirm-password").css("border", "1px solid red");
        $("p.confirm-password-error").text("password did not match");
      } else {
        confirmPasswordTextError = 0;
        $("input.confirm-password").css("border", "1px solid green");
        $("p.confirm-password-error").text("");
      }
      enableDisableSignupButton();
    });
    $("input.password").on("focusin", function (e) {
      e.preventDefault();
      $("div#pswd_info").show();
    });
    $("input.password").on("focusout", function (e) {
      e.preventDefault();
      $("div#pswd_info").hide();
    });
  }

  function enableDisableSignupButton() {
    if (
      emailTextError == 0 &&
      phoneTextError == 0 &&
      passwordTextError == 0 &&
      confirmPasswordTextError == 0
    ) {
      $("input.sign-up").prop("disabled", false);
    } else {
      $("input.sign-up").prop("disabled", true);
    }
  }
});
