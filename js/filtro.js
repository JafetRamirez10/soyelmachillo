
$(".comparar").click(function(){
	var partido1CostaRicaA=$("#partido1CostaRicaA").val();
var partido1SerbiaA=$("#partido1SerbiaA").val();
var partido2CostaRicaA=$("#partido2CostaRicaA").val();
var partido2BrasilA=$("#partido2BrasilA").val();
var partido3CostaRicaA=$("#partido3CostaRicaA").val();
var partido3SuizaA=$("#partido3SuizaA").val();

	if(partido1CostaRicaA=="" ||partido1SerbiaA=="" ){
		alert("Debes llenar el campo del Partido #1");
	}else if(partido1CostaRicaA!="" && partido1SerbiaA!="" &&  partido2CostaRicaA=="" && partido2BrasilA=="" && partido3CostaRicaA=="" &&
		partido3SuizaA==""){

		 var datos ={
        'partido1CostaRicaA':partido1CostaRicaA,
        'partido1SerbiaA':partido1SerbiaA

     }
     $.ajax({
    url:"views/modules/ajaxBuscarCliente.php",
    type:"post",
    data:datos,
    success:function(respuesta){
       if(respuesta==0){
         $(".ResultadoCodigosPartidos").html("Aun nadie ha relacionado este pronostico");   
         console.log("Nada");
         console.log(partido1CostaRicaA);
         console.log(partido1SerbiaA);
       }else{
        	$(".ResultadoCodigosPartidos").html("");
        	    var posicion = $(".ResultadoCodigosPartidos").offset().top;
    $("html, body").animate({
        scrollTop: posicion
    }, 2000); 
           $(".ResultadoCodigosPartidos").html(respuesta);
           ValorTotal = $(".valorTotal").attr("id");
          $(".encontradoS").html("El Total de registrado: "+ ValorTotal+" personas");
          


       }
    }
});
}else if(partido1CostaRicaA!="" && partido1SerbiaA!="" &&  partido2CostaRicaA!="" && partido2BrasilA!="" && partido3CostaRicaA=="" &&
		partido3SuizaA==""){

	 var datos ={
        'partido1CostaRicaA':partido1CostaRicaA,
        'partido1SerbiaA':partido1SerbiaA,
        'partido2CostaRicaA':partido2CostaRicaA,
        'partido2BrasilA':partido2BrasilA

     }
     $.ajax({
    url:"views/modules/ajaxBuscarCliente.php",
    type:"post",
    data:datos,
    success:function(respuesta){
       if(respuesta==0){
   		 $(".ResultadoCodigosPartidos").html("Aun nadie ha relacionado este pronostico");
         console.log("Nada");
         console.log(partido1CostaRicaA);
         console.log(partido1SerbiaA);
       }else{
          $(".ResultadoCodigosPartidos").html("");
           var posicion = $(".ResultadoCodigosPartidos").offset().top;
    $("html, body").animate({
        scrollTop: posicion
    }, 2000); 
           $(".ResultadoCodigosPartidos").html(respuesta);
            ValorTotal = $(".valorTotal").attr("id");
          $(".encontradoS").html("El Total de registrado: "+ ValorTotal+" personas");
          


       }
    }
});

}else if(partido1CostaRicaA!="" && partido1SerbiaA!="" &&  partido2CostaRicaA!="" && partido2BrasilA!="" && partido3CostaRicaA!="" &&
		partido3SuizaA!=""){

var datos ={
        'partido1CostaRicaA':partido1CostaRicaA,
        'partido1SerbiaA':partido1SerbiaA,
        'partido2CostaRicaA':partido2CostaRicaA,
        'partido2BrasilA':partido2BrasilA,
        'partido3CostaRicaA':partido3CostaRicaA,
        'partido3SuizaA':partido3SuizaA


     }
     $.ajax({
    url:"views/modules/ajaxBuscarCliente.php",
    type:"post",
    data:datos,
    success:function(respuesta){
       if(respuesta==0){
   		 $(".ResultadoCodigosPartidos").html("Aun nadie ha relacionado este pronostico");
         console.log("Nada");
         console.log(partido1CostaRicaA);
         console.log(partido1SerbiaA);
       }else{
          $(".ResultadoCodigosPartidos").html("");
           var posicion = $(".ResultadoCodigosPartidos").offset().top;
    $("html, body").animate({
        scrollTop: posicion
    }, 2000); 
           $(".ResultadoCodigosPartidos").html(respuesta);
           ValorTotal = $(".valorTotal").attr("id");
          $(".encontradoS").html("El Total de registrado: "+ ValorTotal+" personas");
          


       }
    }
});




}



});