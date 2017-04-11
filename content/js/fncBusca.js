function carregaBandas(form, url){
    
     $.ajax({
            type: "POST",
            url: Site_Url(url),
            data: GeraSecurityForm(form),
            beforeSend: function () {
                $('#load').empty();
                $('#load').append( $('<img>').attr('src', Base_Url('content/imgs/site/load.gif')) );
            },
            success: function (data) {
               //btn.disabled = true;
               //console.log('sucesso');
               $('#load').empty();
            }
        })
        .done(function(data) {
            
             
            //console.log(data);
            //return
            
            var ret = $.parseJSON(data);
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
                //var src = 'content/imgs/bandas/bandaBase.jpg';
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