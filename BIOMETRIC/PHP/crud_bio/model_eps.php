<?php 
	class Eps
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

		public function Ingresar_eps($id_eps, $nom_eps, $estado)
		{
	
				$sql = "INSERT INTO eps(ID_EPS,DES_EPS,ESTADO_EPS)
                VALUES('$id_eps','$nom_eps','$estado');";

			$this->pdo->query($sql);

			print "<script>alert(\"Registro agregado exitosamente. \");window.location='form_eps.php';</script>";
		}

		public function Actualizar_eps($old_idd, $new_idd, $nnom_eps, $eestado)
		{

			$sql = "UPDATE eps SET ID_EPS = '$new_idd', DES_EPS = '$nnom_eps', ESTADO_EPS = '$eestado'
						WHERE ID_EPS = '$old_idd';";

			$this->pdo->query($sql);

			print "<script>alert(\"Registro Actualizado exitosamente. \");window.location='form_eps.php';</script>";
		}

		public function Eliminar_eps($id_eps)
		{

			$sql = "DELETE FROM eps WHERE ID_EPS = '$id_eps'";

			$this->pdo->query($sql);

			print "<script>alert(\"Registro Eliminado exitosamente. \");window.location='form_eps.php';</script>";
		}
		
	}
?>