let url = new URL(window.location.href);
let pathname = url.pathname;
let segments = pathname.split("/");

function resendotp() {
  loanamount = document.getElementById("loanamount").value;
  mobile = document.getElementById("otpmobile").value;

  $.ajax({
    url: $('meta[name="baseUrl"]').attr("content") + "plan/resendotpCode",
    type: "POST",
    data: "mobile=" + mobile + "&loanamount=" + loanamount,
    dataType: "JSON",
    cache: false,
    processData: false,
    success: function (response) {
      if (response["success"] == true) {
        $("#resend-message").html(response["message"]);
        $.notify({ message: response["message"] }, { type: "success" });
      } else {
        $.notify({ message: response["message"] }, { type: "danger" });
      }
    },
    error: function (jXHR, textStatus, errorThrown) {
      $.notify({ message: errorThrown }, { type: "danger" });
    },
  });
}

$(function () {
  // form submit 1
  $("#submitForm1").on("submit", function (e) {
    e.preventDefault();

    $.ajax({
      url: $(this).attr("action") || window.location.pathname,
      type: "POST",
      data: $(this).serialize(),
      dataType: "JSON",
      cache: false,
      processData: false,
      beforeSend: function () {
        $("#form-submit1").html(
          '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> APPLYING...',
        );
        $("#form-submit1").attr("disabled", true);
      },
      success: function (response) {
        if (response["success"] == true) {
          if (response["redirect_url"] != "") {
            window.location.href = response["redirect_url"];
            $("#form-submit1").html("APPLY NOW");
          } else {
            window.location = `./bharatpro_finance/s2/` + response["mobile"];
            onclick = "goNext()";
          }
        } else {
          $("#mobilenoError").html(response["message"]);
          $.notify({ message: response["message"] }, { type: "danger" });
        }

        $("#form-submit1").html("APPLY NOW");
        $("#form-submit1").attr("disabled", false);
      },
      error: function (jXHR, textStatus, errorThrown) {
        $("#form-submit1").html("APPLY NOW");
        $("#form-submit1").attr("disabled", false);
        $.notify({ message: errorThrown }, { type: "danger" });
      },
    });
  });

  // form submit 2
  $("#submitForm2").on("submit", function (e) {
    e.preventDefault();
    $("#resend-message").html("");
    $("#otpcodeError").html("");

    $.ajax({
      url: $(this).attr("action") || window.location.pathname,
      type: "POST",
      data: $(this).serialize(),
      dataType: "JSON",
      cache: false,
      processData: false,
      beforeSend: function () {
        $("#form-submit2").html(
          '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> VERIFYING...',
        );
        $("#form-submit2").attr("disabled", true);
      },
      success: function (response) {
        if (response["success"] == true) {
          window.location = `../../bharatpro_finance/s3/` + response["mobile"];
        } else {
          $("#otpcodeError").html(response["message"]);
          $.notify({ message: response["message"] }, { type: "danger" });
        }

        $("#form-submit2").html("VERIFY");
        $("#form-submit2").attr("disabled", false);
      },
      error: function (jXHR, textStatus, errorThrown) {
        $("#form-submit2").html("VERIFY");
        $("#form-submit2").attr("disabled", false);
        $.notify({ message: errorThrown }, { type: "danger" });
      },
    });
  });

  // form submit 3
  $("#submitForm3").on("submit", function (e) {
    e.preventDefault();
    $("#resend-message").html("");
    $("#otpcodeError").html("");

    $.ajax({
      url: $(this).attr("action") || window.location.pathname,
      type: "POST",
      data: $(this).serialize(),
      dataType: "JSON",
      cache: false,
      processData: false,
      beforeSend: function () {
        $("#form-submit3").html(
          '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> PROCESSING...',
        );
        $("#form-submit3").attr("disabled", true);
      },
      success: function (response) {
        if (response["success"] == true) {
          window.location.href = response["redirect_url"];
        } else {
          $("#otpcodeError").html(response["message"]);
          $.notify({ message: response["message"] }, { type: "danger" });
        }

        $("#form-submit3").html("PROCESS");
        $("#form-submit3").attr("disabled", false);
      },
      error: function (jXHR, textStatus, errorThrown) {
        $("#form-submit3").html("PROCESS");
        $("#form-submit3").attr("disabled", false);
        $.notify({ message: errorThrown }, { type: "danger" });
      },
    });
  });
});
