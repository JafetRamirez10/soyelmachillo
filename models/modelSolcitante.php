<?php 
	
	class modelSolicitante{
		public static function mostrarSolicitante(){
			$stmt= Conexion::conectar()->prepare("SELECT nombre, telefono,ID,correo,tipoUsuario FROM   usuarios1 WHERE  tipoUsuario='2' OR  tipoUsuario='3'");
			if($stmt->execute()){
				return $stmt->fetchAll();
			}
			$stmt->close();

		}
		public static function editarPerfilModel($datosModel,$tabla){
			$stmt= Conexion::conectar()->prepare("UPDATE usuarios1 SET nombre=:nombre , telefono=:telefono, correo=:correo WHERE ID=:id");
			$stmt->bindParam(":nombre",$datosModel["nombre"]);
			$stmt->bindParam(":telefono",$datosModel["telefono"]);
			$stmt->bindParam(":correo",$datosModel["correo"]);
			$stmt->bindParam(":id",$datosModel["id"]);
			if($stmt->execute()){
			
				return 0;
			}

			$stmt->close();
		}
	public static function eliminarPerfilModel($datosModel,$tabla){
		$stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:id");
		$stmt->bindParam(":id",$datosModel);
		if($stmt->execute()){
			return 0;
		}
	}
	public static function BuscarUsuarioModel($datosModel,$tabla){
		$stmt=Conexion::conectar()->prepare("SELECT * FROM usuarios1 WHERE nombre LIKE  '%".$datosModel."%' OR correo LIKE '%".$datosModel."%' OR  telefono LIKE '%".$datosModel."%'" );
		$stmt->execute();
	if($stmt->rowCount()==0){
		
		return 0;
	}else{
		return $stmt->fetchAll();
	}
	$stmt->close();
	}
	public static function BuscandoCodigoModel($datosModel){
		$stmt=Conexion::conectar()->prepare("SELECT * FROM usuarios1,codigoid WHERE (nombre LIKE  '%".$datosModel."%' OR correo LIKE '%".$datosModel."%' OR  telefono LIKE '%".$datosModel."%' OR codigo LIKE '%".$datosModel."%') AND idUsuario=ID ");
		$stmt->execute();
		if($stmt->rowCount()==0){
			return 0;
		}else{
			return $stmt->fetchAll();
		}
		$stmt->close();
	}
	public static function eliminarCodigoUsuarioModel($datosModel,$tabla){
		$stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idUsuario=:id AND codigo=:codigo");
		$stmt->bindParam(":id",$datosModel["id"]);
		$stmt->bindParam(":codigo",$datosModel["codigo"]);
		if($stmt->execute()){
			return 0;
		}
	}
	public static function ActivandoCodigoModel($datosModel,$tabla){
		$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE codigo='".$datosModel."' AND Uso=0");
		$stmt->execute();
		if($stmt->rowCount()==0){
			return 0;
		}else{
			return 1;
		}
	}
	public static function BuscandoUsuarioModel($datosController, $tabla){
		$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nombre=:nombre AND correo=:correo AND telefono=:telefono");
		$stmt->bindParam(":nombre",$datosController["nombre"]);
		$stmt->bindParam(":correo",$datosController["correo"]);
		$stmt->bindParam(":telefono", $datosController["telefono"]);
		$stmt->execute();
		if($stmt->rowCount()==0){
			return 0;
		}else{
			return 1;
		}
	}
	public static function EncenderCodigoModel($datosController,$tabla){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET Uso='1' WHERE codigo=:codigo");
		$stmt->bindParam(":codigo",$datosController);
		$stmt->execute();
	}
	public static function AgregarUsuarioModel($datosController,$tabla){
		$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,correo,telefono,tipoUsuario)VALUES(:nombre,:correo,:telefono,'3')");
		$stmt->bindParam(":nombre",$datosController["nombre"]);
		$stmt->bindParam(":correo",$datosController["correo"]);
		$stmt->bindParam(":telefono",$datosController["telefono"]);
		$stmt->execute();

	}
	public static function BuscarUsuarioModelActivar($datosController,$tabla){
	$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nombre=:nombre AND correo=:correo AND telefono=:telefono");
	$stmt->bindParam(":nombre",$datosController["nombre"]);
		$stmt->bindParam(":correo",$datosController["correo"]);
		$stmt->bindParam(":telefono",$datosController["telefono"]);
		$stmt->execute();
		return $stmt->fetchAll();
	}
	// public static function EditarCodigoActivo($datosController,$idEnviar,$tabla){
	// 	$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET idUsuario=:idEnviar WHERE codigo=:codigo");
	// 	$stmt->bindParam(":idEnviar",$idEnviar);
	// 	$stmt->bindParam(":codigo",$datosController);
	// 	$stmt->execute();
	// }
	public static function EncontrarCodigoID($datosController,$tabla){
		$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE codigo=:codigo");
		$stmt->bindParam(":codigo",$datosController);
		$stmt->execute();
		return $stmt->fetchAll();
	}
	public static function anadirResultadosModel($datosController,$idEnviarUsuario,$idEnviarCodigo,$tabla){
		$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla(IDElUsuario,partido1CostaRica,partido1Serbia,partido2CostaRica,partido2Brasil,partido3CostaRica,partido3Suizas,IDElCodigo)VALUES(:usuario,:partidoCR1,:partidoSB1,:partidoBR2,:partidoCR2,:partidoSZ3,:partidoCR3,:codigo)");
		$stmt->bindParam(":usuario",$idEnviarUsuario);
		$stmt->bindParam(":partidoCR1",$datosController["partido1CostaRica"]);
		$stmt->bindParam(":partidoSB1",$datosController["partido1Serbia"]);
		$stmt->bindParam(":partidoBR2",$datosController["partido2Brasil"]);
		$stmt->bindParam(":partidoCR2",$datosController["partido2CostaRica"]);
		$stmt->bindParam(":partidoCR3",$datosController["partido3CostaRica"]);
		$stmt->bindParam(":partidoSZ3",$datosController["partido3Suiza"]);
		$stmt->bindParam(":codigo",$idEnviarCodigo);
		$stmt->execute();
	}
	public static function BuscandoCodigoUsuarioModel($datosModel){
		$stmt=Conexion::conectar()->prepare("SELECT * FROM codigoid,resultados,usuarios1 WHERE (nombre LIKE  '%".$datosModel."%' OR correo LIKE '%".$datosModel."%' OR  telefono LIKE '%".$datosModel."%' OR codigo LIKE '%".$datosModel."%') AND ID=IDElUsuario AND idCodigo=IDElCodigo");
		$stmt->execute();
		if($stmt->rowCount()==0){
			return 0;
		}else{
			return $stmt->fetchAll();
		}
	}
	public static function ObtenerListadodeCodigosCompletos($datosModel){
		$stmt=Conexion::conectar()->prepare("SELECT * FROM codigoid");
		$stmt->execute();
		return $stmt->rowCount();
	}
	public static function ObtenerListadodeCodigosActivados($datosModel){
		$stmt=Conexion::conectar()->prepare("SELECT * FROM codigoid WHERE Uso='1'");
		$stmt->execute();
		return $stmt->rowCount();
	}
	public static function JuegoActivo1Model($partido1,$partido2){
		$stmt=Conexion::conectar()->prepare("SELECT * FROM `resultados`,codigoid,usuarios1 WHERE IDElUsuario=ID AND IDElCodigo=idCodigo AND partido1CostaRica=:partido1CR AND partido1Serbia=:partido1SB");
 	$stmt->bindParam(":partido1CR",$partido1);
 	$stmt->bindParam(":partido1SB",$partido2);
 	$stmt->execute();
 	if($stmt->rowCount()==0){
 		return 0;
 	}else{
 		return $stmt->fetchAll();
 	}
 	
	}
	public static function JuegoActivo2Model($partido1,$partido2,$partido3,$partido4){
		$stmt=Conexion::conectar()->prepare("SELECT * FROM `resultados`,codigoid,usuarios1 WHERE IDElUsuario=ID AND IDElCodigo=idCodigo AND partido1CostaRica=:partido1CR AND partido1Serbia=:partido1SB AND partido2CostaRica=:partido2CR AND partido2Brasil=:partido2BR");
 	$stmt->bindParam(":partido1CR",$partido1);
 	$stmt->bindParam(":partido1SB",$partido2);
 	$stmt->bindParam(":partido2CR",$partido3);
 	$stmt->bindParam(":partido2BR",$partido4);
 	$stmt->execute();
 	if($stmt->rowCount()==0){
 		return 0;
 	}else{
 		return $stmt->fetchAll();
 	}
	}

	public static function JuegoActivo3Model($partido1,$partido2,$partido3,$partido4,$partido5,$partido6){
		$stmt=Conexion::conectar()->prepare("SELECT * FROM `resultados`,codigoid,usuarios1 WHERE IDElUsuario=ID AND IDElCodigo=idCodigo AND partido1CostaRica=:partido1CR AND partido1Serbia=:partido1SB AND partido2CostaRica=:partido2CR AND partido2Brasil=:partido2BR AND partido3CostaRica=:partidoCR3 AND partido3Suizas=:partido3SZ");
 	$stmt->bindParam(":partido1CR",$partido1);
 	$stmt->bindParam(":partido1SB",$partido2);
 	$stmt->bindParam(":partido2CR",$partido3);
 	$stmt->bindParam(":partido2BR",$partido4);
 	$stmt->bindParam(":partidoCR3",$partido5);
 	$stmt->bindParam(":partido3SZ",$partido6);
 	$stmt->execute();
 	if($stmt->rowCount()==0){
 		return 0;
 	}else{
 		return $stmt->fetchAll();
 	}
	}

	}

 ?>