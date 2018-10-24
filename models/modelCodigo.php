<?php 
require_once 'conexion.php';
	class modelCodigos{
		public static function comprobarCodigoModel($datosModel,$tabla){
			$stmt = $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE  codigo=:codigo");
			$stmt->bindParam(":codigo", $datosModel);
			$stmt->execute();
			if($stmt->rowCount()==0){
				return 0;
			}else{
				return 1;
			}
		}
		public static function  ingresarCodigoModel($idusuario,$codigo,$tabla){
			$stmt= Conexion::conectar()->prepare("INSERT INTO $tabla (codigo,idUsuario) VALUES(:codigo, :idUsuario)");
			$stmt->bindParam(":codigo",$codigo);
			$stmt->bindParam(":idUsuario",$idusuario);
			$stmt->execute();
		}
		public static function ingresoSolicitante($datosModel,$tabla){
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,correo,telefono,tipoUsuario) VALUES (:nombre,:correo,:telefono,'2')");
			$stmt->bindParam(":nombre",$datosModel["nombre"]);
			$stmt->bindParam(":correo",$datosModel["email"]);
			$stmt->bindParam(":telefono",$datosModel["telefono"]);
			$stmt->execute();
			

		}
		public static function consultarSolicitante($datosModel,$tabla){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE   correo=:correo AND telefono=:telefono");
			$stmt->bindParam(":correo",$datosModel["email"]);
			$stmt->bindParam(":telefono",$datosModel["telefono"]);
			$stmt->execute();
			return $stmt->fetchAll();

		}

		public static function ExisteUsuarioModel($datosModel, $tabla){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nombre LIKE  '%".$datosModel."%' ");
			if($stmt->execute()){
				return $stmt->fetchAll();
			}else{
				return 0;
			}
		}
	}


 ?>