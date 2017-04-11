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