$(document).ready(function () {
  $("input.next-button").prop("disabled", true);
  let firstNameTextError = 1;
  let lastNameTextError = 1;
  let addressTextError = 1;
  let dateTextError = 1;
  firstNameKeyPress();
  lastNameKeyPress();
  addressKeyPress();
  dataOnChange();
  function firstNameKeyPress() {
    $("input.first-name").on("keyup", function (e) {
      e.preventDefault();
      let $form = $(this).closest("form.sign-up");
      let firstName = $form.find("input.first-name").val();
      let lettersOnlyValidation = /[^a-zA-Z]/g;
      if (firstName.match(lettersOnlyValidation)) {
        var stringWithoutLastChar = firstName.slice(0, -1);
        $("input.first-name").val(stringWithoutLastChar);
      }
      if (firstName == "") {
        firstNameTextError = 1;
        $("input.first-name").css("border", "1px solid red");
      } else {
        firstNameTextError = 0;
        $("input.first-name").css("border", "1px solid green");
      }
      enableDisableNextButton();
    });
  }

  function lastNameKeyPress() {
    $("input.last-name").on("keyup", function (e) {
      e.preventDefault();
      let $form = $(this).closest("form.sign-up");
      let lastName = $form.find("input.last-name").val();
      let lettersOnlyValidation = /[^a-zA-Z]/g;
      if (lastName.match(lettersOnlyValidation)) {
        var stringWithoutLastChar = lastName.slice(0, -1);
        $("input.last-name").val(stringWithoutLastChar);
      }
      if (lastName == "") {
        lastNameTextError = 1;
        $("input.last-name").css("border", "1px solid red");
      } else {
        lastNameTextError = 0;
        $("input.last-name").css("border", "1px solid green");
      }

      enableDisableNextButton();
    });
  }

  function addressKeyPress() {
    $("input.address").on("keyup", function (e) {
      e.preventDefault();
      let $form = $(this).closest("form.sign-up");
      let address = $form.find("input.address").val();

      if (address == "") {
        addressTextError = 1;
        $("input.address").css("border", "1px solid red");
      } else {
        addressTextError = 0;
        $("input.address").css("border", "1px solid green");
      }

      enableDisableNextButton();
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
      enableDisableNextButton();
    });
  }

  function enableDisableNextButton() {
    if (
      firstNameTextError == 0 &&
      lastNameTextError == 0 &&
      addressTextError == 0 &&
      dateTextError == 0
    ) {
      $("input.next-button").prop("disabled", false);
    } else {
      $("input.next-button").prop("disabled", true);
    }
  }
});
