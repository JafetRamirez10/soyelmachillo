<?php 
require "models/modelUsuarios.php";
require "controllers/controllerUsuarios.php";
$admin =  new  controllerUsuarios();
$admin->ingresoAdminController();
 ?>