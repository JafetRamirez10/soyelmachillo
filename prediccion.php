<!DOCTYPE html>
<html>
<head>
	<title>Predicciones - Soy el Machillo</title>
	<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/estilosfont.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="js/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="js/refresh.js"></script>

</head>
<body>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Condiciones y Politicas de Privacidad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Esta Vacío</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="images/logo-login2.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav navbar-left">
      <a class="nav-item nav-link active" href="index.php">INICIO<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="prediccion.php">HACER PREDICCIONES</a>
      <a class="nav-item nav-link" href="inscripcion.php">INSCRIPCIONES</a>
     
    </div>
  </div>
</nav>

<div class="container">
	<form method="get" action="inicio.php" >
<div class="row">
<div class="activarCodigo1 container" id="paso1"  >
		
	<h1 class="text-center pt-2 pb-2 texto"  style="width:100%;background-color: #A21B18;color:white">Predicciones:</h1>
	<div class="row row-sm-offset">
	
		<div class="col-md-4 multi-horizontal mt-4" data-for="name">
			<div class="form-group">
				<label class="form-control-label mbr-fonts-style display-7" for="name-form1-4t">Nombre Completo:</label>
				<input type="text" name="nombreCodigo" id="NombreParticipante" class="form-control" data-form-field="Name" required>
			</div>

		</div>
		<div class="col-md-4 multi-horizontal mt-4" data-for="email">
			<div class="form-group">
				<label class="form-control-label mbr-fonts-style display-7" for="name-form1-4t">E-mail:</label>
				<input type="email" name="emailCodigo" id="EmailParticipante" required class="form-control" data-form-field="Name">
			</div>
			
		</div>
		<div class="col-md-4 multi-horizontal mt-4" data-for="email">
			<div class="form-group">
				<label class="form-control-label mbr-fonts-style display-7" for="name-form1-4t">Teléfono:</label>
				<input type="tel" name="telefonoCodigo"  class="form-control" data-form-field="Name" id="TelefonoParticipante" minlength="8" maxlength="8" required">
			</div>
			
		</div>
		
<div class="col-12 center-block mb-4">
	<button type="button" class="btn btn-lg enviarDatosUsuario1 SiguienteDatos PrimeroS texto center-block" id="1">Siguiente</button>

</div>
</div>

	
</div>


<div class="activarCodigo1 container" id="paso2"  style="display: none;">
		
	<h1 class="text-center pt-2 pb-2 texto" style="width:100%;background-color: #A21B18;color:white">Introduzca su codigo:</h1>
	<div class="row row-sm-offset">
	
		<div class="col-md-4 multi-horizontal mt-4" data-for="name">
			<div class="form-group" style="visibility: hidden;">
				<label class="form-control-label mbr-fonts-style display-7" for="name-form1-4t">Nombre Completo:</label>
				<input type="text" name="" class="form-control" data-form-field="Name" required>
			</div>

		</div>
		<div class="col-md-4 multi-horizontal mt-4" data-for="email">
			<div class="form-group">
				<div class="CodigoMiExiste"></div>
				<label class="form-control-label mbr-fonts-style display-7" for="name-form1-4t">Código:</label>
				<input type="text" name="ActivandoElCodigo" maxlength="9" minlength="8"  id="codigo" required required class="form-control" data-form-field="Name">
				<label class="form-control-label mbr-fonts-style display-7" for="name-form1-4t" style="color:red">Haz doble click para confirmar</label>
			</div>
			
		</div>
		<div class="col-md-4 multi-horizontal mt-4" data-for="email">
			<div class="form-group" style="visibility: hidden;">
				<label class="form-control-label mbr-fonts-style display-7" for="name-form1-4t">Teléfono:</label>
				<input type="tel" name="" required class="form-control" data-form-field="Name" minlength="8" maxlength="8 required">
			</div>
			
		</div>
			<div class="col-6 center-block mb-4">
	<button type="button" class="btn btn-lg enviarDatosUsuario1 texto center-block AnteriorDatos" id="2">Anterior</button>

</div>
<div class="col-6 center-block mb-4">
	<button type="button" class="btn btn-lg enviarDatosUsuario1 texto center-block SiguienteDatos" id="2">Siguiente</button>

</div>
	
</div>

	
</div>
<div class="activarCodigo1 container" id="paso3" style="display: none">
		
	<h1 class="text-center pt-2 pb-2 texto" style="width:100%;background-color: #A21B18;color:white">Pronostica:</h1>
	<div class="row row-sm-offset ">
	
		<div class="col-md-4 multi-horizontal mt-4" data-for="name" style="border:1px  solid black">
			<div class="form-group">
				<label class="form-control-label mbr-fonts-style display-7" for="name-form1-4t">Partido #1:</label>
				<div class="row ">
					<div class="col-6 col-md-5">
						<img src="images/costa-rica.png" class="img-fluid">
						<input type="number" name="partido1CostaRica" min="0"  id="partido1CostaRica" required  class="col-12 col-md-offset-2">
					</div>
					<div class="col-1">VS</div>
						<div class="col-6 col-md-5">
						<img src="images/serbia.png" class="img-fluid">
						<input type="number" name="partido1Serbia" min="0"   id="partido1Serbia" required class="col-12 col-md-offset-2">
					</div>
					
				</div>
			</div>

		</div>
		<div class="col-md-4 multi-horizontal mt-4" data-for="email" style="border:1px  solid black">
			<div class="form-group">
				<label class="form-control-label mbr-fonts-style display-7" for="name-form1-4t">Partido #2:</label>
				<div class="row ">
					<div class="col-6 col-md-5">
						<img src="images/costa-rica.png" class="img-fluid">
						<input type="number" name="partido2CostaRica" min="0"  id="partido2CostaRica" required class="col-12 col-md-offset-2">
					</div>
					<div class="col-1">VS</div>
						<div class="col-6 col-md-5">
						<img src="images/brasil.png" class="img-fluid">
						<input type="number" name="partido2Brasil" min="0" id="partido2Brasil"  required class="col-12 col-md-offset-2">
					</div>
					
				</div>
			</div>

			
		</div>
		<div class="col-md-4 multi-horizontal mt-4" data-for="email" style="border:1px  solid black">
			<div class="form-group">
				<label class="form-control-label mbr-fonts-style display-7" for="name-form1-4t">Partido #3:</label>
				<div class="row ">
					<div class="col-6 col-md-5">
						<img src="images/costa-rica.png" class="img-fluid">
						<input type="number" name="partido3CostaRica" min="0" id="partido3CostaRica" required class="col-12 col-md-offset-2">
					</div>
					<div class="col-1">VS</div>
						<div class="col-6 col-md-5">
						<img src="images/suiza.png" class="img-fluid">
						<input type="number" name="partido3Suiza" min="0"  id="partido3Suiza" required class="col-12 col-md-offset-2">
					</div>
					
				</div>
			</div>

			
		</div>
		<div class="col-12"><br>
		<label><input type="checkbox" id="cbox1" value="first_checkbox"> Estoy de Acuerdo con <a  data-toggle="modal" data-target="#exampleModal" style="color:blue">las condiciones y politicas de privacidad</a></label></div>
		<div class="col-6 center-block mb-4 mt-4">
	<button type="button" class="btn btn-lg enviarDatosUsuario1 texto center-block AnteriorDatos"  id="3">Anterior</button>

</div>
<div class="col-6 center-block mb-4 mt-4">
	<button type="submit" name="ActivandoCodigoEnviar" class="btn btn-lg enviarDatosUsuario1 texto center-block SiguienteDatos"   id="3">Enviar</button>

</div>
</div>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script src="js/ValidarFormulario.js"></script>

<script src="js/scripts12.js"></script>

</body>
</html>