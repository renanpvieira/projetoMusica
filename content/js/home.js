$(document).ready(function () {

    var dados = new Array();
    dados[0] = { name:'Pagina', value: 0};
    dados[1] = { name:'Busca', value: ''};
   
    carregaBandas(dados, '/home/bandas');
       
    $(window).scroll(function () {
        console.log();
        if ($(document).height() <= $(window).scrollTop() + $(window).height()) {
           dados[0].value++;
           carregaBandas(dados, '/home/bandas');
        }
    });
    
    $("form[name='form-busca']").submit(function(e) {
        e.preventDefault();
        dados[1].value = $('input[name="input-busca"]').val();
        dados[0].value = 0;
        $('#listabandas').empty();
        carregaBandas(dados, '/home/bandas');
    });

});

