<?php
	class AdminContenido extends Controlador {
		
		function __Construct() {
			parent::__Construct();
			AyudasSessiones::ValidarSession();
		}
		
		public function Index() {
			header("Location: ".NeuralRutasApp::RutaURL('AdminContenido/SintomaTelevision'));
		}
		
		public function SintomaTelevision() {
			
			$Validacion = new NeuralJQueryValidacionFormulario;
			$Validacion->Requerido('Sintoma', 'Debe Ingresar el Sintoma Correspondiente a Televisión');
			$Validacion->SubmitHandler(NeuralJQueryAjax::EnviarFormularioPOST('Form', 'CargarContenido', NeuralRutasApp::RutaURL('Ajax_AdminContenido/AgregarSintomaTelevision/'.AyudasConversorHexAscii::ASCII_HEX('TELEVISION').'/'.AyudasConversorHexAscii::ASCII_HEX('Sintomas Televisión')), true, 'GESTION'));
			$Script[] = $Validacion->MostrarValidacion('Form');
			
			$Plantilla = new NeuralPlantillasTwig;
			$Plantilla->ParametrosEtiquetas('InfoSession', AyudasSessiones::InformacionSessionControlador(true));
			$Plantilla->ParametrosEtiquetas('Titulo', 'Sintomas Televisión');
			$Plantilla->ParametrosEtiquetas('Consulta', $this->Modelo->ListarSintomasControlador('TELEVISION'));
			$Plantilla->ParametrosEtiquetas('Script', NeuralScriptAdministrador::OrganizarScript(false, $Script, 'GESTION'));
			echo $Plantilla->MostrarPlantilla('AdminContenido/SintomaTelevision.html', 'GESTION');
		}
	}