$(document).ready(function () {

    /*
    $('input[type=checkbox]').click(function () {
        if ($(this).attr('data') == 'uf') {
            var json = new Array();

            $('input[type=checkbox]').each(function () {
                if ($(this).attr('data') == 'uf') {
                    if ($(this).prop('checked')) {
                        json.push($(this).prop('value'));
                    }
                }
            });

            if (json.length >= 1) {
                console.log(JSON.stringify(json));

                $.getJSON("http://localhost:82/projeto01/index.php/home/getJsonCidades", { 'chaves': JSON.stringify(json) })
                .done(function (data) {
                    console.log("second success");
                    console.log(JSON.stringify(data));

                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });

            }



        }
    });
    */
   
   var pagina = 0;
   var strbusca = "";
   carregaBandas();
   
   function carregaBandas(){
       
       var form = new Array();
       form[0] = { name:'Pagina', value: pagina};
       form[1] = { name:'Busca', value: strbusca.trim()};
       
       $.ajax({
            type: "POST",
            url: Site_Url("/home/bandas"),
            data: GeraSecurityForm(form),
            beforeSend: function () {
                console.log('before');
            },
            success: function (data) {
               //btn.disabled = true;
               console.log('sucesso');
            }
        })
        .done(function(data) {
            var ret = $.parseJSON(data);
            console.log(ret.length);
            
            $('div.fim-busca').remove();
    
            for (i in ret) { 
                var divPrincipal = $('<div>').attr("class", "col-sm-4 portfolio-item");
                var divCaption = $('<div>').attr("class", "caption");
                var divCaptionCont = $('<div>').attr("class", "caption-content");
                
                var href = '/banda/index/' + ret[i].BandaId;
                var link = $('<a>');
                link.attr("href", Site_Url(href));
                link.attr("class", "portfolio-link");
                link.attr("data-toggle", "modal");
                
                var src = 'content/imgs/bandas/' + ret[i].foto;
                var img = $('<img>');
                img.attr("src", Base_Url(src));
                img.attr("class", "img-responsive");
                img.attr("alt", ret[i].Nome);
                
                var p1 = $('<p>').text(ret[i].Nome);
                var p2 = $('<p>').text(ret[i].Estilos);
                
                divCaptionCont.append(p1);
                divCaptionCont.append(p2);
                divCaption.append(divCaptionCont);
                
                link.append(divCaption);
                link.append(img);
                
                divPrincipal.append(link);
                $("#listabandas").append(divPrincipal);
                
            }
            
            if(ret.length < 3){
               var div = $('<div>').attr("class", "col-sm-12 portfolio-item fim-busca");
               var p = $('<p>').text("A BUSCA TERMINOU!");
               div.append(p);
               $("#listabandas").append(div);
            }
            
        });
    }

    
    
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() == $(document).height()) {
           pagina++;
           carregaBandas();
        }
    });
    
     $("form[name='form-busca']").submit(function(e) {
        e.preventDefault();
        strbusca = $('input[name="input-busca"]').val();
        pagina = 0;
        $('#listabandas').html('');
        carregaBandas();
    });

});

