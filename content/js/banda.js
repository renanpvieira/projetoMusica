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
        if(preco == 0){
           $("input[name='Preco']").val('A combinar');
        }
        
      
     
    });