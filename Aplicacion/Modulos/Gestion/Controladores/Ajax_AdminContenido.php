<?php
	class Ajax_AdminContenido extends Controlador {
		
		function __Construct() {
			parent::__Construct();
			if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {}
			else { header("Location: ".NeuralRutasApp::RutaURL('Central')); exit(); }
			AyudasSessiones::ValidarSession();
		}
		
		public function Index() {
			exit("Asignacion Erronea");
		}
		
		public function CargarListadoSintoma($TipoSintoma = false, $Titulo = false) {
			if($TipoSintoma == true AND $Titulo == true) {
				
				$Plantilla = new NeuralPlantillasTwig;
				$Plantilla->ParametrosEtiquetas('Titulo', AyudasConversorHexAscii::HEX_ASCII($Titulo));
				$Plantilla->ParametrosEtiquetas('Consulta', $this->Modelo->CargarListadoSintoma(AyudasConversorHexAscii::HEX_ASCII($TipoSintoma)));
				echo $Plantilla->MostrarPlantilla('Ajax/AdminContenido/TablaListadoSintomas.html', 'GESTION');
			}
		}
		
		public function AgregarSintomaTelevision($TipoSintoma = false, $Titulo = false) {
			if($TipoSintoma == true AND $Titulo == true AND isset($_POST['Sintoma'])) {
				if(AyudasPost::DatosVacios($_POST) == false) {
					$DatosPost = AyudasPost::FormatoEspacio(AyudasPost::FormatoMayus(AyudasPost::LimpiarInyeccionSQL($_POST)));
					$InfoSession = AyudasSessiones::InformacionSessionControlador(true);
					$this->Modelo->AgregarSintoma($DatosPost['Sintoma'], $InfoSession['Usuario'], 'TELEVISION');
					self::CargarListadoSintoma($TipoSintoma, $Titulo);
				}
			}
		}
	}