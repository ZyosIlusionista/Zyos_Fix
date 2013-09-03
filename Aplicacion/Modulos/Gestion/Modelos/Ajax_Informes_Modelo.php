<?php
	class Ajax_Informes_Modelo extends Modelo {
		
		function __Construct() {
			parent::__Construct();
			AyudasSessiones::ValidarSessionModelo();
		}
		
		public function ConsolidadoDia($Fecha = false) {
			if($Fecha == true) {
				$Conexion = NeuralConexionBaseDatos::ObtenerConexionBase('GESTION');
				$TipoReporte = self::DiaConsultaTipoReporte($Conexion, $Fecha);
				return array(
					'Tipo_Reporte' => $TipoReporte, 
					'Sintomas' => self::DiaConsultaSintomas($Conexion, $TipoReporte, $Fecha)
				);
			}
		}
		
		private function DiaConsultaSintomas($Conexion = false, $Array = false, $Fecha = false) {
			if($Array['Cantidad']>=1) {
				for ($i=0; $i<$Array['Cantidad']; $i++) {
					$Reporte = $Array[$i]['Tipo_Reporte'];
					$Consulta = $Conexion->fetchAll("SELECT Sintoma, COUNT('Sintoma') AS Cantidad FROM tbl_base_general WHERE Fecha = '$Fecha' AND Tipo_Reporte = '$Reporte' GROUP BY Sintoma");
					$Lista[$Reporte] = $Consulta;
				}
				return $Lista;
			}
		}
		
		private function DiaConsultaTipoReporte($Conexion = false, $Fecha = false) {
			$Datos = $Conexion->fetchAll("SELECT Tipo_Reporte, COUNT('Id') AS Cantidad FROM tbl_base_general WHERE Fecha = '$Fecha' GROUP BY Tipo_Reporte");
			$Cantidad = count($Datos);
			return array_merge(array('Cantidad' => $Cantidad), $Datos);
		}
	}