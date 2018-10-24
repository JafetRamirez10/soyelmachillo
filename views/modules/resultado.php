<?php 
require_once "models/modelSolcitante.php";

require_once "controllers/controllerSolicitante.php";


 ?>

<button type="button" class="btn btn-primary botonActivarCodigo">Activar Código</button>
<button type="button" class="btn btn-primary botonFiltrarCodigo">Filtrar</button>
<div class="container">
	<form method="get" action="inicio.php" >
<div class="row">
<div class="activarCodigo1 container" id="paso1" style="display: none" >
		
	<h1 class="text-center pt-2 pb-2 texto"  style="width:100%;background-color: #202E57">Ingrese Datos:</h1>
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


<div class="activarCodigo1 container" id="paso2" style="display: none">
		
	<h1 class="text-center pt-2 pb-2 texto" style="width:100%;background-color: #202E57">Introduzca su codigo:</h1>
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
		
	<h1 class="text-center pt-2 pb-2 texto" style="width:100%;background-color: #202E57">Pronostica:</h1>
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
		<div class="col-6 center-block mb-4 mt-4">
	<button type="button" class="btn btn-lg enviarDatosUsuario1 texto center-block AnteriorDatos"  id="3">Anterior</button>

</div>
<div class="col-6 center-block mb-4 mt-4">
	<button type="submit" name="ActivandoCodigoEnviar" class="btn btn-lg enviarDatosUsuario1 texto center-block SiguienteDatos"   id="3">Enviar</button>

</div>
</div>

</div>
	<?php 
	$filtro=new controllerSolicitante();
	$filtro->ObtenerListadodeCodigosCompletos();


	 ?>

</div>
</form>
</div>