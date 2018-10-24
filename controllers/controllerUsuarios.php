<?php 
class controllerUsuarios{

		public static function ingresoAdminController(){

			if(isset($_POST["usuarioIngreso"])){
				$datosController = array( "usuario"=>$_POST["usuarioIngreso"], 
								      "password"=>$_POST["passwordIngreso"]);
				$respuesta = Datos::ingresoUsuarioModel($datosController,"usuarios1");
				if($respuesta==0){
					echo '<script>location.href="admin.php?error"</script>';
				}else{
				if($respuesta["nombre"] == $_POST["usuarioIngreso"] && $respuesta["contrasena"] == $_POST["passwordIngreso"] && $respuesta["tipoUsuario"]=="1"){

					session_start();

					$_SESSION["validar"] = $respuesta["tipoUsuario"];
				
					echo '<script>location.href="inicio.php?admin"</script>';
	


		}else{
			echo '<script>location.href="admin.php?error"</script>';
		}
}
}
}
}
 ?>