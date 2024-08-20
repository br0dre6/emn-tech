$(document).ready(function () {
  let currentDateToday = new Date().toISOString().split("T")[0];
  // Set the value of the date input field to the current date
  $("input.session-date").val(currentDateToday);
  appendDoctorIdName();
  onSubmitSchedule();

  function appendDoctorIdName() {
    $.ajax({
      url: "../actions/patient/schedule.php",
      method: "post",
      data: {
        getAllDoctor: 1,
      },
      success: function (data) {
        console.log("data: ", data);
        $("select.doctor-id").append(data);
      },
    });
  }
  function onSubmitSchedule() {
    $("form.schedule-form").on("submit", function (e) {
      e.preventDefault();
      let $form = $(this).closest("form.schedule-form");
      $form.find("input.schedule-hidden").val("true");
      let purposeToAppoint = $form.find("input.purpose-to-appoint").val();
      let doctorId = $form.find("select.doctor-id").val();
      let sessionDate = $form.find("input.session-date").val();
      let scheduleTime = $form.find("input.schedule-time").val();

      if (
        purposeToAppoint === "" ||
        doctorId === "" ||
        sessionDate === "" ||
        scheduleTime === ""
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
          url: "../actions/patient/schedule.php",
          method: "post",
          data: fd,
          contentType: false,
          processData: false,
          success: function (data) {
            if (data == "already have appointed in this date and time") {
              $.confirm({
                title: "Confirm",
                type: "red",
                content: data,
                buttons: {
                  confirm: function () {
                    // window.location.href = "./schedule.php";
                  },
                },
              });
            } else {
              $.confirm({
                title: "Confirm",
                type: "green",
                content: "successfully created schedule!",
                buttons: {
                  confirm: function () {
                    window.location.href = "./schedule.php";
                  },
                },
              });
            }
          },
        });
      }
    });
  }
});
