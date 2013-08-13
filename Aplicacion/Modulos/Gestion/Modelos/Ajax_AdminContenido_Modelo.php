<?php
	class Ajax_AdminContenido_Modelo extends Modelo {
		
		function __Construct() {
			parent::__Construct();
			AyudasSessiones::ValidarSessionModelo();
		}
		
		public function CargarListadoSintoma($TipoSintoma = false) {
			if($TipoSintoma == true) {
				$Consulta = new NeuralBDConsultas;
				$Consulta->CrearConsulta('tbl_base_sintoma');
				$Consulta->AgregarColumnas(self::ListarColumnasTabla('tbl_base_sintoma', array('Fecha', 'Hora')));
				$Consulta->AgregarCondicion("Tipo_Reporte = '$TipoSintoma'");
				$Consulta->AgregarCondicion("Estado = 'ACTIVO'");
				$Consulta->AgregarOrdenar('Sintoma', 'ASC');
				$Consulta->PrepararQuery();
				return $Consulta->ExecuteConsulta('GESTION');
			}
		}
		
		public function AgregarSintoma($Sintoma = false, $Usuario = false, $TipoReporte = false) {
			if($Sintoma == true AND $Usuario == true AND $TipoReporte == true) {
				$SQL = new NeuralBDGab;
				$SQL->SeleccionarDestino('GESTION', 'tbl_base_sintoma');
				$SQL->AgregarSentencia('Tipo_Reporte', mb_strtoupper($TipoReporte));
				$SQL->AgregarSentencia('Sintoma', $Sintoma);
				$SQL->AgregarSentencia('Estado', 'ACTIVO');
				$SQL->AgregarSentencia('Fecha', date("Y-m-d"));
				$SQL->AgregarSentencia('Hora', date("H:i:s"));
				$SQL->InsertarDatos();
			}
		}
		
		/**
		 * Metodo Privado
		 * ListarColumnas($Tabla = false, $Omitidos = false)
		 * 
		 * @param $Alias: es un array asociativo
		 * @example array('Columna' => 'Alias')
		 */
		private function ListarColumnasTabla($Tabla = false, $Omitidos = false, $Alias = false) {
			if($Tabla == true) {
				$Consulta = new NeuralBDConsultas;
				$Lista = $Consulta->ExecuteQueryManual('GESTION', "DESCRIBE $Tabla");
				$Cantidad = count($Lista);
				$Matriz = (is_array($Omitidos) == true) ? array_flip($Omitidos) : array();
				$AliasBase = (is_array($Alias) == true) ? $Alias : array();
				for ($i=0; $i<$Cantidad; $i++) {
					if(array_key_exists($Lista[$i]['Field'], $Matriz) == false) {
						if(array_key_exists($Lista[$i]['Field'], $AliasBase) == true) {
							$Columna[] = $Tabla.'.'.$Lista[$i]['Field'].' AS '.$AliasBase[$Lista[$i]['Field']];
						}
						else {
							$Columna[] = $Tabla.'.'.$Lista[$i]['Field'];
						}
					}
				}
				return implode(', ', $Columna);
			}
		}
	}