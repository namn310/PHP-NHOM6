$(document).ready(function () {
    $("#maVoucher").change(function () {
        var regex = /^[a-zA-Z0-9]+$/;
        var ma = $(this).val();
        if (regex.test(ma) == false)
        {
            $(this).addClass("is-invalid");
        }
        else
        {
            $(this).removeClass("is-invalid");
            $(this).addClass("is-valid");
        }
    })
    $("#countVoucher").change(function () {
        if ($(this).val() % 1 !== 0)
        {
            $(this).addClass("is-invalid");
        }
        else
        {
            $(this).removeClass("is-invalid");
            $(this).addClass("is-valid");
        }
    })
    $("#discountVoucher").change(function () {
        if ($(this).val() % 1 !== 0)
        {
            $(this).addClass("is-invalid");
        }
        else
        {
            $(this).removeClass("is-invalid");
            $(this).addClass("is-valid");
        }
    })
    $("#AddVoucherForm").submit(function (event) {
        event.preventDefault();
        if ($("input").hasClass('is-invalid'))
        {
            alert("Vui kiểm tra lại thông tin Voucher");
        }
        else
        {
            $.ajax({
                type: "POST",
                url: "index.php?controller=voucher&action=store",
                data: $(this).serialize(),
                success: function () {
                    location.reload();
                } ,
            })
        }
    })

    $("#ChangeVoucherForm").submit(function (event) {
         event.preventDefault();
        if ($("input").hasClass('is-invalid'))
        {
            alert("Vui kiểm tra lại thông tin Voucher");
        }
        else
        {
            var url = $("#url").val();
            $.ajax({
                type: "POST",
                url: url,
                data: $(this).serialize(),
                success: function () {
                    location.reload();
                } ,
            })
        }
    })


})