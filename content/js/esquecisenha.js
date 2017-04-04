$(document).ready(function () {
    $("input[name='Enviar']").click(function () {
        var form = $("form[name='esquecisenha']").serializeArray();
        console.log(form);
        $.ajax({
            type: "POST",
            url: Site_Url("/esquecisenha/enviar"),
            data: GeraSecurityForm(form),
            success: function (data) {
                var ret = $.parseJSON(data);
                displayFormMsg("#esquecisenha", ret.msg);
            }
        });
    });
});


