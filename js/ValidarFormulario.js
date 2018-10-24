var comprobarDatos1 = true;
var  yasebuscoCodigo = false;
var valor =1;
var valorA=1;
$("#codigo").focusout(function(){

	var dato = $("#codigo").val();
	if(dato==""){
		 yasebuscoCodigo = false;
		 
	}
  var datos = new FormData();
  datos.append("ActivandoCodigo", dato);
   $.ajax({
    url:"views/modules/ajaxBuscarCliente.php",
    method:"POST",
    data:datos,
    cache:false,
    contentType:false,
    processData:false,

    success:function(respuesta){
     
      if(respuesta==0){
      	if(valorA==1){
       	       
       	       $("#codigo").focusout();
       	       	valoA=2;
       }
       
      	 $(".CodigoMiExiste").html("");
       $(".CodigoMiExiste").html("<div class='alert alert-danger avisoCapacitacion'><strong>Error!</strong>El código no existe o ya ha sido activado</div>");
       console.log(respuesta);
        comprobarDatos1=false;
        yasebuscoCodigo = false;

  }
  else{ 
 
         $(".CodigoMiExiste").html("");
       console.log(respuesta);
       if(valor==1){
       	       
       	       $("#codigo").focusout();
       	       	valor=2;
       }
       
        yasebuscoCodigo = true;
      comprobarDatos1=true;
    }
  }
 });

});

$("#codigo").focusin(function(){
	 $(".CodigoMiExiste").html("");
});

/** SOLICITANTE O USUARIO **/
$("select[name=SolicitanteOUsuario]").change(function(){
if($("select[name=SolicitanteOUsuario]").val()=="Solicitante"){
	$(".cajitadeBUscar").attr("style","display:none");
	$("#BUsacarSolicitante").attr("style","");
}else{
	$(".cajitadeBUscar").attr("style","display:none");
	$("#BUsacarUsuario").attr("style","");
}

});

/** FIN SOLICITANTE O USUARIO **/