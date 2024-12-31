
        $(document).ready(function() {
            // register account\
            $("#username").change(function checknName() {
                var regex = /^[A-Za-z\sAÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZaàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+$/;
                var name = $(this).val();
                if (regex.test(name) == true || name == '') {
                    $(this).removeClass("is-invalid");
                    $(this).addClass("is-valid");
                    return true;
                } else {
                    $(this).addClass("is-invalid");
                    return false;
                }
            })
            $("#email_signup").change(function checkEmail() {
                var regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)$/;
                var email = $(this).val();
                if (regex.test(email) == true || email == '') {
                    $(this).removeClass("is-invalid");
                    $(this).addClass("is-valid");
                    return true;
                } else {
                    $(this).addClass("is-invalid");
                    return false;
                }
            })
            $("#phone_signup").change(function checkPhone() {
                var regex = /^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/;
                var phone = $(this).val();
                if (regex.test(phone) == true || phone == '') {
                    $(this).removeClass("is-invalid");
                    $(this).addClass("is-valid");
                    return true;
                } else {
                    $(this).addClass("is-invalid");
                    return false;
                }
            })
            $("#local_signup").change(function checkLocate() {
                var regex = /^[A-Za-z0-9\s,.-AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZaàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+$/;
                var local = $(this).val();
                if (regex.test(local) == true || local == '') {
                    $(this).removeClass("is-invalid");
                    $(this).addClass("is-valid");
                    return true;
                } else {
                    $(this).addClass("is-invalid");
                    return false;
                }
            })
            $("#password_signup").change(function checkPass() {
                var regex = /^.{6,}$/;
                var pass = $(this).val();
                if (regex.test(pass) == true || pass == ' ') {
                    $(this).removeClass("is-invalid");
                    $(this).addClass("is-valid");
                    return true;
                } else {
                    $(this).addClass("is-invalid");
                    return false;
                }
            })
            $("#Re_password_signup").change(function checkRepass() {
                var regex = /^.{6,}$/;
                var password = $("#password_signup").val()
                var pass = $(this).val();
                if (regex.test(pass) == true && pass === password || pass == '') {
                    $(this).removeClass("is-invalid");
                    $(this).addClass("is-valid");
                    return true;
                } else {
                    $(this).addClass("is-invalid");
                    return false;
                }
            })
            //ajax gửi form
            $("#loginForm").submit(function(event) {
                event.preventDefault();
                if ($("input").hasClass("is-invalid") || $("input").val() == '') {
                    confirm("Vui lòng kiểm tra lại thông tin");
                } else {
                    $.ajax({
                        type: 'POST',
                        url: "index.php?controller=Register&action=registerPost",
                        data: $(this).serialize(),
                        success: function() {
                            location.reload();
                        },
                    })

                }

            })
        })
