<?php
	class Descargas extends Controlador {
		
		function __Construct() {
			parent::__Construct();
			AyudasSessiones::ValidarSession();
		}
		
		public function Index() {
		
			
		}
		
		public function Diaria() {
			
			$Validacion = new NeuralJQueryValidacionFormulario;
			$Validacion->Requerido('Fecha', 'Seleccione Una Fecha Correspondiente');
			$Validacion->Fecha('Fecha', 'La fecha ingresada es Incorrecta Utilice Dia Mes Ano');
			$Script[] = $Validacion->MostrarValidacion('Form');
			
			$Plantilla = new NeuralPlantillasTwig;
			$Plantilla->ParametrosEtiquetas('Titulo', 'Descarga Excel');
			$Plantilla->ParametrosEtiquetas('InfoSession', AyudasSessiones::InformacionSessionControlador(true));
			$Plantilla->ParametrosEtiquetas('Script', NeuralScriptAdministrador::OrganizarScript(false, $Script, 'GESTION'));
			echo $Plantilla->MostrarPlantilla('Descargas/Diaria.html', 'GESTION');
		}
		
		public function ProcesarDiaria() {
			
			$DatosPost = AyudasPost::FormatoEspacio(AyudasPost::LimpiarInyeccionSQL($_POST));
			if(AyudasPost::DatosVacios($DatosPost) == true) {
				// Vista diciendo formulario con campos vacios
			}
			else {
				$Consulta = $this->Modelo->ConsultaDiaria($DatosPost['Fecha']);
				if($Consulta['Cantidad']>=1) {
					unset($Consulta['Cantidad']);
					
					$Excel = new NeuralExportarArchivoExcel;
					$Excel->MatrizDatos($Consulta);
					$Excel->DescargarCrearExcel('BaseDia');
				}
				else {
					// Vista informando No hay datos de la fecha
				}
			}
		}
		public function Mensual() {
			$Validacion = new NeuralJQueryValidacionFormulario;
			$Validacion->Requerido('Fecha', 'Seleccione Mes y Ano Correspondiente');
			$Validacion->Fecha('Fecha', 'La fecha ingresada es Incorrecta Utilice Mes - Ano');
			$Script[] = $Validacion->MostrarValidacion('Form');
			
			$Plantilla = new NeuralPlantillasTwig;
			$Plantilla->ParametrosEtiquetas('Titulo', 'Descarga Excel');
			$Plantilla->ParametrosEtiquetas('InfoSession', AyudasSessiones::InformacionSessionControlador(true));
			$Plantilla->ParametrosEtiquetas('Script', NeuralScriptAdministrador::OrganizarScript(false, $Script, 'GESTION'));
			echo $Plantilla->MostrarPlantilla('Descargas/Mensual.html', 'GESTION');
		}
			public function ProcesarMensual() {
			
			$DatosPost = AyudasPost::FormatoEspacio(AyudasPost::LimpiarInyeccionSQL($_POST));
			if(AyudasPost::DatosVacios($DatosPost) == true) {
				// Vista diciendo formulario con campos vacios
			}
			else {
				$Consulta = $this->Modelo->ConsultaDiaria($DatosPost['Fecha']);
				if($Consulta['Cantidad']>=1) {
					unset($Consulta['Cantidad']);
					
					$Excel = new NeuralExportarArchivoExcel;
					$Excel->MatrizDatos($Consulta);
					$Excel->DescargarCrearExcel('BaseMensual');
				}
				else {
					// Vista informando No hay datos de la fecha
				}
			}
		}

		public function Seguimientos() {
			$Validacion = new NeuralJQueryValidacionFormulario;
			$Validacion->Requerido('Fecha', 'Seleccione Último Día a Validar');
			$Validacion->Fecha('Fecha', 'La fecha ingresada es Incorrecta Utilice Dia Mes Ano');
			$Script[] = $Validacion->MostrarValidacion('Form');
			
			$Plantilla = new NeuralPlantillasTwig;
			$Plantilla->ParametrosEtiquetas('Titulo', 'Descarga Excel');
			$Plantilla->ParametrosEtiquetas('InfoSession', AyudasSessiones::InformacionSessionControlador(true));
			$Plantilla->ParametrosEtiquetas('Script', NeuralScriptAdministrador::OrganizarScript(false, $Script, 'GESTION'));
			echo $Plantilla->MostrarPlantilla('Descargas/Seguimientos.html', 'GESTION');
		}
			public function ProcesarSeguimientos() {
			
			$DatosPost = AyudasPost::FormatoEspacio(AyudasPost::LimpiarInyeccionSQL($_POST));
			if(AyudasPost::DatosVacios($DatosPost) == true) {
				// Vista diciendo formulario con campos vacios
			}
			else {
				$Consulta = $this->Modelo->ConsultaDiaria($DatosPost['Fecha']);
				if($Consulta['Cantidad']>=1) {
					unset($Consulta['Cantidad']);
					
					$Excel = new NeuralExportarArchivoExcel;
					$Excel->MatrizDatos($Consulta);
					$Excel->DescargarCrearExcel('BaseSeguimientos');
				}
				else {
					// Vista informando No hay datos de la fecha
				}
			}
		}

	}