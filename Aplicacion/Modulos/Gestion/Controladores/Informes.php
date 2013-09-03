<?php
	class Informes extends Controlador {
		
		function __Construct() {
			parent::__Construct();
			AyudasSessiones::ValidarSession();
		}
		
		public function Index() {
			
		}
		
		public function Dia() {
			
			$Plantilla = new NeuralPlantillasTwig;
			$Plantilla->ParametrosEtiquetas('InfoSession', AyudasSessiones::InformacionSessionControlador(true));
			$Plantilla->ParametrosEtiquetas('Titulo', 'Informe del Dia');
			$Plantilla->ParametrosEtiquetas('Fecha', AyudasConversorHexAscii::ASCII_HEX(date("Y-m-d")));
			echo $Plantilla->MostrarPlantilla('Informes/Dia.html', 'GESTION');
		}
		
	}