$(document).ready(function () {
  messageUsTable();
  messageUsSearch();
  function messageUsTable() {
    let currentPage = parseFloat($("input#currentPage").val());
    let resultPerPage = parseFloat($("input#resultPerPage").val());
    let thisPageFirstResult = (currentPage - 1) * resultPerPage;
    let messageUsSearch = $("input.message-us-search").val();
    $("input#thisPageFirstResult").val(thisPageFirstResult);
    $.ajax({
      url: "../actions/admin/message-us.php",
      method: "post",
      data: {
        getMessageUsTableCount: 1,
        resultPerPage,
        messageUsSearch,
      },
      success: function (data) {
        $("input#numberOfPages").val(data);
        let numberOfPage = data;
        $.ajax({
          url: "../actions/admin/message-us.php",
          method: "post",
          data: {
            getMessageUsTable: 1,
            messageUsSearch,
            currentPage,
            numberOfPage,
            thisPageFirstResult,
            resultPerPage,
          },
          success: function (data) {
            $("div.message-us-table").html(data);
            messageUsEditClick();
            previousMessageUsTableButton();
            nextMessageUsTableButton();
          },
        });
      },
    });
  }

  function messageUsSearch() {
    $("input.message-us-search").on("keyup", function (e) {
      e.preventDefault();
      setTimeout(function () {
        $("input#currentPage").val(1);
        messageUsTable();
      }, 300);
    });
  }

  function previousMessageUsTableButton() {
    $("button.previous-message-us-table-buttonn").on("click", function (e) {
      e.preventDefault();
      e.stopImmediatePropagation();
      let currentPage = $("input#currentPage").val();
      if (currentPage != 1) {
        $("input#currentPage").val(currentPage - 1);
        messageUsTable();
      }
    });
  }
  function nextMessageUsTableButton() {
    $("button.next-message-us-table-button").on("click", function (e) {
      e.preventDefault();
      e.stopImmediatePropagation();
      let currentPage = parseInt($("input#currentPage").val());
      let numberOfPage = parseInt($("input#numberOfPages").val());
      if (currentPage != numberOfPage) {
        $("input#currentPage").val(currentPage + 1);
        messageUsTable();
      }
    });
  }

  function messageUsEditClick() {
    $("a.message-us-edit").on("click", function (e) {
      e.preventDefault();
      let $form = $(this).closest("form.message-us-edit");
      let emailMessageId = $form.find("input.message-us-id").val();
      let toSendEmail = $form.find("input.to-send-email").val();
      $("h5.modal-title-2").text("Reply");
      $.ajax({
        url: "../actions/admin/message-us.php",
        method: "post",
        data: {
          getReplyField: 1,
          toSendEmail,
        },
        success: function (data) {
          $("div.modal-body-2").html(data);
          sendMessageUsReply();
        },
      });
    });
  }

  function sendMessageUsReply() {
    $("input.message-us-sent").on("click", function (e) {
      e.preventDefault();
      let toSendEmail = $("input.to-send-email").val();
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
          url: "../actions/admin/message-us.php",
          method: "post",
          data: {
            messageUsReply: 1,
            toSendEmail,
            email,
            message,
          },
          success: function (data) {
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
