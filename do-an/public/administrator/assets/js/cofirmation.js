$(document).ready(function () {
    $('.checkpass').on("keyup", "input[name=password]", function (event) {
        if ($('input[name=password]').val() == "") {
          $('input[name=password_confirmation]').attr('disabled', 'disabled');
        } else {
          $("input[name=password_confirmation]").removeAttr('disabled');
        }
    });
});