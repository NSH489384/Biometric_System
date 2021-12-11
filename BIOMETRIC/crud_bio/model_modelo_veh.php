<?php  
	class Modelo_Vehiculo
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
 
		public function Ingresar_modelo($id_modelo, $des_modelo, $estado_modelo)
		{
	
				$sql = "INSERT INTO modelo_vehiculo(ID_MODELO,DES_MODELO,ESTADO_MODELO)
                VALUES('$id_modelo','$des_modelo','$estado_modelo');";

			$this->pdo->query($sql);

			print "<script>alert(\"Modelo Vehiculo agregado exitosamente. \");window.location='formu_modelo_veh.php';</script>";
		}

		public function Actualizar_modelo($old_model, $new_model, $des_model, $estado_model)
		{

			$sql = "UPDATE modelo_vehiculo SET ID_MODELO = '$new_model', DES_MODELO = '$des_model', ESTADO_MODELO = '$estado_model'
					WHERE ID_MODELO = '$old_model';";

			$this->pdo->query($sql);

			print "<script>alert(\"Modelo Vehiculo Actualizado exitosamente. \");window.location='formu_modelo_veh.php';</script>";
		}

		public function Eliminar_modelo($modeloo)
		{

			$sql = "DELETE FROM modelo_vehiculo WHERE ID_MODELO = '$modeloo'";

			$this->pdo->query($sql);

			print "<script>alert(\"Modelo Vehiculo Eliminado exitosamente. \");window.location='formu_modelo_veh.php';</script>";
		}
		
	}
?>