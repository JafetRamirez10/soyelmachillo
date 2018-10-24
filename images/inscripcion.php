<!DOCTYPE html>
<html>
<head>
	<title>Inscripción - Yo soy el Machillo</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilosfont.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<img src="images/encabezado-inscri.png" width="100%">
	<div class="container">
	<div class="row">

<form class="form-horizontal mt-4 pt-4 pb-4 pr-4 pl-4 formularioCompleto" style="margin:0 auto;background-color: white"">
  <div class="form-group">
    <label class="col-lg-4 control-label">Nombre:</label>
    <div class="col-lg-12">
      <input type="text" class="form-control" name="name" required />
    </div>
  </div>

  <div class="form-group">
    <label class="col-lg-4 control-label">Recibo:</label>
    <div class="col-lg-12">
      <input type="file" class="form-control" name="archivo" required />
    </div>
  </div>

  <div class="form-group">
    <label class="col-lg-12 control-label">Correo Electrónico:</label>
    <div class="col-lg-12">
      <input type="email" class="form-control" name="email" required />
    </div>
  </div>

  <div class="form-group">
    <label class="col-lg-4 control-label">Teléfono:</label>
    <div class="col-lg-12">
      <input type="tel" class="form-control" name="phone" required />
    </div>
  </div>

  <div class="form-group">
    <div class="">
      <button type="submit" name="submit" class="btn btn-primary left">Inscribir</button>
    </div>
  </div>

</form>
	</div>
</div>
<script src="js/jquery.min.js"></script>
<script>
	$(window).load(function(){
		  var posicion = $(".formularioCompleto").offset().top;
    $("html, body").animate({
        scrollTop: posicion
    }, 1000);
	})
</script>
<?php 
if(isset($_POST["submit"])){
	    $nombrearchivo = $_FILES['archivo']['name'];
    $archivo = $_FILES['archivo']['tmp_name'];
        $archivo = file_get_contents($archivo);
    $archivo = chunk_split(base64_encode($archivo));

	$destinatario ="jafet0810@gmail.com";
	$asunto = "Cliente requiere atención";
	$cuerpo='<html>
	<head>
	<title>Mensaje</title>
	</head>
	<body>
		
		<h1>
			Un Cliente le ha contactado por el sitio web
		</h1>
		<p>Nombre: '.$_POST["name"].'</p>
		<p>Correo Eléctronico: '.$_POST["email"].'</p>
		<p>Teléfono:'.$_POST["phone"].'</p>
		
	</body>
	</html>';
	 $cuerpo.=$archivo . "\r\n\r\n";
	$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
if(mail($destinatario,$asunto,$cuerpo,$headers)){
	echo "<script>
	location.href='inscripcions.php?enviado=true';
	</script>";
}
}
 ?>
</body>
</html>