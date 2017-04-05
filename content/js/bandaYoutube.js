$(document).ready(function () {
    
   
   $(document).on("click", "input[name='deletevideo']", function(){
        var btn = this; 
        btn.disabled = true;// EVITA DOUBLE-CLICK
        var form = new Array();
        var id = $(btn).attr("data-video");
        form[0] = { name:'BandaYoutubeId', value: id};
        
        $.ajax({
            type: "POST",
            url: Site_Url("/usuario/deletaVideo"),
            data: GeraSecurityForm(form),
            success: function (data) {
               btn.disabled = true;
            }
        })
        .done(function(data) {
            var ret = parseInt(data);
            if(ret == 1){
                $('#tabela-video > tbody  > tr').each(function() {
                    var trid = $(this).attr("data-video");
                    if(id == trid){
                      $(this).remove();
                    }
                });
            }else{
               btn.disabled = false;
            }
        });
    });
    
    $("input[name='adicionaVideo']").click(function () {
        var btn = this; 
        btn.disabled = true;// EVITA DOUBLE-CLICK
        var form = $("form[name='form-video']").serializeArray();
                
        $.ajax({
            type: "POST",
            url: Site_Url("/usuario/adicionaVideo"),
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
                btn.attr("data-video", ret.msg);
                btn.attr("class", "btn btn-success btn-xs");
                btn.attr("value", "Deletar");
                btn.attr("name", "deletevideo");
                
                var tdbtn = $('<td>');
                tdbtn.attr("class", "grid-botoes");
                tdbtn.append(btn);

                var tr = $('<tr>').attr("data-video", ret.msg);
                tr.append($('<td>').text(form[0].value));
                tr.append(tdbtn);
                $('#tabela-video').append(tr);
                
            } else {
                displayFormMsg(ret.formValidate, "#adicionavideomsg", ret.msg);
            }
        })
        .always(function() {
            btn.disabled = false;
        });
    });
});