<?php  
	class Usuario
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

		public function Nuevo_usuario($id_usu, $numero_usu, $td_usu, $contraseña_usu, $correo_usu, $estado_usu, $recu_usu,$cambio_usu)
		{
	
				$sql = "INSERT INTO usuario(ID_USUARIO,NUMERO_DOC,TD_USUARIO,CONTRASEÑA,CORREO_USUARIO,ESTADO_USUARIO,RECUPERAR_CONTRASEÑA,CAMBIO_CONTRASEÑA)
                VALUES('$id_usu','$numero_usu','$td_usu','$contraseña_usu','$correo_usu','$estado_usu','$recu_usu','$cambio_usu');";

			$this->pdo->query($sql);

			print "<script>alert(\"Usuario agregado exitosamente. \");window.location='formu_usuario.php';</script>";
		}

		public function Actualizar_usuario($old_usu, $td_usu, $new_usu,$numero_doc_usu, $contraseña_usu, $correo_usu, $estado_usu, $recu_usu, $cambio_usu)
		{

			$sql = "UPDATE usuario SET TD_USUARIO = '$td_usu', ID_USUARIO = '$new_usu', NUMERO_DOC  = '$numero_doc_usu', CONTRASEÑA = '$contraseña_usu', CORREO_USUARIO = '$correo_usu', ESTADO_USUARIO = '$estado_usu', RECUPERAR_CONTRASEÑA = '$recu_usu', CAMBIO_CONTRASEÑA = '$cambio_usu'
				WHERE ID_USUARIO = '$old_usu';";

			$this->pdo->query($sql);

			print "<script>alert(\"Usuario Actualizado exitosamente. \");window.location='formu_usuario.php';</script>";
		}

		public function Eliminar_usuario($userr)
		{

			$sql = "DELETE FROM usuario WHERE ID_USUARIO = '$userr'";

			$this->pdo->query($sql);

			print "<script>alert(\"Usuario Eliminado exitosamente. \");window.location='formu_usuario.php';</script>";
		}
		
	}
?>