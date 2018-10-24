<div class="container">
	<div class="NoEncontrado"></div>
	<label style="color:white" class="ocultoImpresion">Buscar en datos:</label>
	<div class="input-group ocultoImpresion">
	<span class="input-group-addon">Buscar</span>
	<input type="text" name="buscar" id="buscarCliente" class="col-xs-12 center-block form-control" placeholder="Buscar por nombre, teléfono o e-mail">
	
</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#BuscarCodigoCliente">Buscar por código</button>
</div>
<?php 

require "models/modelSolcitante.php";
require "controllers/controllerSolicitante.php";

$perfil= new controllerSolicitante();
$perfil->seleccionarSolicitante();
$perfil->editarPerfilController();
$perfil-> eliminarPerfilController();
$perfil->eliminarCodigoUsuario();
echo "<div class='tablaBusqueda'></div>";

 ?>