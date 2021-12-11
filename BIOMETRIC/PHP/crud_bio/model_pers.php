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

		public function Nueva_persona($tdoc, $user, $nombre, $nombree, $apel, $apell, $tel)
		{
	
				$sql = "INSERT INTO persona(TD_PERSONA,ID_PERSONA,PRIMER_NOMBRE,SEGUNDO_NOMBRE,PRIMER_APELLIDO,SEGUNDO_APELLIDO,TELEFONO)
                VALUES('$tdoc','$user','$nombre','$nombree','$apel','$apell','$tel');";

			$this->pdo->query($sql);

			print "<script>alert(\"Registro agregado exitosamente. \");window.location='form_pers.php';</script>";
		}

		public function Actualizar_persona($old_user, $tdoc, $new_user, $nombre, $nombree, $apel, $apell, $tel)
		{

			$sql = "UPDATE persona SETTD_PERSONA = '$tdoc', ID_PERSONA = '$new_user', PRIMER_NOMBRE = '$nombre', SEGUNDO_NOMBRE = '$nombree', PRIMER_APELLIDO = '$apel', SEGUNDO_APELLIDO = $apell, TELEFONO = '$tel'
						WHERE ID_PERSONA = '$old_user';";

			$this->pdo->query($sql);

			print "<script>alert(\"Registro Actualizado exitosamente. \");window.location='form_pers.php';</script>";
		}

		public function Eliminar_persona($userr)
		{

			$sql = "DELETE FROM persona WHERE ID_PERSONA = '$userr'";

			$this->pdo->query($sql);

			print "<script>alert(\"Registro Eliminado exitosamente. \");window.location='form_pers.php';</script>";
		}
		
	}
?>