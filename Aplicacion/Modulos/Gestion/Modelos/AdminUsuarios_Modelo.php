<?php
	class AdminUsuarios_Modelo extends Modelo {
		
		function __Construct() {
			parent::__Construct();
			AyudasSessiones::ValidarSessionModelo();
		}
		
		public function ListarPermisos($Validacion = false) {
			if($Validacion == true) {
				$Consulta = new NeuralBDConsultas;
				$Consulta->CrearConsulta('tbl_sistema_permisos');
				$Consulta->AgregarColumnas('Id, Nombre');
				$Consulta->AgregarCondicion("Nombre <> 'RootAgent'");
				$Consulta->PrepararQuery();
				return $Consulta->ExecuteConsulta('GESTION');
			}
		}
	}