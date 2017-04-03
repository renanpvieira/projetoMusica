$(document).ready(function () {
    $("input[name='Enviar']").click(function () {
        var form = $("form[name='esquecisenha']").serializeArray();
        console.log(form);
        $.ajax({
            type: "POST",
            url: Site_Url("/esquecisenha/enviar"),
            data: GeraSecurityForm(form),
            success: function (data) {
                
                alert(data);
                /*var ret = $.parseJSON(data);
                if (ret.formValidate) {
                    window.location = ret.url;
                } else {
                    displayFormMsg("#esquecisenha", ret.msg);
                    //window.location = ret.url;
                }
                */
            }
        });
    });
});

