<?php  
	class EnlacModelsC{
		public static function enlacesModels($enlaces){
			if($enlaces == "perfiles"         ||
				$enlaces == "resultado"      ||
				$enlaces == "cerrar"){
			
				$module = "views/modules/".$enlaces.".php";				
			}else{
				$module = "inicio.php";
			}
			 return $module;
		}
	
}