$(document).ready(function () {
    
   
    $("input[name='Configuracao']").click(function () {
        var form = $("form[name='Configuracao']").serializeArray();
        
        $.ajax({
            type: "POST",
            url: Site_Url("/usuario/configuracao"),
            data: GeraSecurityForm(form),
            success: function (data) {
                var ret = $.parseJSON(data);
                displayFormMsg("#configuracaomsg", ret.msg);
            }
        });
        
    });
    
    
});
