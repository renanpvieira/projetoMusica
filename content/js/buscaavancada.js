$(document).ready(function () {
    
    
    var url = '/buscaavancada/bandas';
    var estilos = new Array();
    var cidades = new Array();
    var ufs = new Array();
    var pagina = 0;
    
    
    function GeraDados(){
        var dados = new Array();
        dados[0] = { name:'pagina', value: pagina};
        dados[1] = { name:'ufs', value: JSON.stringify(ufs)};
        dados[2] = { name:'cidades', value: JSON.stringify(cidades)};
        dados[3] = { name:'estilos', value: JSON.stringify(estilos)};
        return dados;
    }
    
    function novaTag(texto, tipo, valor){
        var h4 = $('<h4>');
        h4.attr("data-type", tipo);
        h4.attr("data-val", valor);
        var i = $('<i>').attr("class", "fa fa-fw fa-remove");
        var span = $('<span>').attr("class", "label label-success label-especialgreen").text(texto);
        return h4.append(span.append(i));
    }
    
    /* O DELETE AINDA ESTA REMOVENDO ERRADO */
        
    $(document).on("click", "#filtros > h4", function(){
        var tipo = $(this).attr("data-type");
        var val = $(this).attr("data-val");
        switch(tipo) {
            case 'uf': ufs.splice(ufs.indexOf(val), 1); break;
            case 'cidade': cidades.splice(cidades.indexOf(val), 1); break;
            case 'estilo': estilos.splice(estilos.indexOf(val), 1); break;
        }
        $('#listabandas').empty(); /* Não posso fazer isso na função por causa da paginacao */
        pagina = 0;
        carregaBandas(GeraDados(), url);
        $(this).remove();
    });

    $("input[name='btn-uf']").click(function () {
        var val = parseInt($("select[name='ufs']").val());
        if(ufs.indexOf(val) === -1){
          ufs.push(val);  
          var tag = novaTag($("select[name='ufs'] option:selected").text(), 'uf', val);
          $('#filtros').append(tag);
        }
        $('#listabandas').empty(); /* Não posso fazer isso na função por causa da paginacao */
        pagina = 0;
        carregaBandas(GeraDados(), url);
    });

    $("input[name='btn-cidade']").click(function () {
        var val = parseInt($("select[name='cidades']").val());
        if(cidades.indexOf(val) === -1){
          cidades.push(val);
          var tag = novaTag($("select[name='cidades'] option:selected").text(), 'cidade', val);
          $('#filtros').append(tag);
        }
        $('#listabandas').empty(); /* Não posso fazer isso na função por causa da paginacao */
        pagina = 0;
        carregaBandas(GeraDados(), url);
    });

    $("input[name='btn-estilo']").click(function () {
        var val = parseInt($("select[name='estilos']").val());
        if(estilos.indexOf(val) === -1){
          estilos.push(val);
          var tag = novaTag($("select[name='estilos'] option:selected").text(), 'estilo', val);
          $('#filtros').append(tag);
        }
        $('#listabandas').empty(); /* Não posso fazer isso na função por causa da paginacao */
        pagina = 0;
        carregaBandas(GeraDados(), url);
    });
    
    $(window).scroll(function () {
        console.log();
        if ($(document).height() <= $(window).scrollTop() + $(window).height()) {
           pagina++;
           carregaBandas(GeraDados(), url);
        }
    });

     montaCidade();
     carregaBandas(GeraDados(), url);
     $('#selectuf').change(function() {  montaCidade();  });
    
    });
    
        