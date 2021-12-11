<?php  
	class Cliente
	{
		private $pdo;
		
		public function __CONSTRUCT()
		{
			try{
				$this->pdo = conexion::conectar();
			}
			catch(Exception $ex){
				die($e->getMessage());
			}
		}

		public function Ingresar_cliente($id_cl, $td_cl, $direccion_cl,$estado_cl,$contacto_cl,$td_contacto_cl,$ciudad_cl,$eps_cl)
		{
	
				$sql = "CALL pa_nuevo_cliente($id_cl, $td_cl, $direccion_cl,$estado_cl,$contacto_cl,$td_contacto_cl,$ciudad_cl,$eps_cl);";

			$this->pdo->query($sql);

			print "<script>alert(\"Cliente agregado exitosamente. \");window.location='formu_cliente.php';</script>";
		}

		public function Actualizar_cliente($old_cl, $new_cl, $td_cl, $direccion_cl, $estado_cl, $contacto_cl, $td_contacto_cl, $ciudad_cl, $eps_cl)
		{

			$sql = "UPDATE  SET ID_CLIENTE = '$new_cl', TD_CLIENTE = '$td_cl', DIRECCION = '$direccion_cl', ESTADO_CLIENTE = '$estado_cl', NUMERO_DOC_CONTACTO_E = '$contacto_cl', TD_CONTACTO_E = '$td_contacto_cl', FK_CIUDAD = '$ciudad_cl', FK_EPS = '$ eps_cl'
				WHERE ID_CLIENTE = '$old_cl';";

			$this->pdo->query($sql);

			print "<script>alert(\"Cliente Actualizado exitosamente. \");window.location='formu_cliente.php';</script>";
		}

		public function Eliminar_cliente($id_cll)
		{

			$sql = "DELETE FROM cliente WHERE ID_CLIENTE = '$id_cll'";

			$this->pdo->query($sql);

			print "<script>alert(\"Cliente Eliminado exitosamente. \");window.location='formu_cliente.php';</script>";
		}
		
	}
?>