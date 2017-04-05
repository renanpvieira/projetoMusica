$(document).ready(function () {
    $("input[name='Enviar']").click(function () {
        
        
        var btn = this; 
        btn.disabled = true;// EVITA DOUBLE-CLICK
        var form = $("form[name='form-trocasenha']").serializeArray();
               
        $.ajax({
            type: "POST",
            url: Site_Url("/trocasenha/salvar"),
            data: GeraSecurityForm(form),
            success: function (data) {
               btn.disabled = true;
            }
        })
        .done(function(data) {
            var ret = $.parseJSON(data);
            displayFormMsg(ret.formValidate, "#trocasenhamsg", ret.msg);
        })
        .always(function() {
            btn.disabled = false;
        });
    });
    
    
});