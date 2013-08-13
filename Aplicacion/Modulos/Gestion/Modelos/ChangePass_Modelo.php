<?php
	class ChangePass_Modelo extends Modelo {
		function __Construct() {
			parent::__Construct();
			AyudasSessiones::ValidarSessionModelo();
		}
		public function InformacionUsuario ($Usuario) {
			$ConsultaSQL = new NeuralBDConsultas;
			$ConsultaSQL->CrearConsulta('tbl_sistema_usuarios');
			$ConsultaSQL->AgregarColumnas('Id');   		      		
			$ConsultaSQL->AgregarCondicion("Usuario ='$Usuario'");
			$ConsultaSQL->AgregarCondicion("Estado = 'ACTIVO'");
			$ConsultaSQL->PrepararQuery();
			Return $ConsultaSQL->ExecuteConsulta('GESTION');			
			   
		}

		private function ExisteUsuario ($Usuario, $Password) {
        	$ConsultaSQL = new NeuralBDConsultas;
			$ConsultaSQL->CrearConsulta('tbl_sistema_usuarios');
			$ConsultaSQL->AgregarColumnas('Id');   		      		
			$ConsultaSQL->AgregarCondicion("Usuario ='$Usuario'");
			$ConsultaSQL->AgregarCondicion("Estado = 'ACTIVO'");
			$ConsultaSQL->PrepararCantidadDatos();
			Return $ConsultaSQL->ExecuteConsulta('GESTION');
		}

		private function NuevoPassword ($Password)    {
			$CambiarSQL = new NeuralBDGab;
			$CambiarSQL->SeleccionarDestino('tbl_sistema_usuarios');
			$CambiarSQL->AgregarSentencia('Password', $Password);
			$CambiarSQL->AgregarCondicion('Usuario', $Usuario);
			$CambiarSQL->ActualizarDatos();
			
		}
	}




//self::acelerar();
//return