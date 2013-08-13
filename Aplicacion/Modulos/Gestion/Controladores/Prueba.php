<?php
	class Prueba extends Controlador {
		
		function __Construct() {
			parent::__Construct();			
		}
		
		public function Index() {
			
			//$Plantilla = new NeuralPlantillasTwig;
			//echo $Plantilla->MostrarPlantilla('Prueba.html', 'GESTION');
			echo '<form action="'.NeuralRutasApp::RutaURL('Prueba/Prueba').'" method="POST"><textarea name="input" rows="20" cols="60"></textarea><input type="submit" value="Enviar"></form>';
		}
		
		public function Prueba() {
			/*$Datos = explode("\n", addslashes(trim($_POST['input'])));
			
			foreach ($Datos AS $Columna => $Valor) {
				if(is_array($Valor) == false) {
					$Array[] = explode("\t", $Valor);
				}
			}
			
			Ayudas::print_r($Datos);
			Ayudas::print_r($Array);
			*/
			
			Ayudas::print_r(AyudasCopyPasteExcelArray::ConvertirExcelArrayColumnas($_POST['input'], array('CODIGO', 'DESCRIPCION_CORTA', 'DESCRIPCION_LARGA', 'COD_GEN')));
			Ayudas::print_r(AyudasCopyPasteExcelArray::ConvertirExcelArray($_POST['input']));
		}
	}