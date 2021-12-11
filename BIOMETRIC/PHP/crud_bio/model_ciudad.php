<?php 
	class Ciudad
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

		public function Ingresar_ciudad($id_ciu, $nom_ciu, $estado)
		{
	
				$sql = "INSERT INTO ciudad(ID_CIUDAD,DES_CIUDAD,ESTADO_CIUDAD)
                VALUES('$id_ciu','$nom_ciu','$estado');";

			$this->pdo->query($sql);

			print "<script>alert(\"Registro agregado exitosamente. \");window.location='form_ciudad.php';</script>";
		}

		public function Actualizar_ciudad($old_idd, $new_idd, $nnom_ciu, $eestado)
		{

			$sql = "UPDATE ciudad SET ID_CIUDAD = '$new_idd', DES_CIUDAD = '$nnom_ciu', ESTADO_CIUDAD = '$eestado'
						WHERE ID_CIUDAD = '$old_idd';";

			$this->pdo->query($sql);

			print "<script>alert(\"Registro Actualizado exitosamente. \");window.location='form_ciudad.php';</script>";
		}

		public function Eliminar_ciudad($id_ciu)
		{

			$sql = "DELETE FROM ciudad WHERE ID_CIUDAD = '$id_ciu'";

			$this->pdo->query($sql);

			print "<script>alert(\"Registro Eliminado exitosamente. \");window.location='form_ciudad.php';</script>";
		}
		
	}
?>