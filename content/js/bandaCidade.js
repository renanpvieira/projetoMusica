$(document).ready(function () {
       function montaCidade(){
            var selectuf = $('#selectuf');
            var select = $('#selectcidade');
            var form = $("form[name='form-cidade']").serializeArray();
            
            
            select.attr('disabled', 'disabled');
            selectuf.attr('disabled', 'disabled');
            
            
            $.ajax({
                type: "POST",
                url: Site_Url("/usuario/cidades"),
                data: GeraSecurityForm(form),
                success: function (data) {
                  select.empty();
                }
            })
            .done(function(data) {
                var ret = $.parseJSON(data);
                for (i in ret) { select.append($('<option>', { value: ret[i].CidadeId, text: ret[i].Descricao })); }
            })
            .always(function() {
                select.removeAttr('disabled');
                selectuf.removeAttr('disabled');
            });
        }
        
        montaCidade();
        $('#selectuf').change(function() {  montaCidade();  });
    
    
     $("input[name='adicionacidade']").click(function () {
        var btn = this; 
        btn.disabled = true;// EVITA DOUBLE-CLICK
        var form = $("form[name='form-cidade']").serializeArray();
        
         $.ajax({
            type: "POST",
            url: Site_Url("/usuario/adicionaCidade"),
            data: GeraSecurityForm(form),
            success: function (data) {
               btn.disabled = true;
            }
        })
        .done(function(data) {
            var ret = $.parseJSON(data);
            if (ret.formValidate) {
                
                $('#tabela-cidade > tbody  > tr.nao-info').remove();
                
                var btn = $('<input>'); 
                btn.attr("type", 'button');
                btn.attr("data-cidade", ret.msg);
                btn.attr("class", "btn btn-success btn-xs");
                btn.attr("value", "Deletar");
                btn.attr("name", "deletecidade");
                
                var tdbtn = $('<td>');
                tdbtn.attr("class", "grid-botoes");
                tdbtn.append(btn);

                var tr = $('<tr>').attr("data-cidade", ret.msg);
                tr.append($('<td>').text($("select[name='uf'] option:selected").text()));
                tr.append($('<td>').text($("select[name='cidade'] option:selected").text()));
                tr.append(tdbtn);
                
                $('#tabela-cidade').append(tr);
                
            } else {
                displayFormMsg(ret.formValidate, "#adicionacidademsg", ret.msg);
            }
        })
        .always(function() {
            btn.disabled = false;
        });
        
    });
    
    $(document).on("click", "input[name='deletecidade']", function(){
        var btn = this; 
        btn.disabled = true;// EVITA DOUBLE-CLICK
        var form = new Array();
        var id = $(btn).attr("data-cidade");
        form[0] = { name:'BandaCidadeId', value: id};
        
        $.ajax({
            type: "POST",
            url: Site_Url("/usuario/deletaCidade"),
            data: GeraSecurityForm(form),
            success: function (data) {
               btn.disabled = true;
            }
        })
        .done(function(data) {
            var ret = parseInt(data);
            if(ret == 1){
                $('#tabela-cidade > tbody  > tr').each(function() {
                    var trid = $(this).attr("data-cidade");
                    if(id == trid){
                      $(this).remove();
                    }
                });
                
                var qtd = $("#tabela-cidade > tbody  > tr").length;
                if(qtd == 1){
                   var tr = $('<tr>').attr("class", "nao-info");
                   var td = $('<td>').attr("colspan", "3");
                   td.text("Nenhum cidade informado!");       
                   tr.append(td);
                   $('#tabela-cidade').append(tr);
                }
                
            }else{
               btn.disabled = false;
            }
        });
    });
    
    
    
});

