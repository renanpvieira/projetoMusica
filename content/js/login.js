$(document).ready(function () {
    $("input[name='Enviar']").click(function () {
        var form = $("form[name='login']").serializeArray();
        $.ajax({
            type: "POST",
            url: Site_Url("/login/logar"),
            data: GeraSecurityForm(form),
            success: function (data) {
                var ret = $.parseJSON(data);
                if (ret.formValidate) {
                    window.location = ret.url;
                } else {
                    displayFormMsg("#login", ret.msg);
                }
            }
        });
    });
});

