<?php
	class Descargas_Modelo extends Modelo {
		
		function __Construct() {
			parent::__Construct();

		}
		
		public function ConsultaMatriz() {
			$Consulta = new NeuralBDConsultas;	
			$Consulta->CrearConsulta('tbl_base_general');
			$Consulta->PrepararQuery();
			return $Consulta->ExecuteConsulta('GESTION');
						
		}
		
		public function ConsultaDiaria($Fecha) {
			$Consulta = new NeuralBDConsultas;
			$Consulta->CrearConsulta('tbl_base_general');
			$Consulta->AgregarColumnas(self::ListarColumnasTabla('tbl_base_general'));
			$Consulta->AgregarCondicion("Fecha = '$Fecha'");
			$Consulta->PrepararCantidadDatos('Cantidad');
			$Consulta->PrepararQuery();
			return $Consulta->ExecuteConsulta('GESTION');
		}
		
		public function ConsultaMensual($Fecha) {
			$Consulta = new NeuralBDConsultas;
			$Consulta->CrearConsulta('tbl_base_general');
			$Consulta->AgregarColumnas(self::ListarColumnasTabla('tbl_base_general'));
			$Consulta->AgregarCondicion("Fecha = '$Fecha'");
			$Consulta->PrepararCantidadDatos('Cantidad');
			$Consulta->PrepararQuery();
			return $Consulta->ExecuteConsulta('GESTION');
		}
		
		public function ConsultaSeguimientos($Fecha) {
			$Consulta = new NeuralBDConsultas;
			$Consulta->CrearConsulta('tbl_base_general');
			$Consulta->AgregarColumnas(self::ListarColumnasTabla('tbl_base_general'));
			$Consulta->AgregarCondicion("Fecha = '$Fecha'");
			$Consulta->PrepararCantidadDatos('Cantidad');
			$Consulta->PrepararQuery();
			return $Consulta->ExecuteConsulta('GESTION');
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