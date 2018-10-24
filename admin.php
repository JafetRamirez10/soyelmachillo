<?php 
	require "views/ViewsUsuarios.php";

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Zona de Administración</title>
    <meta name="viewport" content="width=device-width, user-scalable=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilosadmin.css">
  <script src="js/jquery.min.js"></script>
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2'></script>
</head>
<body>
	
	 <div class="row" id="pwd-container">

    <div class="col-md-4"></div>
    
    <div class="col-md-4">
      <section class="login-form">
        <form method="post" action="#" role="login">
          <img src="images/logo-login.png" class="img-responsive" alt="" />
          <input type="text" name="usuarioIngreso" placeholder="introduce tu usuario" required class="form-control input-lg"  />
          
          <input type="password" class="form-control input-lg" id="password" placeholder="Contraseña" required name="passwordIngreso" />
          
          
          <div class="pwstrength_viewport_progress"></div>
          
          
          <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Ingresar</button>
          <?php 

          if (isset($_GET["error"])) {
          	echo '         <div class="alert alert-danger" role="alert">
  				<strong>Upss!</strong> Al parecer la contraseña o usuario son incorrectos
				</div> ';
          }

           ?>
  
        </form>
        <?php 
          if(isset($_GET["cerrar"])){
            echo "<script>swal({
  title:'¡Se cerro sesión con éxito!',
  text:'',
  type:'success'
}).then((result) => {
  location.href='admin.php';})</script>";
          }

         ?>
  
      </section>  
      </div>
      
      <div class="col-md-4"></div>
      

  </div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>