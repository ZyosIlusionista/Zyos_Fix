<?php
	class Central extends Controlador {
		
		function __Construct() {
			parent::__Construct();
			AyudasSessiones::ValidarSession();
		}
		
		public function Index() {
			
			$Plantilla = new NeuralPlantillasTwig;
			$Plantilla->ParametrosEtiquetas('InfoSession', AyudasSessiones::InformacionSessionControlador(true));
			$Plantilla->ParametrosEtiquetas('Titulo', 'Página Central');
			echo $Plantilla->MostrarPlantilla('Central/Index.html', 'GESTION');
		}
	}