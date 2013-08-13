<?php
	class Ajax_AdminUsuarios extends Controlador {
		
		function __Construct() {
			parent::__Construct();
			if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {}
			else { header("Location: ".NeuralRutasApp::RutaURL('Central')); exit(); }
			AyudasSessiones::ValidarSession();
		}
		
		public function Index() {
			exit("Asignacion Erronea");
		}
		
		public function GestionNuevoUsuario($Validacion = false) {
			if(NeuralEncriptacion::DesencriptarDatos(AyudasConversorHexAscii::HEX_ASCII($Validacion), array(date("Y-m-d"), 'GESTION')) == date("Y-m-d")) {
				$DatosPost = AyudasPost::FormatoEspacio(AyudasPost::LimpiarInyeccionSQL($_POST));
				if(AyudasPost::DatosVacios($DatosPost) == false AND NeuralEncriptacion::DesencriptarDatos(AyudasConversorHexAscii::HEX_ASCII($DatosPost['Data']), 'GESTION') == date("Y-m-d")) {
					unset($_POST, $DatosPost['Data']);
					$DatosPost['Permisos'] = NeuralEncriptacion::DesencriptarDatos(AyudasConversorHexAscii::HEX_ASCII($DatosPost['Permisos']), 'GESTION');
					if($this->Modelo->ConsultarExistenciaUsuario($DatosPost['Usuario']) >= 1) {
						echo '<h4 style="color: red;">El Usuario Ya Existe En La Base De Datos</h4>';
						exit();
					}
					else {
						$this->Modelo->GuardarNuevoUsuario(AyudasPost::ConvertirTextoUcwords($DatosPost));
						$Plantilla = new NeuralPlantillasTwig;
						echo $Plantilla->MostrarPlantilla('AdminUsuarios/UsuarioAgregado.html', 'GESTION');
					}
				}
				else {
					exit("Asignacion Erronea");
				}
			}
		}
		
		public function ConsultarExistenciaUsuario() {
			$DatosPost = AyudasPost::FormatoEspacio(AyudasPost::LimpiarInyeccionSQL($_POST));
			if($this->Modelo->ConsultarExistenciaUsuario($DatosPost['Usuario']) >= 1) {
				echo 'false';
			}
			else {
				echo 'true';
			}
		}
		
		public function ProcesarUsuariosLoteExcel($Validacion = false) {
			if(NeuralEncriptacion::DesencriptarDatos(AyudasConversorHexAscii::HEX_ASCII($Validacion), array(date("Y-m-d"), 'GESTION')) == date("Y-m-d")) {
				if(AyudasPost::DatosVacios($_POST) == false) {
					$DatosPost = AyudasPost::FormatoEspacio(AyudasPost::ConvertirTextoUcwordsOmitido(AyudasPost::LimpiarInyeccionSQL($_POST), array('Usuario')));
					$Excel = AyudasCopyPasteExcelArray::ConvertirExcelArrayColumnas($DatosPost['Excel'], array('Usuario', 'Nombres', 'Apellidos', 'Cedula', 'Cargo', 'Permisos'));
					
					$Plantilla = new NeuralPlantillasTwig;
					$Plantilla->ParametrosEtiquetas('Excel', $Excel);
					$Plantilla->AgregarFuncion('MultiValidacion', function ($Columna, $Valor) {
						
					});
					echo $Plantilla->MostrarPlantilla('Ajax/AdminUsuarios/TablaUsuariosExcel.html', 'GESTION');
				}
				else {
					echo '<h3 style="color: red;">El Formulario Presenta Datos Vacios</h3>';
				}
			}
		}
		
		private function FunctionTwig_1($Columna = false, $Valor = false) {
			if($Columna == true AND $Valor == true) {
				if(empty($Valor) == false) {
					if($Columna == '') {
						
					}
				}
				else {
					return '<td style="background: red; color: white; font-weight: bold">No Hay Datos</td>';
				}
			}
		}
	}