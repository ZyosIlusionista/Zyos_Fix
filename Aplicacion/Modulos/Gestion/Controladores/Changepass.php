<?php
	class ChangePass extends Controlador {
		
		function __Construct() {
            parent::__Construct();
            AyudasSessiones::ValidarSession();
			
		}
		
		public function Index() {
			
			$Parametros = AyudasSessiones::InformacionSessionControlador(true);
			$Validacion = new NeuralJQueryValidacionFormulario;
            $Validacion->IgualACampo('Passuno', 'Passdos', 'Las Contraseñas No Coinciden');
            $Validacion->RangoLongitud('Passuno', '8', '20', 'El campo es de 8 a 20 caracteres');
			$Validacion->SubmitHandler(NeuralJQueryAjax::EnviarFormularioPOST('Formulario', 'respuesta', NeuralRutasApp::RutaURL('Ajax/CambioPassword'), true, 'GESTION'));
            $Script[] = $Validacion->MostrarValidacion('Formulario');
            

			//Ayudas::print_r($Script);
            
			$Plantilla = new NeuralPlantillasTwig;
            $Plantilla->ParametrosEtiquetas('InfoSession', $Parametros);
            $Plantilla->ParametrosEtiquetas('Consulta', $this->Modelo->InformacionUsuario($Parametros['Usuario']));
            $Plantilla->ParametrosEtiquetas('Scrip', NeuralScriptAdministrador::OrganizarScript(false, $Script, 'GESTION'));
         	echo $Plantilla->MostrarPlantilla('CambiosUsuarios/ChangePass.html', 'GESTION');
		}	}
		
		//<form action="#" method="POST" name="Formulario" id="Formulario">