$(document).ready(function () {
    $("input[name='Enviar']").click(function () {
        var form = $("form[name='cadastroBanda']").serializeArray();

        $.ajax({
            type: "POST",
            url: Site_Url("/cadastro/cadastrarBanda"),
            data: GeraSecurityForm(form),
            success: function (data) {
                var ret = $.parseJSON(data);
                if (ret.formValidate) { // Se for true
                    window.location = ret.url; // redireciona para a url de la do post
                } else {
                    displayFormMsg("#cadastroBanda", ret.msg);
                }
            }
        });
    });
});

