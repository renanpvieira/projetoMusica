$(document).ready(function () {
    $("form[name='cadastroBasico']").submit(function(e) {
        e.preventDefault();
        
        var form = $(this).serializeArray();
        
        $.ajax({
            type: "POST",
            url: Site_Url("/cadastro/cadastroBasico"),
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

