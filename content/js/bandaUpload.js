$(document).ready(function () {
    
    $("form[name='form-uploadimg']").on('submit',(function(e){
        e.preventDefault();
        
        $.ajax({
            url: Site_Url("/usuario/uploadImagem"),
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
        success: function(data){
          
        },
        error: function(){} 	        
        })
        .done(function(data) {
           var ret = $.parseJSON(data);
           if (ret.formValidate) {
    
                var btn = $('<input>'); 
                btn.attr("type", 'button');
                btn.attr("data-foto", ret.msg);
                btn.attr("class", "btn btn-success btn-xs");
                btn.attr("value", "Deletar");
                btn.attr("name", "deletefoto");

                var divPrincipal = $('<div>');
                divPrincipal.attr("class", "col-sm-6 col-md-3");
                divPrincipal.attr("data-foto", ret.msg);

                var divTumb = $('<div>');
                divTumb.attr("class", "thumbnail");

                var divCaption = $('<div>');
                divCaption.attr("class", "caption");

                var imagem = $('<img>');
                imagem.attr("src", ret.url);

                divCaption.append(btn);
                divTumb.append(imagem);
                divTumb.append(divCaption);
                divPrincipal.append(divTumb);

                $('div.grid-foto').append(divPrincipal);
          
            }else{
             displayFormMsg("#adicionauploadamsg", ret.msg);
           } 
        });
     }));
     
     
     $(document).on("click", "input[name='deletefoto']", function(){
        var btn = this; 
        btn.disabled = true;// EVITA DOUBLE-CLICK
        var form = new Array();
        var id = $(btn).attr("data-foto");
        form[0] = { name:'FotoId', value: id};
        
        $.ajax({
            type: "POST",
            url: Site_Url("/usuario/deletaFoto"),
            data: GeraSecurityForm(form),
            success: function (data) {
               btn.disabled = true;
            }
        })
        .done(function(data) {
            var ret = parseInt(data);
            if(ret == 1){
                 $('div.grid-foto > div').each(function(){ 
                    var divid = $(this).attr("data-foto");
                    if(divid == id){
                        $(this).remove();
                    }
                });
            }else{
               btn.disabled = false;
            }
        });
    });
    
    
    $(document).on("click", "input[name='adiconacapa']", function(){
        var btn = this; 
        btn.disabled = true;// EVITA DOUBLE-CLICK
        var form = new Array();
        var id = $(btn).attr("data-foto");
        form[0] = { name:'FotoId', value: id};
        
        $.ajax({
            type: "POST",
            url: Site_Url("/usuario/adiconaCapa"),
            data: GeraSecurityForm(form),
            success: function (data) {
               btn.disabled = true;
            }
        })
        .done(function(data) {
            var ret = parseInt(data);
            if(ret == 1){
                $('div.grid-foto > div').each(function(){ 
                    var divid = $(this).attr("data-foto");
                    if(divid == id){
                        $(this).find('div.thumbnail').attr('class', 'thumbnail fotocapa');
                    }else{
                        $(this).find('div.thumbnail').attr('class', 'thumbnail');
                    }
                 });
            }
            btn.disabled = false;
        });
    });
   
   
    
});
