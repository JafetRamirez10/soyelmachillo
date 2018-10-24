<?php 
class controllerSolicitante{
	public static function seleccionarSolicitante(){
		$respuesta=modelSolicitante::mostrarSolicitante();
		echo '<div class="col-xs-12 center-block mt-4 tablaOriginal">
 					<table  id="tabla1" class="table table-sm" >
 						<thead>
 							<tr class="table-active">
 								<th class="acciones">Acciones</th>
 								<th>Nombre</th>
 								<th>Teléfono</th>
 								<th>Email</th>
 								<th class="idUsuario" id="idUsuario" style="display:none;">ID</th>
 								<th>Perfil</th>
 							</tr>
 						</thead>
 						<tbody>';
 						foreach ($respuesta as $row => $item) {
 							echo '<tr  id="'.$item["ID"].'" class="info">
 						<td class="acciones" ><button class="btn btn-primary btn-xs buttonEditCodigo" data-title="Edit" data-toggle="modal" data-target="#EditarUsuario" id="'.$item["ID"].'"><span class="fas fa-edit"></span></button>
 							<!--<button class="btn btn-primary btn-xs CantidadCodigo"  id="'.$item["ID"].'" data-toggle="modal" data-target="#BuscarCodigoCliente"'.$item["ID"].'" ><span class="fas fa-barcode"></span></button>-->
 							<button class="btn btn-danger btn-xs ButtonTrashCodigo"   id="'.$item["ID"].'"><span class="fas fa-trash-alt"></span></button>
 						</td>
 						<td class="nombreEditar" >'.$item["nombre"].'</td>
 						<td class="correoEditar">'.$item["correo"].'</td>
 						<td class="telefonoEditar">'.$item["telefono"].'</td>
 						<td  class="IDEditar" style="display:none;">'.$item["ID"].'</td>';
 						if($item["tipoUsuario"]=='2'){
 							echo '<td>Solicitante</td>';	
 						}else{
 							echo '<td>Usuario</td>';
 						}

 						;
 						}
 						echo '			</tbody>
 						</table><script src="js/jquery.min.js"></script>
 					</div><script src="js/scripts.js"></script>
 					';
	}
	public static function editarPerfilController(){
		if(isset($_POST["EditarenviarUsuario"])){
			$datosController=array("nombre"=>$_POST["nombreCodigoEditar"],
									"correo"=>$_POST["emailCodigoEditar"],
									"telefono"=>$_POST["telefonoCodigoEditar"],
									"id"=>$_POST["idUsuarioEditar"]);
			$respuesta=modelSolicitante::editarPerfilModel($datosController,"usuarios");
			if($respuesta==0){
				echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2'></script>
				<script>swal({
  title:'Excelente!',
  text:'Se modifico correctamente',
  type:'success'
}).then((result) => {
	location.href='inicio.php?pagina=perfiles';}
)</script>";
			}
		}
	}

public static function eliminarPerfilController(){
	if(isset($_GET["eliminar"])){
		$datosController=$_GET["eliminar"];
		$respuesta=modelSolicitante::eliminarPerfilModel($datosController,"usuarios");
		if($respuesta==0){
			echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2'></script>
				<script>swal({
  title:'Se elimino perfil!',
  text:'',
  type:'success'
}).then((result) => {
	location.href='inicio.php?pagina=perfiles';}
)</script>";
		}
	}
}
public static function BuscarUsuario($datosController){
$respuesta=modelSolicitante::BuscarUsuarioModel($datosController,"usuarios");
if($respuesta==0){
	return 0;
}else{
echo '<div class="col-xs-12 center-block mt-4">
 					<table  id="tabla1" class="table table-sm" >
 						<thead>
 							<tr class="table-active">
 								<th class="acciones">Acciones</th>
 								<th>Nombre</th>
 								<th>Teléfono</th>
 								<th>Email</th>
 								<th class="idUsuario" id="idUsuario" style="display:none;">ID</th>
 								<th>Perfil</th>
 							</tr>
 						</thead>
 						<tbody>';
 						foreach ($respuesta as $row => $item) {
 							echo '<tr  id="'.$item["ID"].'" class="info">
 						<td class="acciones" ><button class="btn btn-primary btn-xs buttonEditCodigo" data-title="Edit" data-toggle="modal" data-target="#EditarUsuario" id="'.$item["ID"].'"><span class="fas fa-edit"></span></button>
 							<!--<button class="btn btn-primary btn-xs CantidadCodigo" data-toggle="modal" data-target="#BuscarCodigoCliente"  id="'.$item["correo"].'" data-target="#Micodigo'.$item["ID"].'" ><span class="fas fa-barcode"></span></button>-->
 							<button class="btn btn-danger btn-xs ButtonTrashCodigo"   id="'.$item["ID"].'"><span class="fas fa-trash-alt"></span></button>
 						</td>
 						<td class="nombreEditar" >'.$item["nombre"].'</td>
 						<td class="telefonoEditar">'.$item["telefono"].'</td>
 						<td class="correoEditar">'.$item["correo"].'</td>
 						<td  class="IDEditar" style="display:none;">'.$item["ID"].'</td>';
 						if($item["tipoUsuario"]=='2'){
 							echo '<td>Solicitante</td>';	
 						}else{
 							echo '<td>Usuario</td>';
 						}

 						;
 						}
 						echo '			</tbody>
 						</table>
 					</div> <script src="js/jquery.min.js"></script>
 					<script src="js/scripts.js"></script>

 					';


}
}

public static function BuscandoCodigo($datosController){
	$respuesta=modelSolicitante::BuscandoCodigoModel($datosController);
	if($respuesta==0){
		return $respuesta;
	}else{
		echo '<div class="col-xs-12 center-block mt-4">
 					<table  id="tabla1" class="table table-sm" >
 						<thead>
 							<tr class="table-active">
 								<th class="acciones">Acciones</th>
 								<th>Nombre</th>
 								<th>Codigo</th>
 								<th class="idUsuarioEliminar" id="idUsuario" style="display:none;">ID</th>
 							</tr>
 						</thead>
 						<tbody>';
 		foreach ($respuesta as $row => $item) {
 			echo '<tr  id="'.$item["ID"].'" class="info">
 			<td><button class="btn btn-danger btn-xs ButtonTrashCodigoEliminar"   id="'.$item["ID"].'" eliminar="'.$item["codigo"].'"><span class="fas fa-trash-alt"></span></button></td>
 				<td class="nombreCodigoEliminar" >'.$item["nombre"].'</td>
 						<td class="correoCodigoEliminar">'.$item["codigo"].'</td>
 						<td  class="IDCodigoEliminar" style="display:none;">'.$item["ID"].'</td>';
 			
 		}
 			echo '			</tbody>
 						</table>
 					</div> <script src="js/jquery.min.js"></script>
 					<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
 					<script src="js/scripts.js"></script>
 					';
	}
}
public static function eliminarCodigoUsuario(){
	if(isset($_GET["eliminarCodigo"])){
		$datosController=array("id"=>$_GET["eliminarCodigo"],
								"codigo"=>$_GET["Codigo"]);
		$respuesta=modelSolicitante::eliminarCodigoUsuarioModel($datosController,"codigoid");
		if($respuesta==0){
				echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2'></script>
				<script>swal({
  title:'¡Se elimino codigo!',
  text:'',
  type:'success'
}).then((result) => {
	location.href='inicio.php?pagina=perfiles';}
)</script>";
		}
	}
}
public static function ActivandoCodigo($datosController){
$respuesta=modelSolicitante::ActivandoCodigoModel($datosController,"codigoid");
if($respuesta==0){
	return 0;
}else{
	return 1;
}
}
public static function CargarPronosticoController($datosController){
	$ComprobarExiste=modelSolicitante::ActivandoCodigoModel($datosController["codigo"],"codigoid");
	$ComprobarExisteUsuario=modelSolicitante:: BuscandoUsuarioModel($datosController, "usuarios");
	if($ComprobarExiste==0){
		return 0;
	}else{
		$ComprobarExiste=modelSolicitante::EncenderCodigoModel($datosController["codigo"],"codigoid");
		$idCodigo=modelSolicitante::EncontrarCodigoID($datosController["codigo"],"codigoid");
		if($ComprobarExisteUsuario==0){
			$anadirUsuario=modelSolicitante::AgregarUsuarioModel($datosController, "usuarios");
		}
		$buscarUsuario=modelSolicitante::BuscarUsuarioModelActivar($datosController,"usuarios");
		foreach ($buscarUsuario as $row => $item) {
		$idEnviarUsuario=$item["ID"];
		}
		foreach ($idCodigo as $row => $item) {
			$idEnviarCodigo=$item["idCodigo"];	

			}
		// $editarCodigo=modelSolicitante::EditarCodigoActivo($datosController["codigo"],$idEnviarUsuario,"codigoid");
		$anadirResultados=modelSolicitante::anadirResultadosModel($datosController,$idEnviarUsuario,$idEnviarCodigo,"resultados");																									

	}
}

public static function BuscandoCodigoUsuarioController($datosController){
	$respuesta=modelSolicitante::BuscandoCodigoUsuarioModel($datosController);
	if($respuesta==0){
		return $respuesta;
	}else{
		echo '<div class="col-xs-12 center-block mt-4">
 					<table  id="tabla1" class="table table-sm" >
 						<thead>
 							<tr class="table-active">
 								<th class="acciones">Acciones</th>
 								<th>Nombre</th>
 								<th>Codigo</th>
 								<th class="idUsuarioEliminar" id="idUsuario" style="display:none;">ID</th>
 							</tr>
 						</thead>
 						<tbody>';
 		foreach ($respuesta as $row => $item) {
 			echo '<tr  id="'.$item["ID"].'" class="info">
 			<td><button class="btn btn-danger btn-xs ButtonTrashCodigoEliminar"   id="'.$item["ID"].'" eliminar="'.$item["codigo"].'"><span class="fas fa-trash-alt"></span></button></td>
 				<td class="nombreCodigoEliminar" >'.$item["nombre"].'</td>
 						<td class="correoCodigoEliminar">'.$item["codigo"].'</td>
 						<td  class="IDCodigoEliminar" style="display:none;">'.$item["ID"].'</td>';
 			
 		}
 			echo '			</tbody>
 						</table>
 					</div> <script src="js/jquery.min.js"></script>
 					<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
 					<script src="js/scripts.js"></script>
 					';
	}
}
public static function ObtenerListadodeCodigosCompletos(){
	$respuesta=modelSolicitante::ObtenerListadodeCodigosCompletos("codigoid");
	$activados=modelSolicitante::ObtenerListadodeCodigosActivados("codigoid");
	echo '<div class="activarCodigo1 container" id="paso4" style="display: none" >
		
	<h1 class="text-center pt-2 pb-2 texto"  style="width:100%;background-color: #202E57">Filtro:</h1>
	<p>Total de codigos generados:'.$respuesta.'</p>
	<p>Total de codigos activados :'.$activados.'</p>
	<div class="row row-sm-offset ">
	
		<div class="col-md-4 multi-horizontal mt-4" data-for="name" style="border:1px  solid black">
			<div class="form-group">
				<label class="form-control-label mbr-fonts-style display-7" for="name-form1-4t">Partido #1:</label>
				<div class="row ">
					<div class="col-6 col-md-5">
						<img src="images/costa-rica.png" class="img-fluid">
						<input type="number" name="partido1CostaRica" min="0"  id="partido1CostaRicaA" required  class="col-12 col-md-offset-2">
					</div>
					<div class="col-1">VS</div>
						<div class="col-6 col-md-5">
						<img src="images/serbia.png" class="img-fluid">
						<input type="number" name="partido1Serbia" min="0"   id="partido1SerbiaA" required class="col-12 col-md-offset-2">
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
						<input type="number" name="partido2CostaRica" min="0"  id="partido2CostaRicaA"  class="col-12 col-md-offset-2">
					</div>
					<div class="col-1">VS</div>
						<div class="col-6 col-md-5">
						<img src="images/brasil.png" class="img-fluid">
						<input type="number" name="partido2Brasil" min="0" id="partido2BrasilA"   class="col-12 col-md-offset-2">
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
						<input type="number" name="partido3CostaRica" min="0" id="partido3CostaRicaA"  class="col-12 col-md-offset-2">
					</div>
					<div class="col-1">VS</div>
						<div class="col-6 col-md-5">
						<img src="images/suiza.png" class="img-fluid">
						<input type="number" name="partido3Suiza" min="0"  id="partido3SuizaA" r class="col-12 col-md-offset-2">
					</div>
					
				</div>
			</div>

			
		</div>

<div class="col-12 center-block mb-4 mt-4">
	<button type="submit" name="ActivandoCodigoEnviar" class="btn btn-lg enviarDatosUsuario1 texto center-block comparar ">Enviar</button>
	 <div class="col-12 ResultadoCodigosPartidos">
 </div>

</div>
</div>
</div>
<div class="row ">
</div>
<div class="resultadodelFiltro"></div>
 <script src="js/jquery.min.js"></script>
<script src="js/filtro.js"></script>';

}
 public static function JuegoActivo1Controller($partido1,$partido2){
 	$respuesta=modelSolicitante::JuegoActivo1Model($partido1,$partido2);
 	$respuesta;
 	$valor=0;
 	if($respuesta==0){
 		return 0;
 	}else{
 	echo '<div class="col-xs-12 center-block mt-4">
 					<p class="encontradoS"></p>
 					<table  id="tabla1" class="table table-sm" >
 						<thead>
 							<tr class="table-active">
 								<th>Nombre</th>
 								<th>Teléfono</th>
 								<th>Correo</th>
 								<th>Codigo</th>
 								<th class="idUsuarioEliminar" id="idUsuario" style="display:none;">ID</th>
 							</tr>
 						</thead>
 						<tbody>';
 	foreach ($respuesta as $row => $item) {
 			$valor=$valor+1;
 			echo '<tr  id="'.$item["ID"].'" class="info">
 				<td class="nombreCodigoEliminar" >'.$item["nombre"].'</td>
 				<td>'.$item["telefono"].'</td>
 				<td>'.$item["correo"].'</td>
 						<td class="correoCodigoEliminar">'.$item["codigo"].'</td>
 						<td  class="IDCodigoEliminar" style="display:none;">'.$item["ID"].'</td>';


 	}
 	echo '			</tbody>
 						</table></div><div class="valorTotal" style="display:none;" id="'.$valor.'">'.$valor.'</div>
 						<script src="js/jquery.min.js"></script>
					   <script src="js/filtro.js"></script>';

 }
}
 public static function JuegoActivo2Controller($partido1,$partido2,$partido3,$partido4){
 	$respuesta=modelSolicitante::JuegoActivo2Model($partido1,$partido2,$partido3,$partido4);
 	$respuesta;
 	$valor=0;
 	if($respuesta==0){
 		return 0;
 	}else{
 	echo '<div class="col-xs-12 center-block mt-4">
 					<p class="encontradoS"></p>
 					<table  id="tabla1" class="table table-sm" >
 						<thead>
 							<tr class="table-active">
 								<th>Nombre</th>
 								<th>Teléfono</th>
 								<th>Correo</th>
 								<th>Codigo</th>
 								<th class="idUsuarioEliminar" id="idUsuario" style="display:none;">ID</th>
 							</tr>
 						</thead>
 						<tbody>';
 	foreach ($respuesta as $row => $item) {
 			$valor=$valor+1;
 			echo '<tr  id="'.$item["ID"].'" class="info">
 				<td class="nombreCodigoEliminar" >'.$item["nombre"].'</td>
 				<td>'.$item["telefono"].'</td>
 				<td>'.$item["correo"].'</td>
 						<td class="correoCodigoEliminar">'.$item["codigo"].'</td>
 						<td  class="IDCodigoEliminar" style="display:none;">'.$item["ID"].'</td>';


 	}
 	echo '			</tbody>
 						</table></div><div class="valorTotal" style="display:none;" id="'.$valor.'">'.$valor.'</div>';

 }
}
public static function JuegoActivo3Controller($partido1,$partido2,$partido3,$partido4,$partido5,$partido6){
 	$respuesta=modelSolicitante::JuegoActivo3Model($partido1,$partido2,$partido3,$partido4,$partido5,$partido6);
 	$respuesta;
 	$valor=0;
 	if($respuesta==0){
 		return 0;
 	}else{
 	echo '<div class="col-xs-12 center-block mt-4">
 					<p class="encontradoS"></p>
 					<table  id="tabla1" class="table table-sm" >
 						<thead>
 							<tr class="table-active">
 								<th>Nombre</th>
 								<th>Teléfono</th>
 								<th>Correo</th>
 								<th>Codigo</th>
 								<th class="idUsuarioEliminar" id="idUsuario" style="display:none;">ID</th>
 							</tr>
 						</thead>
 						<tbody>';
 	foreach ($respuesta as $row => $item) {
 			$valor=$valor+1;
 			echo '<tr  id="'.$item["ID"].'" class="info">
 				<td class="nombreCodigoEliminar" >'.$item["nombre"].'</td>
 				<td>'.$item["telefono"].'</td>
 				<td>'.$item["correo"].'</td>
 						<td class="correoCodigoEliminar">'.$item["codigo"].'</td>
 						<td  class="IDCodigoEliminar" style="display:none;">'.$item["ID"].'</td>';


 	}
 	echo '			</tbody>
 						</table></div><div class="valorTotal" style="display:none;" id="'.$valor.'">'.$valor.'</div>';

 }
}
}
 ?>