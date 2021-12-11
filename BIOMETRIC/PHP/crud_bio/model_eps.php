<?php

class Eps
{
	private $pdo;
	
		public function __CONSTRUCT()
		{
			try
			{
				$this->pdo = conexion::conectar();
		    }
			catch(Exception $ex)
			{
				die($e->getMessage());
			}
		}
		public function ingresar_Eps($id_e,$des_e,$estado_e)
		{
			$sql = "INSERT INTO eps(ID_EPS,DES_EPS,ESTADO_EPS)
			        VALUES('$id_e','$des_e',$estado_e);";

			        $this->pdo->query($sql);

			print "<script>alert(\"Registro agregado exitosamente. \");window.location='form_eps.php';</script>";
		}

		public function Actualizar_eps($old_eps, $new_e, $des_e, $estado_e)
		{

			$sql = "UPDATE eps SET ID_EPS = '$new_e', DES_EPS = '$des_e', ESTADO_EPS = '$estado_e'
			       WHERE ID_EPS = '$old_eps';";

			$this->pdo->query($sql);

			print "<script>alert(\"Registro Actualizado exitosamente. \");window.location='form_eps.php';</script>";
		}

		public function Eliminar_eps($epss)
		{

			$sql = "DELETE FROM eps WHERE ID_EPS = '$epss'";

			$this->pdo->query($sql);

			print "<script>alert(\"Registro Eliminado exitosamente. \");window.location='form_eps.php';</script>";
		}
}
?>