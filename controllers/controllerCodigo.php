<?php 
class controllerCodigos{
	public  static function  ingresoCodigo(){
		if(isset($_POST["enviarCodigo"])){
		$idSolicitante="";
		$datosController= array( "nombre"=>$_POST["nombreCodigo"],
								"email"=>$_POST["emailCodigo"],
								"telefono"=>$_POST["telefonoCodigo"]);
		$respuestaSolicitante =modelCodigos::ingresoSolicitante($datosController,"usuarios");
		$consultarSolicitante=modelCodigos::consultarSolicitante($datosController,"usuarios");
		echo ' <h2 class="mt-2">A nombre del solicitante:'.$_POST["nombreCodigo"].'</h2>';
		echo '<p class="mt-2 mb-2">Se ha generado:<p>';
		foreach ($consultarSolicitante as $row => $item) {
				$idSolicitante = $item["ID"];
		}
		$code = "";
		$alpha = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$longitud=8;
		$codigoP="";
		
			$cantidadConvertir = $_POST["cuantoCodigo"]; 
			for($j=0; $j<$cantidadConvertir; $j++){
			
			for($i=0;$i<$longitud;$i++){
    $code .= $alpha[rand(0, strlen($alpha)-1)];
}
		echo'<p>'. $code."</p>";
		$comprobarCodigo=modelCodigos::comprobarCodigoModel($code, "codigoid");
		
		if($codigoP==$code || $comprobarCodigo==1){
				 $j=$j-1;
			}
			$insertarCodigo=modelCodigos::ingresarCodigoModel($idSolicitante,$code,"codigoid");
		$codigoP=$code;
		$code="";
					
		}
	}
}
	public static function ExisteUsuario($datosController){
		$respuesta=modelCodigos::ExisteUsuarioModel($datosController,"usuarios");
		foreach ($respuesta as $row => $item) {
				return $item["nombre"]."/".$item["correo"]."/".$item["telefono"];

			}
			
		}
	public static function enviarCodigoExiste(){
		if(isset($_POST["enviarCodigoExiste"])){
			$idSolicitante="";
			$datosController=array("nombre"=>$_POST["nombreCodigoExiste"],
								"email"=>$_POST["emailCodigoExiste"],
								"telefono"=>$_POST["telefonoCodigoExsite"]);
			$consultarSolicitante=modelCodigos::consultarSolicitante($datosController,"usuarios");
			echo ' <h2 class="mt-2">A nombre del solicitante:'.$_POST["nombreCodigoExiste"].'</h2>';
		echo '<p class="mt-2 mb-2">Se han  generado nuevamente:<p>';
		foreach ($consultarSolicitante as $row => $item) {
				$idSolicitante = $item["ID"];
		}
		$code = "";
		$alpha = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$longitud=8;
		$codigoP="";
		
			$cantidadConvertir = $_POST["cuantoCodigo"]; 
			for($j=0; $j<$cantidadConvertir; $j++){
			
			for($i=0;$i<$longitud;$i++){
    $code .= $alpha[rand(0, strlen($alpha)-1)];
}
		echo'<p>'. $code."</p>";
		$comprobarCodigo=modelCodigos::comprobarCodigoModel($code, "codigoid");
		
		if($codigoP==$code || $comprobarCodigo==1){
				 $j=$j-1;
			}
			$insertarCodigo=modelCodigos::ingresarCodigoModel($idSolicitante,$code,"codigoid");
		$codigoP=$code;
		$code="";
		}			
		}

		}
		
	}


 ?>	
