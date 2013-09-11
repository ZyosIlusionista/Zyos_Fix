<?php
	class Descargas extends Controlador {
		
		function __Construct() {
			parent::__Construct();
			AyudasSessiones::ValidarSession();
		}
		
		public function Index() {
		
			header("Location: ".NeuralRutasApp::RutaURL('Descargas/Diaria'));
			exit();
		}
		
		public function Diaria() {
			
			$Plantilla = new NeuralPlantillasTwig;
			$Plantilla->ParametrosEtiquetas('InfoSession', AyudasSessiones::InformacionSessionControlador(true));
			$Plantilla->ParametrosEtiquetas('Titulo', 'Descarga Diaria');
			$Plantilla->ParametrosEtiquetas('Fecha', AyudasConversorHexAscii::ASCII_HEX(date("Y-m-d")));
			echo $Plantilla->MostrarPlantilla('Descargas/Diaria.html', 'GESTION');
		}
		
		public function ProcesarDiaria($Validacion = false) {
			if($Validacion == true AND AyudasConversorHexAscii::HEX_ASCII($Validacion) == date("Y-m-d")) {
				Ayudas::print_r($_POST);
				if(AyudasPost::DatosVacios($_POST) == false) {
					$DatosPost = AyudasPost::FormatoEspacio(AyudasPost::LimpiarInyeccionSQL($_POST));
					$Consulta = $this->Modelo->Diario($DatosPost['Fecha']);
					Ayudas::print_r($Consulta);
				}
				else {
					echo 'Hay Datos Vacios Validar la Informacion';
				}
			}
		}
	}