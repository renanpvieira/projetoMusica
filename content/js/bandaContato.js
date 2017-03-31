$(document).ready(function () {
    
   
   $(document).on("click", "input[name='deletefone']", function(){
        var btn = this; 
        btn.disabled = true;// EVITA DOUBLE-CLICK
        var form = new Array();
        var id = $(btn).attr("data-fone");
        form[0] = { name:'BandaTelefoneId', value: id};
        
        $.ajax({
            type: "POST",
            url: Site_Url("/usuario/deletaFone"),
            data: GeraSecurityForm(form),
            success: function (data) {
               btn.disabled = true;
            }
        })
        .done(function(data) {
            var ret = parseInt(data);
            if(ret == 1){
                $('#tabela-fone > tbody  > tr').each(function() {
                    var trid = $(this).attr("data-fone");
                    if(id == trid){
                      $(this).remove();
                    }
                });
            }else{
               btn.disabled = false;
            }
        });
    });
    
    $("input[name='adicionafone']").click(function () {
        var btn = this; 
        btn.disabled = true;// EVITA DOUBLE-CLICK
        var form = $("form[name='form-fone']").serializeArray();
                
        $.ajax({
            type: "POST",
            url: Site_Url("/usuario/adicionaFone"),
            data: GeraSecurityForm(form),
            success: function (data) {
               btn.disabled = true;
            }
        })
        .done(function(data) {
            var ret = $.parseJSON(data);
            if (ret.formValidate) {
                
                var btn = $('<input>'); 
                btn.attr("type", 'button');
                btn.attr("data-fone", ret.msg);
                btn.attr("class", "btn btn-success btn-xs");
                btn.attr("value", "Deletar");
                btn.attr("name", "deletefone");
                
                var tdbtn = $('<td>');
                tdbtn.attr("class", "grid-botoes");
                tdbtn.append(btn);

                var tr = $('<tr>').attr("data-fone", ret.msg);
                tr.append($('<td>').text(form[0].value));
                tr.append($('<td>').text(form[1].value));
                tr.append(tdbtn);
                $('#tabela-fone').append(tr);
                
            } else {
                displayFormMsg("#adicionafonemsg", ret.msg);
            }
        })
        .always(function() {
            btn.disabled = false;
        });
    });
    
    
    ////////////////////////////////////////////////////////////////////////
    
    
    $(document).on("click", "input[name='deletemail']", function(){
        var btn = this; 
        btn.disabled = true;// EVITA DOUBLE-CLICK
        var form = new Array();
        var id = $(btn).attr("data-mail");
        form[0] = { name:'BandaEmailId', value: id};
        
        $.ajax({
            type: "POST",
            url: Site_Url("/usuario/deletaEmail"),
            data: GeraSecurityForm(form),
            success: function (data) {
               btn.disabled = true;
            }
        })
        .done(function(data) {
            var ret = parseInt(data);
            if(ret == 1){
                $('#tabela-mail > tbody  > tr').each(function() {
                    var trid = $(this).attr("data-mail");
                    if(id == trid){
                      $(this).remove();
                    }
                });
            }else{
               btn.disabled = false;
            }
        });
    });
    
    $("input[name='adicionaEmail']").click(function () {
        var btn = this; 
        btn.disabled = true;// EVITA DOUBLE-CLICK
        var form = $("form[name='form-mail']").serializeArray();
                
        $.ajax({
            type: "POST",
            url: Site_Url("/usuario/adicionaEmail"),
            data: GeraSecurityForm(form),
            success: function (data) {
               btn.disabled = true;
            }
        })
        .done(function(data) {
            var ret = $.parseJSON(data);
            if (ret.formValidate) {
                
                var btn = $('<input>'); 
                btn.attr("type", 'button');
                btn.attr("data-mail", ret.msg);
                btn.attr("class", "btn btn-success btn-xs");
                btn.attr("value", "Deletar");
                btn.attr("name", "deletemail");
                
                var tdbtn = $('<td>');
                tdbtn.attr("class", "grid-botoes");
                tdbtn.append(btn);

                var tr = $('<tr>').attr("data-mail", ret.msg);
                tr.append($('<td>').text(form[0].value));
                tr.append(tdbtn);
                $('#tabela-mail').append(tr);
                
            } else {
                displayFormMsg("#adicionamailmsg", ret.msg);
            }
        })
        .always(function() {
            btn.disabled = false;
        });
    });
    
    
});