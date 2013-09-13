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
			
			$Validacion = new NeuralJQueryValidacionFormulario;
			$Validacion->Requerido('Fecha', 'Seleccione La Fecha Correspondiente');
			$Validacion->Fecha('Fecha', 'El Formato de Fecha debe Ser Año-Mes-Dia Ej: '.date("Y-m-d"));
			$Script[] = $Validacion->MostrarValidacion('Form');
			
			$Plantilla = new NeuralPlantillasTwig;
			$Plantilla->ParametrosEtiquetas('InfoSession', AyudasSessiones::InformacionSessionControlador(true));
			$Plantilla->ParametrosEtiquetas('Titulo', 'Descarga Diaria');
			$Plantilla->ParametrosEtiquetas('Fecha', AyudasConversorHexAscii::ASCII_HEX(date("Y-m-d")));
			$Plantilla->ParametrosEtiquetas('Script', NeuralScriptAdministrador::OrganizarScript(false, $Script, 'GESTION'));
			echo $Plantilla->MostrarPlantilla('Descargas/Diaria.html', 'GESTION');
		}
		
		public function ProcesarDiaria($Validacion = false) {
			if($Validacion == true AND AyudasConversorHexAscii::HEX_ASCII($Validacion) == date("Y-m-d")) {
				if(AyudasPost::DatosVacios($_POST) == false) {
					$DatosPost = AyudasPost::FormatoEspacio(AyudasPost::LimpiarInyeccionSQL($_POST));
					$InfoSession = AyudasSessiones::InformacionSessionControlador(true);
					$Consulta = $this->Modelo->Diario($DatosPost['Fecha']);
					if($Consulta['Cantidad']>=1) {
						$objPHPExcel = new PHPExcel();
						$objPHPExcel->getProperties()->setCreator($InfoSession['Nombre'])
													->setLastModifiedBy($InfoSession['Nombre'])
													->setTitle("Descarga de La Base del Dia ".$DatosPost['Fecha'])
													->setSubject("Descarga de La Base del Dia ".$DatosPost['Fecha'])
													->setDescription("Descarga de La Base del Dia ".$DatosPost['Fecha'])
													->setKeywords("Base Diaria")
													->setCategory("Base Diaria");
													
						$objPHPExcel->setActiveSheetIndex(0)
									->setCellValue('A1', 'Consecutivo')
									->setCellValue('B1', 'Fecha')
									->setCellValue('C1', 'Hora')
									->setCellValue('D1', 'Asesor')
									->setCellValue('E1', 'Nombres del Asesor')
									->setCellValue('F1', 'Apellidos del Asesor')
									->setCellValue('G1', 'Usuario Experto')
									->setCellValue('H1', 'Nombres del Experto')
									->setCellValue('I1', 'Apellidos del experto')
									->setCellValue('J1', 'Tipo de Reporte')
									->setCellValue('K1', 'Cuenta')
									->setCellValue('L1', 'MAC')
									->setCellValue('M1', 'Marca')
									->setCellValue('N1', 'Modelo')
									->setCellValue('O1', 'Firmware')
									->setCellValue('P1', 'Sintoma')
									->setCellValue('Q1', 'Observaciones')
									->setCellValue('R1', 'Seguimiento')
									->setCellValue('S1', 'Softswitch')
									->setCellValue('T1', 'Nodo')
									->setCellValue('U1', 'Paquete')
									->setCellValue('V1', 'Aviso')
									->setCellValue('W1', 'CMTS')
									->setCellValue('X1', 'Paso del IIMS');
									
						for ($i=0; $i<$Consulta['Cantidad']; $i++) {
							$Contador = $i+2;
							$objPHPExcel->setActiveSheetIndex(0)
										->setCellValue('A'.$Contador, $Consulta[$i]['Consecutivo'])
										->setCellValue('B'.$Contador, $Consulta[$i]['Fecha'])
										->setCellValue('C'.$Contador, $Consulta[$i]['Hora'])
										->setCellValue('D'.$Contador, $Consulta[$i]['Asesor'])
										->setCellValue('E'.$Contador, $Consulta[$i]['Nombres_Asesor'])
										->setCellValue('F'.$Contador, $Consulta[$i]['Apellidos_Asesor'])
										->setCellValue('G'.$Contador, $Consulta[$i]['Usuario'])
										->setCellValue('H'.$Contador, $Consulta[$i]['Nombres_Usuario'])
										->setCellValue('I'.$Contador, $Consulta[$i]['Apellidos_Usuarios'])
										->setCellValue('J'.$Contador, $Consulta[$i]['Tipo_Reporte'])
										->setCellValue('K'.$Contador, $Consulta[$i]['Cuenta'])
										->setCellValue('L'.$Contador, $Consulta[$i]['MAC'])
										->setCellValue('M'.$Contador, $Consulta[$i]['Marca'])
										->setCellValue('N'.$Contador, $Consulta[$i]['Modelo'])
										->setCellValue('O'.$Contador, $Consulta[$i]['Firmware'])
										->setCellValue('P'.$Contador, $Consulta[$i]['Sintoma'])
										->setCellValue('Q'.$Contador, $Consulta[$i]['Observaciones'])
										->setCellValue('R'.$Contador, $Consulta[$i]['Seguimiento'])
										->setCellValue('S'.$Contador, $Consulta[$i]['Softswitch'])
										->setCellValue('T'.$Contador, $Consulta[$i]['Nodo'])
										->setCellValue('U'.$Contador, $Consulta[$i]['Paquete'])
										->setCellValue('V'.$Contador, $Consulta[$i]['Aviso'])
										->setCellValue('W'.$Contador, $Consulta[$i]['CMTS'])
										->setCellValue('X'.$Contador, $Consulta[$i]['IIMS_Paso']);
						}
						
						$objPHPExcel->getActiveSheet()->setTitle('Base Dia '.$DatosPost['Fecha']);
						$objPHPExcel->setActiveSheetIndex(0);
						$NombreArchivo = $InfoSession['Usuario'].'_Dia_'.$InfoSession['Fecha']['wday'].'_'.$InfoSession['Fecha']['mday'].'_'.$InfoSession['Fecha']['mon'].'_'.$InfoSession['Fecha']['year'];
						header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
						header("Content-Disposition: attachment;filename=\"$NombreArchivo.xlsx\"");
						header('Cache-Control: max-age=0');
						$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
						$objWriter->save('php://output');
						exit();
					}
					else {
						$Plantilla = new NeuralPlantillasTwig;
						$Plantilla->ParametrosEtiquetas('InfoSession', AyudasSessiones::InformacionSessionControlador(true));
						$Plantilla->ParametrosEtiquetas('Titulo', 'Descarga Diaria');
						$Plantilla->ParametrosEtiquetas('Fecha', AyudasConversorHexAscii::ASCII_HEX(date("Y-m-d")));
						echo $Plantilla->MostrarPlantilla('Descargas/NoHayDatos.html', 'GESTION');
					}
				}
				else {
					echo 'Hay Datos Vacios Validar la Informacion';
				}
			}
		}
	}