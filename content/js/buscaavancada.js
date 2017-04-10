$(document).ready(function () {
       
    
        function montaCidade(){
            var selectuf = $('#selectuf');
            var select = $('#selectcidade');
            var form = $("form[name='form-buscaavancada']").serializeArray();
            
            
            
            select.attr('disabled', 'disabled');
            selectuf.attr('disabled', 'disabled');
            
            
            $.ajax({
                type: "POST",
                url: Site_Url("/buscaavancada/cidades"),
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
        
      
    
      
      var estilos = new Array();
      var cidades = new Array();
      var ufs = new Array();
      
        
        function buscar(){
            
            var form = new Array();
            form[0] = { name:'ufs', value: JSON.stringify(ufs)};
            form[1] = { name:'cidades', value: JSON.stringify(cidades)};
            form[2] = { name:'estilos', value: JSON.stringify(estilos)};
            
            $.ajax({
                type: "POST",
                url: Site_Url("/buscaavancada/testetando"),
                data: GeraSecurityForm(form),
                data: GeraSecurityForm(form),
                beforeSend: function () {
                    $('#bandas').empty();
                    $('#bandas').append( $('<img>').attr('src', Base_Url('content/imgs/site/load.gif')) );
                },
                success: function (data) {
                   //btn.disabled = true;
                   console.log('sucesso');
                }
            })
            .done(function(data) {
                $('#bandas').empty();
                console.log(data);
            });
            
            
        }
        
        
        
        
        $(document).on("click", "#filtros > h4", function(){
            var tipo = $(this).attr("data-type");
            var val = $(this).attr("data-val");
            switch(tipo) {
                case 'uf':
                    ufs.splice(ufs.indexOf(val), 1);
                    break;
                case 'cidade':
                    cidades.splice(cidades.indexOf(val), 1);
                    break;
                case 'estilo':
                    estilos.splice(estilos.indexOf(val), 1);
                    break;
            }
            buscar();
            $(this).remove();
        });
        
        function novaTag(texto, tipo, valor){
            var h4 = $('<h4>');
            h4.attr("data-type", tipo);
            h4.attr("data-val", valor);
            var i = $('<i>').attr("class", "fa fa-fw fa-remove");
            var span = $('<span>').attr("class", "label label-success label-especialgreen").text(texto);
            return h4.append(span.append(i));
        }
        
        
        $("input[name='btn-uf']").click(function () {
            var val = parseInt($("select[name='ufs']").val());
            if(ufs.indexOf(val) === -1){
              ufs.push(val);  
              var tag = novaTag($("select[name='ufs'] option:selected").text(), 'uf', val);
              $('#filtros').append(tag);
            }
            buscar();
        });
        
        $("input[name='btn-cidade']").click(function () {
            var val = parseInt($("select[name='cidades']").val());
            if(cidades.indexOf(val) === -1){
              cidades.push(val);
              var tag = novaTag($("select[name='cidades'] option:selected").text(), 'cidade', val);
              $('#filtros').append(tag);
            }
            buscar();
        });
        
        $("input[name='btn-estilo']").click(function () {
            var val = parseInt($("select[name='estilos']").val());
            if(estilos.indexOf(val) === -1){
              estilos.push(val);
              var tag = novaTag($("select[name='estilos'] option:selected").text(), 'estilo', val);
              $('#filtros').append(tag);
            }
            buscar();
        });
    
    
    /*
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
        */
    });
    