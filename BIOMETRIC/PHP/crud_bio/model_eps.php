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

		public function Ingresar_eps($id_epss, $desc_epss, $estado_eps)
		{
	
				$sql = "INSERT INTO eps(ID_EPS,DES_EPS,ESTADO_EPS)
                VALUES('$id_epss','$desc_epss','$estado_eps');";

			$this->pdo->query($sql);

			print "<script>alert(\"Eps agregada exitosamente. \");window.location='formu_eps.php';</script>";
		}

		public function Actualizar_eps($old_eps, $new_eps, $des_eps, $estado_eps)
		{

			$sql = "UPDATE eps SET ID_EPS = '$new_eps', DES_EPS = '$des_eps', ESTADO_EPS = '$estado_eps'
					WHERE ID_EPS = '$old_eps';";

			$this->pdo->query($sql);

			print "<script>alert(\"Eps Actualizada exitosamente. \");window.location='formu_eps.php';</script>";
		}

		public function Eliminar_eps($id_epss)
		{

			$sql = "DELETE FROM eps WHERE ID_EPS = '$id_epss'";

			$this->pdo->query($sql);

			print "<script>alert(\"Eps Eliminada exitosamente. \");window.location='formu_eps.php';</script>";
		}
		
	}
?>