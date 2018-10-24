<!DOCTYPE html>
<html>
<head>
	<title>Inscripción - Yo soy el Machillo</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilosfont.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script src="js/refresh.js"></script>

</head>
<body>
	<img src="images/encabezado-inscri.png" width="100%">
	<div class="container">
	<div class="row">

<form class="form-horizontal mt-4 pt-4 pb-4 pr-4 pl-4 formularioCompleto" method="post" enctype="multipart/form-data"  style="margin:0 auto;background-color: white">
			<?php 
			if(isset($_GET["enviado"])){
				echo '<div class="alert alert-success" role="alert">
  <strong>Execelente!</strong> Pronto  te contactamos
</div>';
			}
		 ?>
  <div class="form-group">
    <label class="col-lg-4 control-label">Nombre:</label>
    <div class="col-lg-12">
      <input type="text" class="form-control" name="name" required />
    </div>
  </div>

  <div class="form-group">
    <label class="col-lg-4 control-label">Adjuntar Comprobante:</label>
    <div class="col-lg-12">
      <input type="file" class="form-control" name="archivo"  />
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
      <input type="tel" class="form-control" name="phone" required maxlength="8" minlength="8" />
    </div>
  </div>
<div class="form-group">
    <label class="col-lg-4 control-label">Mensaje:</label>
    <div class="col-lg-12">
      <textarea rows="3" cols="21" name="mensaje"></textarea>
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
	$(document).ready(function(){
		  var posicion = $(".formularioCompleto").offset().top;
    $("html, body").animate({
        scrollTop: posicion
    }, 2000);
	})
</script>
<?php 
if(isset($_POST["submit"])){
$nombre = strip_tags($_POST["name"]);
	$apellidos = strip_tags($_POST["phone"]);
	$mail = strip_tags($_POST["email"]);
	$mensaje =strip_tags($_POST["mensaje"]);

	//variables para los datos del archivo
	$nameFile = $_FILES['archivo']['name'];
	$sizeFile = $_FILES['archivo']['size'];
	$typeFile = $_FILES['archivo']['type'];
	$tempFile = $_FILES["archivo"]["tmp_name"];
	$fecha= time();
	$fechaFormato = date("j/n/Y",$fecha);

	$correoDestino = "jafet0810@gmail.com";
	
	//asunto del correo
	$asunto = "Enviado por " . $nombre . " ". $apellidos;

 	
 	// -> mensaje en formato Multipart MIME
	$cabecera = "MIME-VERSION: 1.0\r\n";
	$cabecera .= "Content-type: multipart/mixed;";
	//$cabecera .="boundary='=P=A=L=A=B=R=A=Q=U=E=G=U=S=T=E=N='"
	$cabecera .="boundary=\"=C=T=E=C=\"\r\n";
	$cabecera .= "From: {$mail}";

	//Primera parte del cuerpo del mensaje
	$cuerpo = "--=C=T=E=C=\r\n";
	$cuerpo .= "Content-type: text/plain";
	$cuerpo .= "charset=utf-8\r\n";
	$cuerpo .= "Content-Transfer-Encoding: 8bit\r\n";
	$cuerpo .= "\r\n"; // línea vacía
	$cuerpo .= "Correo enviado por: " .$nombre. " ";
	$cuerpo .="Teléfono:". $apellidos;
	$cuerpo .= " con fecha: " . $fechaFormato . "\r\n";
	$cuerpo .= "Email: " . $mail . "\r\n";
	$cuerpo .= "Mensaje" . $mensaje . "\r\n";
	$cuerpo .= "\r\n";// línea vacía

 	// -> segunda parte del mensaje (archivo adjunto)
        //    -> encabezado de la parte
    $cuerpo .= "--=C=T=E=C=\r\n";
    $cuerpo .= "Content-Type:".$typeFile;
    $cuerpo .= "name=" . $nameFile . "\r\n";
    $cuerpo .= "Content-Transfer-Encoding: base64\r\n";
    $cuerpo .= "Content-Disposition: attachment; ";
    $cuerpo .= "filename=" . $nameFile . "\r\n";
    $cuerpo .= "\r\n"; // línea vacía

    $fp = fopen($tempFile, "rb");
    $file = fread($fp, $sizeFile);
	$file = chunk_split(base64_encode($file));

    $cuerpo .= "$file\r\n";
    $cuerpo .= "\r\n"; // línea vacía
    // Delimitador de final del mensaje.
    $cuerpo .= "--=C=T=E=C=--\r\n";
    
	//Enviar el correo
	if(mail($correoDestino, $asunto, $cuerpo, $cabecera)){
		echo "<script>swal({
  title:'¡Gracias!, pronto te contactaremos',
  text:'',
  type:'success'
}).then((result) => {
	location.href='index.php';}
)</script>";
	}else{
		echo "Error de envio";
	}
}


// if(isset($_POST["submit"])){
// 	    $nombrearchivo = $_FILES['archivo']['name'];
// 	    $size = $_FILES["archivo"]["size"];
//     $archivo=fread($nombrearchivo, $size);
//     $tipoArchivo = $_FILES['archivo']['type'];
//     $archivo= chunk_split(base64_encode($archivo));

// 	$destinatario ="jafet0810@gmail.com";
// 	$asunto = "Cliente requiere atención";
// 	$cuerpo="--C=T=E=C\r\n";
// 	$cuerpo.="Content-type: text/html; charset=iso-8859-1\r\n";
// 	$cuerpo.='<html>
// 	<head>
// 	<title>Mensaje</title>
// 	</head>
// 	<body>
		
// 		<h1>
// 			Un Cliente le ha contactado por el sitio web
// 		</h1>
// 		<p>Nombre: '.$_POST["name"].'</p>
// 		<p>Correo Eléctronico: '.$_POST["email"].'</p>
// 		<p>Teléfono:'.$_POST["phone"].'</p>
		
// 	</body>
// 	</html>';
// 	$cuerpo.="--C=T=E=C\r\n";
// 	 $cuerpo.="Content-type: "+$tipoArchivo;
// 	 $cuerpo.="Content-Transfer-Encoding:base64\r\n";
// 	 $cuerpo.="Content-Disposition:attachment";
// 	  $cuerpo.=$archivo . "\r\n\r\n";
// 	  $cuerpo.="--=C=T=E=C=--\r\n";
// 	$headers = "MIME-Version: 1.0\r\n"; 
// $headers .= "Content-type: multipart/mixed;"; 
// $headers.="boundary=\"=C=T=E=C=\"\r\n";
// if(mail($destinatario,$asunto,$cuerpo,$headers)){
// 	echo "<script>
// 	location.href='inscripcion.php?enviado=true';
// 	</script>";
// }
// }
 ?>
</body>
</html>