

/**CREAR CODIGO **/
var datosUsuario="";
var negarEnvio=true;
$("#activar").click(function(){
swal({
  title: '¿El solicitante ya existe?',
  text: "",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya lo he registrado!',
  cancelButtonText: 'Es la primera vez',
  confirmButtonClass: 'btn btn-primary',
  cancelButtonClass: 'btn btn-danger',
  buttonsStyling: false,
  reverseButtons: true
}).then((result) => {
  if (result.value) {
    $("#codigosExiste").modal("show");
  } else if (
    // Read more about handling dismissals
    result.dismiss === swal.DismissReason.cancel
  ) {
    $("#codigos").modal("show");
  }
})

});





/**FIN DE CREAR CODIGO **/

/**CREAR CODIGO DE UN USUARIO QUE EXISTE**/
$("#nombreCodigoExiste").keyup(function(){
  var buscarCliente=$("#nombreCodigoExiste").val();
  var dato = $(this).val();
  if(dato==''){
    $("#nombreCodigoExiste").attr("value","");
    $("#correoCodigoExiste").attr("value","");
    $("#telefonoCodigoExiste").attr("value","");
    $(".avisoCapacitacion").remove();
     $(".brCapac").remove();
     $(".nombreExiste1").remove();

  }
  var datos = new FormData();
  datos.append("ExisteCliente", buscarCliente);
   $.ajax({
    url:"views/modules/ajaxBuscarCliente.php",
    method:"POST",
    data:datos,
    cache:false,
    contentType:false,
    processData:false,

    success:function(respuesta){
     
      if(respuesta==0){
         $(".avisoCapacitacion").remove();
         $(".brCapac").remove();
         $("#nombreCodigoExiste").attr("value","");
    $("#correoCodigoExiste").attr("value","");
    $("#telefonoCodigoExiste").attr("value","");
    $(".nombreExiste1").remove();
    document.querySelector("label[for='ExisteNombre']").innerHTML+="<br class='brCapac'><div class='alert alert-danger avisoCapacitacion'><strong>Error!</strong>No encontró Solicitante</div>";
    comprobarCliente=false;
    negarEnvio = true;
    $(".enviarCodigoExiste").attr("name","");
    $(".enviarCodigoExiste").attr("type","button");

  }else if(respuesta=="admin001/jafet@jafet.com/22133359"){
      $(".avisoCapacitacion").remove();
     $(".brCapac").remove();
    $(".nombreExiste1").remove();
    $(".enviarCodigoExiste").attr("name","");
    $(".enviarCodigoExiste").attr("type","button");


      } 
  else{
     $(".avisoCapacitacion").remove();
     $(".brCapac").remove();
     $(".nombreExiste1").remove();
     $(".MostrarNombreExiste").html("<p class='nombreExiste1'>"+respuesta+"</p><span class='btn btn-primary nombreExiste1 seleccionarUsuario'>Seleccionar</span>");
      datosUsuario=respuesta;
       $(".enviarCodigoExiste").attr("name","enviarCodigoExiste");
      $(".enviarCodigoExiste").attr("type","submit");
    }
  }
 });
});

$(".MostrarNombreExiste").click( function(){

  negarEnvio = false;
  CadenadeDatos = datosUsuario.split("/",3);
  $("#correoCodigoExiste").val(CadenadeDatos[1]);
  $("#nombreCodigoExiste").val(CadenadeDatos[0]);
  $("#telefonoCodigoExiste").val(CadenadeDatos[2]);



});

function ExisteUsuarioComprobar(){
  if(negarEnvio==true){
    $(".enviarCodigoExiste").attr("name","");
    $(".enviarCodigoExiste").attr("type","button");
     document.querySelector("label[for='ExisteNombre']").innerHTML+="<br class='brCapac'><div class='alert alert-danger avisoCapacitacion'><strong>Error!</strong>Por favor, busque un solicitante que exista</div>";
     return false;
  }else{
    $(".enviarCodigoExiste").attr("name","enviarCodigoExiste");
       $(".enviarCodigoExiste").attr("type","submit");
    return true;
  }
}

/**CREAR CODIGO DE UN USUARIO QUE EXISTE**/


/**EDITAR USUARIO**/
  $(".buttonEditCodigo").click(function(){
    var id = $(this).attr("id");
    var nombre =$(this).parents("tr").find(".nombreEditar").html();
    var email=$(this).parents("tr").find(".correoEditar").html();
    var telefono=$(this).parents("tr").find(".telefonoEditar").html();


    $("#EditarnombreUsuario").attr("value",nombre);
    $("#EditarcodigoUsuario").attr("value",email);
    $("#EditartelefonoUsuario").attr("value",telefono);
    $("#idUsuarioEditar").attr("value",id);
  })
/* FIN EDITAR USUARIO**/




/** ELIMINAR USUARIO **/
$(".ButtonTrashCodigo").click(function(){
  var id=$(this).attr("id");
swal({
  title: '¿Eliminar?',
  text: "Estas seguro que deseas eliminar este item",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Sí',
  cancelButtonText:'No'
}).then((result) => {
  if (result.value) {
    location.href="inicio.php?pagina=perfiles&eliminar="+id;
  }
});
})

/** FIN DE ELIMINAR USUARIO **/

/** CANTIDAD DE CODIGOS **/
$(".CantidadCodigo").click(function(){
  var id=$(this).attr("id");
  $("#Micodigo"+id).modal("show");
})
/**FIN DE CODIGOS**/


/**BUSCAR AJAX ELEMENTO**/
$("#buscarCliente").keyup(function(){
  var dato = $(this).val();
  if(dato==''){
     $(".tablaOriginal").attr("style","");
       $(".tablaBusqueda").attr("style","display:none");

  }
  var datos = new FormData();
  datos.append("BuscarCliente", dato);
   $.ajax({
    url:"views/modules/ajaxBuscarCliente.php",
    method:"POST",
    data:datos,
    cache:false,
    contentType:false,
    processData:false,

    success:function(respuesta){
     
      if(respuesta==0){
       $(".tablaOriginal").attr("style","display:none");
       $(".tablaBusqueda").attr("style","display:none");
       $(".NoEncontrado").html("");
       $(".NoEncontrado").html("<div class='alert alert-danger avisoCapacitacion'><strong>Error!</strong>No se ha encontrado nadie con estos datos</div>");
       console.log(respuesta);
  }
  else{
        $(".NoEncontrado").html("");
     $(".tablaOriginal").attr("style","display:none");
       $(".tablaBusqueda").attr("style","");
       $(".tablaBusqueda").html(respuesta);
       console.log(respuesta);
    }
  }
 });

})

/** FIN BUSCAR AJAX ELEMENTO**/


/** BUSCAR CODIGO O NOMBRE **/
$("#BuscandoCodigo").keyup(function(){
 var dato = $(this).val();
  if(dato==''){
       $(".tablaBusquedaCodigo").attr("style","display:none");

  }
  var datos = new FormData();
  datos.append("BuscandoCodigo", dato);
   $.ajax({
    url:"views/modules/ajaxBuscarCliente.php",
    method:"POST",
    data:datos,
    cache:false,
    contentType:false,
    processData:false,

    success:function(respuesta){
     
      if(respuesta==0){
       $(".tablaBusquedaCodigo").attr("style","display:none");
       $(".NoEncontrados").html("");
       $(".NoEncontrados").html("<div class='alert alert-danger avisoCapacitacion'><strong>Error!</strong>No se ha encontrado nadie con estos datos</div>");
       console.log(respuesta);
  }
  else{
        $(".NoEncontrados").html("");
       $(".tablaBusquedaCodigo").attr("style","");
       $(".tablaBusquedaCodigo").html(respuesta);
       console.log(respuesta);
    }
  }
 });

});

/**FIN DE BUSCAR CODIGO O NOMBRE**/

$("#BuscandoCodigoUsuario").keyup(function(){
 var dato = $(this).val();
  if(dato==''){
       $(".tablaBusquedaCodigo").attr("style","display:none");

  }
  var datos = new FormData();
  datos.append("BuscandoCodigoUsuario", dato);
   $.ajax({
    url:"views/modules/ajaxBuscarCliente.php",
    method:"POST",
    data:datos,
    cache:false,
    contentType:false,
    processData:false,

    success:function(respuesta){
     
      if(respuesta==0){
       $(".tablaBusquedaCodigo").attr("style","display:none");
       $(".NoEncontrados").html("");
       $(".NoEncontrados").html("<div class='alert alert-danger avisoCapacitacion'><strong>Error!</strong>No se ha encontrado nadie con estos datos</div>");
       console.log(respuesta);
  }
  else{
        $(".NoEncontrados").html("");
       $(".tablaBusquedaCodigo").attr("style","");
       $(".tablaBusquedaCodigo").html(respuesta);
       console.log(respuesta);
    }
  }
 });

});
/** BUSCAR USUARIO SOLO USUARIO QUE ACTIVAN**/



/** FIN DE USUARIO SOLO USUARIO **/



/**BORRAR CODIGO**/
$(".ButtonTrashCodigoEliminar").click(function(){
  var id=$(this).attr("id");
  var codigo=$(this).attr("eliminar");
swal({
  title: '¿Eliminar?',
  text: "Estas seguro que deseas eliminar este codigo",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Sí',
  cancelButtonText:'No'
}).then((result) => {
  if (result.value) {
    location.href="inicio.php?pagina=perfiles&eliminarCodigo="+id+"&Codigo="+codigo;
  }
});
})




/**ACTIVAR UN CODIGO **/

$(".botonActivarCodigo").click(function(){

  $(".activarCodigo1").attr("style","display:none");
  $("#paso1").fadeIn();
});

/** SIGUIENTE  Y ANTERIOR **/
$(".SiguienteDatos").click(function(){
 identificador= $(this).attr("id");
 ConvertirIdentificador = parseInt(identificador);
 if(identificador=="1"){

   comprobarDatos1 = true;
  nombre = $("#NombreParticipante").val();

 email = $("#EmailParticipante").val();

 telefono = $("#TelefonoParticipante").val();

if(nombre.length== 0 || email.length==0 || telefono.length==0 ){
    comprobarDatos1 = false;
    alert("Al parecer uno o varios campos estan vacidos");   
     
}
  if(email != ""){

    var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

    if(!expresion.test(email)){
      comprobarDatos1 = false;
        alert("Al parecer este no es un correo");
        
      }
}
  if(telefono != ""){

    var caracteres = telefono.length;
    var expresion = /^[0-9]*$/;

    if(caracteres < 8){
      comprobarDatos1 = false;
     alert("El número de teléfono  debe tener  8 digitos");
     
    }

    if(!expresion.test(telefono)){
      comprobarDatos1 = false;
     alert("Solo coloca los números, sin -, /, ni ningun otro simbolo");
     console.log(telefono);
   

    }

  }
}
if(identificador=="2"){
  codigo =$("#codigo").val();

  console.log(comprobarDatos1);
  if(codigo.length==0){
    comprobarDatos1=false;

      alert("Este campo esta vacío");

  }

  if(yasebuscoCodigo==true){
     comprobarDatos1=true;
  }


}
if(identificador=="3"){
  enviarDatosAjax();
}

ConvertirIdentificador = parseInt(identificador);

 // nombre = $("#NombreParticipante").attr("id");
 // email = $("#EmailParticipante").attr("id");
 // telefono = $("#TelefonoParticipante").attr("id");
  Siguiente = ConvertirIdentificador+1;
  console.log(Siguiente);
  if(comprobarDatos1==true){
  $(".activarCodigo1").attr("style","display:none");
  $("#paso"+Siguiente).fadeIn();
   comprobarDatos1=false;

}});

$(".AnteriorDatos").click(function(){

 identificador= $(this).attr("id");
ConvertirIdentificador = parseInt(identificador);
  if(ConvertirIdentificador==3){
    $("#codigo").val("0000");
    $("#codigo").focusout();
      }
 // nombre = $("#NombreParticipante").attr("id");
 // email = $("#EmailParticipante").attr("id");
 // telefono = $("#TelefonoParticipante").attr("id");
  Anterior = ConvertirIdentificador-1;
  console.log(Anterior);
  $(".activarCodigo1").attr("style","display:none");
  $("#paso"+Anterior).fadeIn();
   comprobarDatos1=false;

});


/** FIN DE SIGUIENTE  Y ANTERIOR **/

function enviarDatosAjax(){
 partido1CostaRica = $("#partido1CostaRica").val();
 partido1Serbia = $("#partido1Serbia").val();

 partido2CostaRica = $("#partido2CostaRica").val();
 partido2Brasil = $("#partido2Brasil").val();

 partido3CostaRica = $("#partido3CostaRica").val();
 partido3Suiza= $("#partido3Suiza").val();

 if(partido1CostaRica.length==0 || partido1Serbia.length==0 || partido2CostaRica.length==0 || partido2Brasil.length==0 || partido3CostaRica.length==0 || partido3Suiza.length==0){
    alert("Uno o varios campos estan vacíos");
 }else{

   var datos ={
        'nombre':nombre,
        'correo':email,
        'telefono':telefono,
        'codigo':codigo,
        'partido1CostaRica':partido1CostaRica,
        'partido1Serbia':partido1Serbia,
        'partido2CostaRica':partido2CostaRica,
        'partido2Brasil':partido2Brasil,
        'partido3CostaRica':partido3CostaRica,
        'partido3Suiza':partido3Suiza

     }
     $.ajax({
    url:"views/modules/ajaxBuscarCliente.php",
    type:"post",
    data:datos,
    success:function(respuesta){
       if(respuesta==0){
        swal({
  title: '¿Deseas activar otro código?',
  text: "",
  type: 'info',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Sí',
  cancelButtonText:'No'
}).then((result) => {
  if (result.value) {
    $(".activarCodigo1").attr("style","display:none");
    $("#partido1CostaRica").val("");
     $("#partido1Serbia").val("");
     $("#partido2CostaRica").val("");
     $("#partido2Brasil").val("");
     $("#partido3CostaRica").val("");
     $("#partido3Suiza").val("");
     $("#codigo").val("");
   comprobarDatos1=false;
   yasebuscoCodigo=false;
    $("#paso2").fadeIn();
  }else{

        swal({
  title: 'Se activo con éxito tú código',
  text: "",
  type: 'info',
  showCancelButton: false,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'OK'
}).then((result) => {
  if (result.value) {
      location.href="inicio.php?pagina=resultado";
  }});

  }
});
         console.log("Nada");
       }else{
        
            console.log("Funciona");
          


       }
    }
})

 }
}


/**FIN DE ACTVIAR UN CODIGO**/


/** FILTRAR BOTON Y FUNCIONES **/
$(".botonFiltrarCodigo").click(function(){
  $(".activarCodigo1").attr("style","display:none");
  $("#paso4").fadeIn();
})

/**FIN DE FILTRAR BOTON Y FUNCIONES**/