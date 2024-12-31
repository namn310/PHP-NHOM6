$(document).ready(function () {
    $("#newPassword").change(function checkPass () {
        var regex = /^.{6,}$/;
        var pass = $(this).val();
        if (regex.test(pass) == true || pass == ' ')
        {
            $(this).removeClass("is-invalid");
            $(this).addClass("is-valid");
            return true;
        } else
        {
            $(this).addClass("is-invalid");
            return false;
        }
    })
    $("#renewPassword").change(function checkRepass () {
        var regex = /^.{6,}$/;
        var password = $("#newPassword").val()
        var pass = $(this).val();
        if (regex.test(pass) == true && pass === password || pass == '')
        {
            $(this).removeClass("is-invalid");
            $(this).addClass("is-valid");
            return true;
        } else
        {
            $(this).addClass("is-invalid");
            return false;
        }
    })
    $("#changePassAdmin").submit(function (event) {
        event.preventDefault();
        if ($("input").hasClass("is-invalid") || $("input").val() == '')
        {
            alert("Vui lòng kiểm tra lại thông tin");
        }
        else
        {
            $.ajax({
                type: 'POST',
                url: "index.php?controller=user&action=updatePass",
                data: $(this).serialize(),
                success: function () {
                    location.reload();
                },
            })
        }
    })
})