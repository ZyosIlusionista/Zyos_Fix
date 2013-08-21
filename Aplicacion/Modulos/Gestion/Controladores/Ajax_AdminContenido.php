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
		
		public function CargarListadoSintomas() {
			if(AyudasPost::DatosVacios($_POST) == false) {
				$DatosPost = AyudasPost::FormatoEspacio(AyudasPost::FormatoMayus(AyudasPost::LimpiarInyeccionSQL($_POST)));
				$Matriz = array(
					'TELEVISION' => 'Sintoma de Televisión', 
					'INTERNET' =>  'Sintoma de Internet',
					'TELEFONIA' => 'Sintoma de Telefonia',
					'MICLARO' => 'Sintoma de Mi Claro',
					'MASIVOS' => 'Sintoma de Reportes Masivos',
					'LLS' => 'Sintoma de Llamadas de Servicio',
					'IIMS' => 'Sintoma de Pasos IIMS'
				);
				
				$Plantilla = new NeuralPlantillasTwig;
				$Plantilla->ParametrosEtiquetas('Consulta', $this->Modelo->CargarListadoSintomas($DatosPost['Proceso']));
				$Plantilla->ParametrosEtiquetas('Fecha', AyudasConversorHexAscii::ASCII_HEX(NeuralEncriptacion::EncriptarDatos(date("Y-m-d"), array(date("Y-m-d"), 'GESTION'))));
				$Plantilla->ParametrosEtiquetas('Proceso', $Matriz[$DatosPost['Proceso']]);
				echo $Plantilla->MostrarPlantilla('Ajax/AdminContenido/ListadoSintomas.html', 'GESTION');
			}
		}
		
		public function AgregarSintomaTelevision($Validacion = false) {
			if($Validacion == true AND AyudasConversorHexAscii::HEX_ASCII($Validacion) == date("Y-m-d")) {
				if(AyudasPost::DatosVacios($_POST) == false) {
					$DatosPost = AyudasPost::FormatoEspacio(AyudasPost::FormatoMayus(AyudasPost::LimpiarInyeccionSQL($_POST)));
					$this->Modelo->AgregarSintomaBase($DatosPost['Sintoma'], 'TELEVISION');
				}
			}
		}
		
		public function AgregarSintomaInternet($Validacion = false) {
			if($Validacion == true AND AyudasConversorHexAscii::HEX_ASCII($Validacion) == date("Y-m-d")) {
				if(AyudasPost::DatosVacios($_POST) == false) {
					$DatosPost = AyudasPost::FormatoEspacio(AyudasPost::FormatoMayus(AyudasPost::LimpiarInyeccionSQL($_POST)));
					$this->Modelo->AgregarSintomaBase($DatosPost['Sintoma'], 'INTERNET');
				}
			}
		}
		
		public function AgregarSintomaTelefonia($Validacion = false) {
			if($Validacion == true AND AyudasConversorHexAscii::HEX_ASCII($Validacion) == date("Y-m-d")) {
				if(AyudasPost::DatosVacios($_POST) == false) {
					$DatosPost = AyudasPost::FormatoEspacio(AyudasPost::FormatoMayus(AyudasPost::LimpiarInyeccionSQL($_POST)));
					$this->Modelo->AgregarSintomaBase($DatosPost['Sintoma'], 'TELEFONIA');
				}
			}
		}
		
		public function AgregarSintomaMiClaro($Validacion = false) {
			if($Validacion == true AND AyudasConversorHexAscii::HEX_ASCII($Validacion) == date("Y-m-d")) {
				if(AyudasPost::DatosVacios($_POST) == false) {
					$DatosPost = AyudasPost::FormatoEspacio(AyudasPost::FormatoMayus(AyudasPost::LimpiarInyeccionSQL($_POST)));
					$this->Modelo->AgregarSintomaBase($DatosPost['Sintoma'], 'MICLARO');
				}
			}
		}
		
		public function AgregarSintomaMasivos($Validacion = false) {
			if($Validacion == true AND AyudasConversorHexAscii::HEX_ASCII($Validacion) == date("Y-m-d")) {
				if(AyudasPost::DatosVacios($_POST) == false) {
					$DatosPost = AyudasPost::FormatoEspacio(AyudasPost::FormatoMayus(AyudasPost::LimpiarInyeccionSQL($_POST)));
					$this->Modelo->AgregarSintomaBase($DatosPost['Sintoma'], 'MASIVOS');
				}
			}
		}
		
		public function AgregarSintomaLLS($Validacion = false) {
			if($Validacion == true AND AyudasConversorHexAscii::HEX_ASCII($Validacion) == date("Y-m-d")) {
				if(AyudasPost::DatosVacios($_POST) == false) {
					$DatosPost = AyudasPost::FormatoEspacio(AyudasPost::FormatoMayus(AyudasPost::LimpiarInyeccionSQL($_POST)));
					$this->Modelo->AgregarSintomaBase($DatosPost['Sintoma'], 'LLS');
				}
			}
		}
		
		public function AgregarSintomaIIMS($Validacion = false) {
			if($Validacion == true AND AyudasConversorHexAscii::HEX_ASCII($Validacion) == date("Y-m-d")) {
				if(AyudasPost::DatosVacios($_POST) == false) {
					$DatosPost = AyudasPost::FormatoEspacio(AyudasPost::FormatoMayus(AyudasPost::LimpiarInyeccionSQL($_POST)));
					$this->Modelo->AgregarSintomaBase($DatosPost['Sintoma'], 'IIMS');
				}
			}
		}
		
		public function EliminarSintoma($Validacion = false) {
			if($Validacion == true AND NeuralEncriptacion::DesencriptarDatos(AyudasConversorHexAscii::HEX_ASCII($Validacion), array(date("Y-m-d"), 'GESTION')) == date("Y-m-d")) {
				if(AyudasPost::DatosVacios($_POST) == false) {
					$DatosPost = AyudasPost::FormatoEspacio(AyudasPost::LimpiarInyeccionSQL($_POST));
					$this->Modelo->EliminarSintoma($DatosPost['Id']);
				}
			}
		}
		
		public function ActualizarSintoma($Validacion = false) {
			if($Validacion == true AND NeuralEncriptacion::DesencriptarDatos(AyudasConversorHexAscii::HEX_ASCII($Validacion), array(date("Y-m-d"), 'GESTION')) == date("Y-m-d")) {
				if(AyudasPost::DatosVacios($_POST) == false) {
					$DatosPost = AyudasPost::FormatoEspacio(AyudasPost::FormatoMayus(AyudasPost::LimpiarInyeccionSQL($_POST)));
					$this->Modelo->ActualizarSintoma($DatosPost['Id'], $DatosPost['Sintoma']);
				}
			}
		}
	}