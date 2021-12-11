<?php  
	class Contacto_emergencia 
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

		public function Ingresar_contacto_e($id_contacto, $td_contacto, $estado_ce,$parentesco_ce)
		{
				$sql = "INSERT INTO contacto_emergencia(ID_CONTACTO,TD_CONTACTO,ESTADO_CONTACTO,ID_PARENTESCO_C)
				VALUES ('$id_contacto','$td_contacto','estado_ce','$parentesco_ce');";

			$this->pdo->query($sql);

			print "<script>alert(\"Agregado exitosamente. \");window.location='formu_contacto_e.php';</script>";
		}

		public function Actualizar_contacto_e($old_id_contacto,$new_id_contacto,$td_contacto, $estado_ce,$parentesco_ce)
		{

			$sql = "UPDATE contacto_emergencia SET ID_CONTACTO = '$new_id_contacto', TD_CONTACTO = 
			       '$td_contacto', ESTADO_CONTACTO = '$estado_ce', ID_PARENTESCO_C = '$parentesco_ce'
				   WHERE ID_CONTACTO = '$old_id_contacto';";

			$this->pdo->query($sql);

			print "<script>alert(\"Datos Actualizados exitosamente. \");window.location='formu_contacto_e.php';</script>";
		}

		public function Eliminar_contacto_e($id_ce)
		{

			$sql = "DELETE FROM contacto_emergencia WHERE ID_CONTACTO = '$id_ce'";

			$this->pdo->query($sql);

			print "<script>alert(\"Eliminado exitosamente. \");window.location='formu_contacto_e.php';</script>";
		}
		
	}
?>