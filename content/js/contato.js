$(document).ready(function () {
    $("form[name='form-contato']").submit(function(e) {
        e.preventDefault();
        var form = $(this).serializeArray();
        $.ajax({
            type: "POST",
            url: Site_Url("/contato/salvar"),
            data: GeraSecurityForm(form),
            success: function (data) {
               // displayFormMsg("#contatomsg", ret.msg);
            }
        }).done(function(data) {
            var ret = $.parseJSON(data);
            displayFormMsg("#contatomsg", ret.msg);
        });
    });
});
