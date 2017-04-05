$(document).ready(function () {
    $("input[name='Enviar']").click(function () {
        var form = $("form[name='esquecisenha']").serializeArray();
        $.ajax({
            type: "POST",
            url: Site_Url("/esquecisenha/enviar"),
            data: GeraSecurityForm(form),
            success: function (data) {
                var ret = $.parseJSON(data);
                displayFormMsg(ret.formValidate, "#esquecisenha", ret.msg);
                if(!ret.formValidate){
                    $('input[name="Imagem"]').val('');
                    $('input[name="Chave"]').val(ret.chave);
                    $('#imgcaptch').attr('src', ret.imagem);
                }
            }
        });
    });
});


