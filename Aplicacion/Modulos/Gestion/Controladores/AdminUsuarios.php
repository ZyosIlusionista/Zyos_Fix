<?php
	class AdminUsuarios extends Controlador {
	
		function __Construct() {
			parent::__Construct();
			AyudasSessiones::ValidarSession();
		}
	
		public function Index() {
			
			$Plantilla = new NeuralPlantillasTwig;
			$Plantilla->ParametrosEtiquetas('InfoSession', AyudasSessiones::InformacionSessionControlador(true));
			$Plantilla->ParametrosEtiquetas('Titulo', 'Administración Usuarios');
			echo $Plantilla->MostrarPlantilla('AdminUsuarios/Menu.html', 'GESTION');
		}
		
		public function NuevoUsuario() {
			
			$Validacion = new NeuralJQueryValidacionFormulario;
			$Validacion->Requerido('Usuario', 'Ingrese el Usuario Correspondiente');
			$Validacion->Remote('Usuario', NeuralRutasApp::RutaURL('Ajax_AdminUsuarios/ConsultarExistenciaUsuario'), 'POST', ucwords('actualmente el usuario se encuentra en la base de datos'));
			$Validacion->Requerido('Cedula', 'Ingrese la Cedula Correspondiente');
			$Validacion->Numero('Cedula', 'Solo se Aceptan Datos Númericos');
			$Validacion->Requerido('Nombres', 'Ingrese Los Nombres Correspondiente');
			$Validacion->Requerido('Apellidos', 'Ingrese Los Apellidos Correspondiente');
			$Validacion->Requerido('Cargo', 'Ingrese El Cargo Correspondiente');
			$Validacion->Requerido('Permisos', 'Seleccione el Permiso del Usuario');
			$Validacion->SubmitHandler(NeuralJQueryAjax::EnviarFormularioPOST('Form', 'Form', NeuralRutasApp::RutaURL('Ajax_AdminUsuarios/GestionNuevoUsuario/'.AyudasConversorHexAscii::ASCII_HEX(NeuralEncriptacion::EncriptarDatos(date("Y-m-d"), array(date("Y-m-d"), 'GESTION')))), true, 'GESTION'));
			$Script[] = $Validacion->MostrarValidacion('Form');
			
			
			$Plantilla = new NeuralPlantillasTwig;
			$Plantilla->ParametrosEtiquetas('InfoSession', AyudasSessiones::InformacionSessionControlador(true));
			$Plantilla->ParametrosEtiquetas('Titulo', 'Nuevo Usuario');
			$Plantilla->ParametrosEtiquetas('Fecha', date("Y-m-d"));
			$Plantilla->ParametrosEtiquetas('Script', NeuralScriptAdministrador::OrganizarScript(false, $Script, 'GESTION'));
			$Plantilla->ParametrosEtiquetas('Permisos', $this->Modelo->ListarPermisos(true));
			$Plantilla->AgregarFuncionAnonima('Codificacion', function ($Texto) {
				return AyudasConversorHexAscii::ASCII_HEX(NeuralEncriptacion::EncriptarDatos($Texto, 'GESTION'));
			});
			$Plantilla->AgregarFuncionAnonima('LlavePublica', function ($Texto) {
				return AyudasConversorHexAscii::ASCII_HEX($Texto);
			});
			echo $Plantilla->MostrarPlantilla('AdminUsuarios/NuevoUsuario.html', 'GESTION');
		}
		
		public function UsuarioLoteExcel() {
			
			$Validacion = new NeuralJQueryValidacionFormulario;
			$Validacion->Requerido('Excel', 'Ingrese Los Campos Copiados de Excel, son Requeridos');
			$Validacion->SubmitHandler(NeuralJQueryAjax::EnviarFormularioPOST('Form', 'Form', NeuralRutasApp::RutaURL('Ajax_AdminUsuarios/ProcesarUsuariosLoteExcel/'.AyudasConversorHexAscii::ASCII_HEX(NeuralEncriptacion::EncriptarDatos(date("Y-m-d"), array(date("Y-m-d"), 'GESTION')))), true, 'GESTION'));
			$Script[] = $Validacion->MostrarValidacion('Form');
			
			$Parametros = AyudasSessiones::InformacionSessionControlador(true);
			$Plantilla = new NeuralPlantillasTwig;
			$Plantilla->ParametrosEtiquetas('InfoSession', $Parametros);
			$Plantilla->ParametrosEtiquetas('Titulo', 'Usuarios por Excel');
			$Plantilla->ParametrosEtiquetas('Permisos', $this->Modelo->ListarPermisos(true));
			$Plantilla->ParametrosEtiquetas('Script', NeuralScriptAdministrador::OrganizarScript(false, $Script, 'GESTION'));
			$Plantilla->AgregarFuncionAnonima('Codificacion', function ($Texto) {
				return AyudasConversorHexAscii::ASCII_HEX($Texto);
			});
			echo $Plantilla->MostrarPlantilla('AdminUsuarios/UsuarioLoteExcel.html', 'GESTION');
		}
	}