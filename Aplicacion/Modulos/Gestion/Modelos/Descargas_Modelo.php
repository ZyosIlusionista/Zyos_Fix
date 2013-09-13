<?php
	class Descargas_Modelo extends Modelo {
		
		function __Construct() {
			parent::__Construct();

		}
		
		public function Diario($Fecha = false) {
			if($Fecha == true) {
				$Consulta = new NeuralBDConsultas;
				$Consulta->CrearConsulta('tbl_base_general');
				$Consulta->CrearConsulta('tbl_sistema_usuarios');
				$Consulta->CrearConsulta('tbl_gestion_asesores');
				$Consulta->AgregarColumnas('tbl_base_general.Id AS Consecutivo, tbl_base_general.Fecha, tbl_base_general.Hora, tbl_base_general.Asesor');
				$Consulta->AgregarColumnas('tbl_gestion_asesores.Nombres AS Nombres_Asesor, tbl_gestion_asesores.Apellidos AS Apellidos_Asesor');
				$Consulta->AgregarColumnas('tbl_base_general.Usuario');
				$Consulta->AgregarColumnas('tbl_sistema_usuarios.Nombres AS Nombres_Usuario, tbl_sistema_usuarios.Apellidos AS Apellidos_Usuarios');
				$Consulta->AgregarColumnas('tbl_base_general.Tipo_Reporte, tbl_base_general.Cuenta, tbl_base_general.MAC, tbl_base_general.Marca, tbl_base_general.Modelo, tbl_base_general.Firmware, tbl_base_general.Sintoma, tbl_base_general.Observaciones, tbl_base_general.Seguimiento, tbl_base_general.Softswitch, tbl_base_general.Nodo, tbl_base_general.Paquete, tbl_base_general.Aviso, tbl_base_general.CMTS, tbl_base_general.IIMS_Paso');
				$Consulta->AgregarCondicion("tbl_base_general.Fecha = '$Fecha'");
				$Consulta->AgregarCondicion("tbl_base_general.Asesor = tbl_gestion_asesores.Usuario");
				$Consulta->AgregarCondicion("tbl_base_general.Usuario = tbl_sistema_usuarios.Usuario");
				$Consulta->AgregarOrdenar('tbl_base_general.Fecha', 'ASC');
				$Consulta->PrepararCantidadDatos('Cantidad');
				$Consulta->PrepararQuery();
				return $Consulta->ExecuteConsulta('GESTION');
			}
		}
		
		public function Mensual($FechaInicio = false, $FechaFin = false) {
			if($FechaInicio == true AND $FechaFin == true) {
				$Consulta = new NeuralBDConsultas;
				$Consulta->CrearConsulta('tbl_base_general');
				$Consulta->CrearConsulta('tbl_sistema_usuarios');
				$Consulta->CrearConsulta('tbl_gestion_asesores');
				$Consulta->AgregarColumnas('tbl_base_general.Id AS Consecutivo, tbl_base_general.Fecha, tbl_base_general.Hora, tbl_base_general.Asesor');
				$Consulta->AgregarColumnas('tbl_gestion_asesores.Nombres AS Nombres_Asesor, tbl_gestion_asesores.Apellidos AS Apellidos_Asesor');
				$Consulta->AgregarColumnas('tbl_base_general.Usuario');
				$Consulta->AgregarColumnas('tbl_sistema_usuarios.Nombres AS Nombres_Usuario, tbl_sistema_usuarios.Apellidos AS Apellidos_Usuarios');
				$Consulta->AgregarColumnas('tbl_base_general.Tipo_Reporte, tbl_base_general.Cuenta, tbl_base_general.MAC, tbl_base_general.Marca, tbl_base_general.Modelo, tbl_base_general.Firmware, tbl_base_general.Sintoma, tbl_base_general.Observaciones, tbl_base_general.Seguimiento, tbl_base_general.Softswitch, tbl_base_general.Nodo, tbl_base_general.Paquete, tbl_base_general.Aviso, tbl_base_general.CMTS, tbl_base_general.IIMS_Paso');
				$Consulta->AgregarCondicion("tbl_base_general.Fecha BETWEEN '$FechaInicio' AND '$FechaFin'");
				$Consulta->AgregarCondicion("tbl_base_general.Asesor = tbl_gestion_asesores.Usuario");
				$Consulta->AgregarCondicion("tbl_base_general.Usuario = tbl_sistema_usuarios.Usuario");
				$Consulta->AgregarOrdenar('tbl_base_general.Fecha', 'ASC');
				$Consulta->PrepararCantidadDatos('Cantidad');
				$Consulta->PrepararQuery();
				return $Consulta->ExecuteConsulta('GESTION');
			}
		}
	}