/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


 $(function() {
      
        $("#divlogin").addClass("floating-label-form-group-with-value");
        $("#divnomebanda").addClass("floating-label-form-group-with-value");
        $("#divnumintegrantes").addClass("floating-label-form-group-with-value");
        $("#divfacebook").addClass("floating-label-form-group-with-value");
        $("#divskype").addClass("floating-label-form-group-with-value");
        $("#divsite").addClass("floating-label-form-group-with-value");
        $("#divyoutube").addClass("floating-label-form-group-with-value");
        $("#divpreco").addClass("floating-label-form-group-with-value");
        
        var preco = $("input[name='Preco']").val();
        if(preco == 0){ $("input[name='Preco']").val('A combinar'); }
        
        /*
        $('#selectuf').on('change', function() {
            alert( this.value );
          })
          */
         
        $('#selectuf').change(function() {
            //$(this).attr('disabled', 'disabled');
            //
            //
            //this.disabled = true;
            montaCidade();
            //this.disabled = false;
            
          
        });
        
        montaCidade();
        
         // alert($('#selectuf').val());
            
        //$('#selectcidade').attr('disabled', 'disabled');
        
        
        function montaCidade(){
            var selectuf = $('#selectuf');
            var select = $('#selectcidade');
            var form = $("form[name='cidades']").serializeArray();
            
            
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
        
        
        
      
     
  });
  
  
  /*
   * $(document).ready(function () {
    $("input[name='Enviar']").click(function () {
        var form = $("form[name='login']").serializeArray();
        $.ajax({
            type: "POST",
            url: Site_Url("/login/logar"),
            data: GeraSecurityForm(form),
            success: function (data) {
                var ret = $.parseJSON(data);
                if (ret.formValidate) {
                    window.location = ret.url;
                } else {
                    displayFormMsg("#loginmsg", ret.msg);
                }
            }
        });
    });
});
   * 
   * 
   * 
   */