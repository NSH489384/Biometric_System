<?php 
	class Persona 
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

		public function Nueva_persona($user, $tdoc, $nombre, $nombree, $apel, $apell, $tel)
		{
	
				$sql = "CALL pa_insert_persona('$user','$tdoc','$nombre', '$nombree', '$apel', '$apell', '$tel')";

			$this->pdo->query($sql);

			print "<script>alert(\"Registro agregado exitosamente. \");window.location='formu_pers.php';</script>";
		}

		public function Actualizar_persona($old_user, $tdoc, $nombre, $nombree, $apel, $apell, $tel)
		{

			$sql = "CALL pa_actualizar_persona('$old_user', '$tdoc', '$nombre', '$nombree', '$apel', '$apell', '$tel')";

			$this->pdo->query($sql);

			print "<script>alert(\"Registro Actualizado exitosamente. \");window.location='formu_pers.php';</script>";
		}

		public function Eliminar_persona($persona)
		{

			$sql = "DELETE FROM persona WHERE ID_PERSONA = '$persona'";

			$this->pdo->query($sql);

			print "<script>alert(\"Registro Eliminado exitosamente. \");window.location='formu_pers.php';</script>";
		}
		
	}
?>