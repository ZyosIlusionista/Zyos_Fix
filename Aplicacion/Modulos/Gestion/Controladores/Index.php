<?php

	class Index extends Controlador {
		
		function __Construct() {
			parent::__Construct();
			if(PHP_SAPI == 'cli') { exit('La Aplicacion es Unicamente Accesible por un Navegador'); }
		}
		
		public function Index($Error = false) {

			$Validacion = new NeuralJQueryValidacionFormulario;
			$Validacion->Requerido('Usuario', 'Ingrese el Usuario Correspondiente');
			$Validacion->Requerido('Password', 'Ingrese la Contraseña Correspondiente');
			$Script[] = $Validacion->MostrarValidacion('Form');
			
			$Plantilla = new NeuralPlantillasTwig;
			if($Error == true AND AyudasConversorHexAscii::HEX_ASCII($Error) == 'NOAUTORIZADO') { $Plantilla->ParametrosEtiquetas('NoAutorizado', 'NOAUTORIZADO'); }
			if($Error == true AND AyudasConversorHexAscii::HEX_ASCII($Error) == 'DATOSVACIOS') { $Plantilla->ParametrosEtiquetas('DatosVacios', 'DATOSVACIOS'); }
			$Plantilla->ParametrosEtiquetas('Validacion', NeuralEncriptacion::EncriptarDatos(date("Y-m-d"), 'GESTION'));
			$Plantilla->ParametrosEtiquetas('Script', NeuralScriptAdministrador::OrganizarScript(false, $Script, 'GESTION'));
			echo $Plantilla->MostrarPlantilla('Login/more-login.html', 'GESTION');
		}
		
		public function Autenticacion() {
			
			if(isset($_POST) == true AND isset($_POST['Proceso']) == true) {
				if(NeuralEncriptacion::DesencriptarDatos($_POST['Proceso'], 'GESTION') == date("Y-m-d")) {
					if(AyudasPost::DatosVacios($_POST) == false) {
						$DatosPost = AyudasPost::FormatoEspacio(AyudasPost::LimpiarInyeccionSQL($_POST));
						$DatosPost['Password'] = sha1($DatosPost['Password']);
						$ConsultaUsuario = $this->Modelo->ConsultarUsuario($DatosPost['Usuario'], $DatosPost['Password']);
						if($ConsultaUsuario['Cantidad'] == 1) {
							$ConsultaPermisos = $this->Modelo->ConsultarPermisos($ConsultaUsuario[0]['Permisos']);
							if($ConsultaPermisos['Cantidad'] == 1) {
								AyudasSessiones::RegistrarSession($ConsultaUsuario[0], $ConsultaPermisos[0]);
								header("Location: ".NeuralRutasApp::RutaURL('Central'));
								exit();
							}
							else {
								header("Location: ".NeuralRutasApp::RutaURL('Index/Index/').AyudasConversorHexAscii::ASCII_HEX('DATOSINCORRECTOS'));
								exit();
							}
						}
						else {
							header("Location: ".NeuralRutasApp::RutaURL('Index/Index/').AyudasConversorHexAscii::ASCII_HEX('DATOSINCORRECTOS'));
							exit();
						}
					}
					else {
						header("Location: ".NeuralRutasApp::RutaURL('Index/Index/').AyudasConversorHexAscii::ASCII_HEX('DATOSVACIOS'));
						exit();
					}
				}
				else {
					header("Location: ".NeuralRutasApp::RutaURL('Index/Index/').AyudasConversorHexAscii::ASCII_HEX('NOAUTORIZADO'));
					exit();
				}
			}
			else {
				header("Location: ".NeuralRutasApp::RutaURL('Index'));
				exit();
			}
		}
	}