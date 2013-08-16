<?php
	class Ajax_AdminUsuarios_Modelo extends Modelo {
		
		function __Construct() {
			parent::__Construct();
			AyudasSessiones::ValidarSessionModelo();
		}
		
		public function ConsultarExistenciaUsuario($Usuario = false) {
			if($Usuario == true) {
				$Consulta = new NeuralBDConsultas;
				$Consulta->CrearConsulta('tbl_sistema_usuarios');
				$Consulta->AgregarColumnas('Usuario');
				$Consulta->AgregarCondicion("Usuario = '$Usuario'");
				$Consulta->PrepararCantidadDatos('Cantidad');
				return $Consulta->ExecuteConsulta('GESTION');
			}
		}
		
		public function GuardarNuevoUsuario($Array = false) {
			if($Array == true AND is_array($Array) == true) {
				$SQL = new NeuralBDGab;
				$SQL->SeleccionarDestino('GESTION', 'tbl_sistema_usuarios');
				foreach ($Array AS $Columna => $Valor) {
					$SQL->AgregarSentencia($Columna, $Valor);
				}
				$SQL->AgregarSentencia('Password', sha1($Array['Cedula']));
				$SQL->AgregarSentencia('Estado', 'ACTIVO');
				$SQL->InsertarDatos();
			}
		}
		
		public function ActivacionUsuario($Id = false, $Estado = false) {
			if($Id == true AND $Estado == true) {
				$SQL = new NeuralBDGab;
				$SQL->SeleccionarDestino('GESTION', 'tbl_gestion_asesores');
				$SQL->AgregarSentencia('Estado', $Estado);
				$SQL->AgregarCondicion('Id', $Id);
				$SQL->ActualizarDatos();
			}
		}
	}