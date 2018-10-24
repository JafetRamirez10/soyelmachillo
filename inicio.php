<?php 
  session_start();
  if(!isset($_SESSION["validar"])){
     echo "<script>location.href='admin.php'</script>";
  }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Zona Administración - Inicio</title>
    <meta name="viewport" content="width=device-width, user-scalable=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
  <script src="js/bootstrap.js"></script>
</head>
<body>
  <?php 
  require "models/modelCodigo.php";
  require "models/enlaces.php";

  require "controllers/controllerCodigo.php";
  require "controllers/enlaces.php";



 ?>
	<header>
		<?php 
    echo "<div class='row'>";
		include "modules/codigos.php";
    include "modules/perfiles.php";
    echo "</div>";
	 ?>
	<div class="container">
		<div class="row cabecera">
			<div class="col-12">
				<img src="images/logo.png" class="logo img-fluid animated tada">
			</div>
			<div class="col-12 mt-4">
				 <nav class="navbar navbar-inverse bg-inverse navbar-toggleable-md animated bounceIn">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleCenteredNav" aria-controls="navbarsExampleCenteredNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExampleCenteredNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="inicio.php">INICIO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="activar">CREAR CÓDIGO</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="inicio.php?pagina=perfiles">PERFILES</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="inicio.php?pagina=resultado">RESULTADOS</a>
           <!--  <a class="nav-link" onclick="alert('Estoy trabajando en ello, esta sección se podra filtrar apartir de los resultados de los partidos jugados, eliminar o archivar aquellas personas que no tuvieran suficiente suerte en el juego')">RESULTADOS</a> -->
          </li>
              <li class="nav-item">
            <a class="nav-link" href="inicio.php?pagina=cerrar">CERRAR SESIÓN</a>
          </li>
         
        </ul>
      </div>
    </nav>
			</div>
		</div>
	</div>
	</header>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-12 GenerarCodigos">
      
          <?php 

              $codigoNuevo = new controllerCodigos();
               $codigoNuevo->ingresoCodigo();
               $codigoNuevo->enviarCodigoExiste();
           ?>
        </div>

      </div>
      <div class="row">
        <div class="col-12">
          <?php 

             $codigo = new EnlacesController();
             $codigo->enlacesControllers();
           ?>
        </div>
      </div>
    </div>
  </section>


<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script src="js/ValidarFormulario.js"></script>
<script src="js/scripts.js"></script>
<script src="js/filtro.js"></script>

</body>
</html>