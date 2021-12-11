<?php 
	class Vehiculo  
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

		public function Ingresar_vehiculo($placaa, $colorr, $estado_veh,$fk_tipo_veh,$fk_modelo,$fk_biometrico)
		{
				$sql = "INSERT INTO vehiculo (PLACA,COLOR,ESTADO_VEHI,FK_TIPO_VEHICULO,FK_MODELO,FK_BIOMETRICO)
                VALUES('$placaa','$colorr','$estado_veh', '$fk_tipo_veh', '$fk_modelo','$fk_biometrico');";


			$this->pdo->query($sql);

			print "<script>alert(\"Vehiculo agregado exitosamente. \");window.location='formu_vehiculo.php';</script>";
		}

		public function Actualizar_vehiculo($old_placa, $new_placa, $colorr, $estado_veh,$fk_tipo_veh,$fk_modelo,$fk_biometrico)
		{ 

			$sql = "UPDATE vehiculo SET PLACA = '$new_placa', COLOR = '$colorr', ESTADO_VEHI = '$estado_veh', FK_TIPO_VEHICULO = '$fk_tipo_veh', FK_MODELO = '$fk_modelo', FK_BIOMETRICO = '$fk_biometrico'
				WHERE PLACA = '$old_placa';";

			$this->pdo->query($sql);

			print "<script>alert(\"Vehiculo Actualizado exitosamente. \");window.location='formu_vehiculo.php';</script>";
		}

		public function Eliminar_vehiculo($placaaa)
		{

			$sql = "DELETE FROM vehiculo WHERE PLACA = '$placaaa'";

			$this->pdo->query($sql);

			print "<script>alert(\"Vehiculo Eliminado exitosamente. \");window.location='formu_vehiculo.php';</script>";
		}
		
	}
?>