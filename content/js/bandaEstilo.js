$(document).ready(function () {
   
    
    $("input[name='estilos']").click(function () {
        var btn = this; 
        btn.disabled = true;// EVITA DOUBLE-CLICK
        var form = $("form[name='estilos']").serializeArray();
        
        $.ajax({
            type: "POST",
            url: Site_Url("/usuario/estilos"),
            data: GeraSecurityForm(form),
            success: function (data) {
               btn.disabled = true;
            }
        })
        .done(function(data) {
            var ret = $.parseJSON(data);
            if (!ret.formValidate) {
               displayFormMsg("#estilomsg", ret.msg);
            } 
        })
        .always(function() {
            btn.disabled = false;
        });
    });
    
    
    
    
    
});