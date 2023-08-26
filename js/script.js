/** @format */

$(document).ready(function () {
  $("#generate-button").click(function () {
    var primeCount = $("#prime-count").val();
    var lastDigit = $("#last-digit").val();

    $("#loading").show();

    $.ajax({
      url: "process.php",
      method: "POST",
      data: {
        primeCount: primeCount,
        lastDigit: lastDigit,
      },
      success: function (response) {
        setTimeout(function () {
          $("#loading").hide();
          $("#result").html(response);

          $(".result span").click(function () {
            $(".result span").removeClass("active");
            $(this).addClass("active");
            $(".result span").not(".active").hide();
          });
        }, 6000);
      },
      error: function () {
        $("#loading").hide();
        $("#result").html("<p>Error occurred during generation.</p>");
      },
    });
  });
});
