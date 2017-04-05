$(document).ready(function () {
    
    $("#divlogin").addClass("floating-label-form-group-with-value");
    $("#divnomebanda").addClass("floating-label-form-group-with-value");
    $("#divnumintegrantes").addClass("floating-label-form-group-with-value");
    $("#divfacebook").addClass("floating-label-form-group-with-value");
    $("#divskype").addClass("floating-label-form-group-with-value");
    $("#divsite").addClass("floating-label-form-group-with-value");
    $("#divyoutube").addClass("floating-label-form-group-with-value");
    $("#divpreco").addClass("floating-label-form-group-with-value");
    $("#divsobre").addClass("floating-label-form-group-with-value");
    $("#divexperiencia").addClass("floating-label-form-group-with-value");
        
    $("textarea[name='Sobre']").slimscroll({height: 'auto', width: '100%', size: '12px',  color: '#233140'});
    $("textarea[name='Experiencia']").slimscroll({height: 'auto', width: '100%', size: '12px',  color: '#233140'});
        
    var preco = $("input[name='Preco']").val();
    if(preco == 0){ $("input[name='Preco']").val('A combinar'); }
    
    $("input[name='Configuracao']").click(function () {
        var form = $("form[name='Configuracao']").serializeArray();
        
        $.ajax({
            type: "POST",
            url: Site_Url("/usuario/configuracao"),
            data: GeraSecurityForm(form),
            success: function (data) {
                var ret = $.parseJSON(data);
                if(ret.formValidate){
                    $('#nome-banda-conf').html($('input[name="Nome"]').val()); /* ATUALIZANDO O NOME DO TOPO */
                }
                displayFormMsg(ret.formValidate, "#configuracaomsg", ret.msg);
            }
        });
        
    });
    
    
});



