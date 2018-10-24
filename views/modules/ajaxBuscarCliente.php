<?php 
require_once "../../models/modelSolcitante.php";
require_once "../../models/modelCodigo.php";

require_once "../../controllers/controllerCodigo.php";
require_once "../../controllers/controllerSolicitante.php";

class Ajax{
	public $usuario;
	public $nombre;
	public $correo;
	public $codigo;
	public $telefono;
	public $partido1CostaRica;
	public $partido1Serbia;
	public $partido2CostaRica;
	public $partido2Brasil;
	public $partido3CostaRica;
	public $partido3Suiza;

	public function AjaxExisteUsuario(){
		$datos=$this->usuario;
		$respuesta= controllerCodigos::ExisteUsuario($datos);
		echo $respuesta;
	}
	public function AjaxBuscarUsuario(){
		$datos=$this->usuario;
		$respuesta=controllerSolicitante::BuscarUsuario($datos);
		echo $respuesta;
	}

	public function AjaxBuscandoCodigo(){
		$datos=$this->usuario;
		$respuesta=controllerSolicitante::BuscandoCodigo($datos);
		echo $respuesta;
	}
	public function AjaxActivandoCodigo(){
		$datos=$this->usuario;
		$respuesta=controllerSolicitante::ActivandoCodigo($datos);
		echo $respuesta;
	}
	public function CargarPronostico(){
		$datos=array("nombre"=>$this->nombre,
					 "correo"=>$this->correo,
					 "telefono"=>$this->telefono,
					 "codigo"=>$this->codigo,
					 "partido1CostaRica"=>$this->partido1CostaRica,
					 "partido1Serbia"=>$this->partido1Serbia,
					 "partido2CostaRica"=>$this->partido2CostaRica,
					 "partido2Brasil"=>$this->partido2Brasil,
					 "partido2CostaRica"=>$this->partido2CostaRica,
					 "partido3CostaRica"=>$this->partido3CostaRica,
					 "partido3Suiza"=>$this->partido3Suiza


		);

		$respuesta=controllerSolicitante::CargarPronosticoController($datos);
		echo $respuesta;

	}


 public function AjaxBuscandoCodigoUsuario(){
 	$datos=$this->usuario;
 	$respuesta=controllerSolicitante::BuscandoCodigoUsuarioController($datos);
 	echo $respuesta;
 }




 public function Filtro1Partido(){
 	$partidoCostaRica=$this->partido1CostaRica;
 	$partido1Serbia=$this->partido1Serbia;
 	$respuesta=controllerSolicitante::JuegoActivo1Controller($partidoCostaRica,$partido1Serbia);
 	echo $respuesta;
 }
 public function Filtro2Partido(){
 	$partidoCostaRica=$this->partido1CostaRica;
 	$partido1Serbia=$this->partido1Serbia;
 	$partido2CostaRica=$this->partido2CostaRica;
 	$partido2Brasil=$this->partido2Brasil;
 	$respuesta=controllerSolicitante::JuegoActivo2Controller($partidoCostaRica,$partido1Serbia,$partido2CostaRica,$partido2Brasil);
 	echo $respuesta;
 }
 public function Filtro3Partido(){
 	$partidoCostaRica=$this->partido1CostaRica;
 	$partido1Serbia=$this->partido1Serbia;
 	$partido2CostaRica=$this->partido2CostaRica;
 	$partido2Brasil=$this->partido2Brasil;
 	$partido3CostaRica=$this->partido3CostaRica;
 	$partido3Suiza=$this->partido3Suiza;


 	$respuesta=controllerSolicitante::JuegoActivo3Controller($partidoCostaRica,$partido1Serbia,$partido2CostaRica,$partido2Brasil,$partido3CostaRica,$partido3Suiza);
 	echo $respuesta;
 }
}

if(isset($_POST["ExisteCliente"])){
	$a = new Ajax();
	$a->usuario=$_POST["ExisteCliente"];
	$a->AjaxExisteUsuario();
	
}
if(isset($_POST["BuscarCliente"])){
	$b = new Ajax();
	$b->usuario=$_POST["BuscarCliente"];
	$b->AjaxBuscarUsuario();
}
if(isset($_POST["BuscandoCodigo"])){
	$c = new Ajax();
	$c->usuario=$_POST["BuscandoCodigo"];
	$c->AjaxBuscandoCodigo();
}
if(isset($_POST["ActivandoCodigo"])){
	if(empty($_POST["ActivandoCodigo"]) || $_POST["ActivandoCodigo"]==""){
		return 0;
	}else{
		$d = new Ajax();
	$d->usuario=$_POST["ActivandoCodigo"];
	$d->AjaxActivandoCodigo();
	}		
}
 if(isset($_POST["BuscandoCodigoUsuario"])){
 	$f =new Ajax();
 	$f->usuario=$_POST["BuscandoCodigoUsuario"];
 	$f->AjaxBuscandoCodigoUsuario();
 }

if (isset($_POST["nombre"])) {

		
	$e = new Ajax();
	$e->nombre=$_POST["nombre"];
	$e->correo=$_POST["correo"];
	$e->telefono=$_POST["telefono"];
	$e->codigo=$_POST["codigo"];
	$e->partido1CostaRica=$_POST["partido1CostaRica"];
	$e->partido1Serbia=$_POST["partido1Serbia"];
	$e->partido2CostaRica=$_POST["partido2CostaRica"];
	$e->partido2Brasil=$_POST["partido2Brasil"];
	$e->partido3CostaRica=$_POST["partido3CostaRica"];
	$e->partido3Suiza=$_POST["partido3Suiza"];
	$e->CargarPronostico();
	
}

if(isset($_POST["partido1CostaRicaA"]) && !isset($_POST["partido2BrasilA"])){
	$f = new Ajax();
	$f->partido1CostaRica=$_POST["partido1CostaRicaA"];
	$f->partido1Serbia=$_POST["partido1SerbiaA"];
	$f->Filtro1Partido();
}
if (isset($_POST["partido2BrasilA"]) && !isset($_POST["partido3CostaRicaA"])) {
	$g = new Ajax();
	$g->partido1CostaRica=$_POST["partido1CostaRicaA"];
	$g->partido1Serbia=$_POST["partido1SerbiaA"];
	$g->partido2CostaRica=$_POST["partido2CostaRicaA"];
	$g->partido2Brasil=$_POST["partido2BrasilA"];
	$g->Filtro2Partido();
}
if(isset($_POST["partido3CostaRicaA"])){
	$h = new Ajax();
	$h->partido1CostaRica=$_POST["partido1CostaRicaA"];
	$h->partido1Serbia=$_POST["partido1SerbiaA"];
	$h->partido2CostaRica=$_POST["partido2CostaRicaA"];
	$h->partido2Brasil=$_POST["partido2BrasilA"];
	$h->partido3CostaRica=$_POST["partido3CostaRicaA"];
	$h->partido3Suiza=$_POST["partido3SuizaA"];
	$h->Filtro3Partido();
}

// 	if(isset($_POST["codigo"])){
// 		echo $_POST["partido1CostaRica"];
// 		$_POST["nombre"];
// echo $_POST["correo"];
// echo $_POST["telefono"];
// echo $_POST["codigo"];
// echo $_POST["partido1CostaRica"];
// echo $_POST["partido1Serbia"];
// echo $_POST["partido2CostaRica"];
// echo $_POST["partido2Brasil"];
// echo $_POST["partido3CostaRica"];
// echo $_POST["partido3Suiza"];
// 	}
 

 ?>