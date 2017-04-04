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
                alert(ret.msg);
                //displayFormMsg("#cadastroBanda", ret.msg);
            }
        });
    });
    
});

