<?php 
	class EnlacesController{
		public static function enlacesControllers(){
			if(isset($_GET["pagina"])){
				$enlaces = $_GET["pagina"];
			}else{
				$enlaces="inicio";
			}
			if($enlaces!="inicio"){
					$respuesta = EnlacModelsC::enlacesModels($enlaces);
			include $respuesta;
			}

			
			
			
		}

	}


 ?>