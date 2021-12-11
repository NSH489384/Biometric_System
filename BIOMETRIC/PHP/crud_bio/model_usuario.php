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

		public function Ingresar_usuario($id_usuario, $tdoc_usuario, $contraseña_usuario, $correo_usuario,$estado_usuario)
		{
	
				$sql = "INSERT INTO usuario (NUMERO_DOC, TD_USUARIO, CONTRASEÑA, CORREO_USUARIO, ESTADO_USUARIO)
                VALUES('$id_usuario', '$tdoc_usuario', '$contraseña_usuario', '$correo_usuario','$estado_usuario');";

			$this->pdo->query($sql);

			print "<script>alert(\"Usuario agregado exitosamente. \");window.location='formu_usuario.php';</script>";
		}

		public function Actualizar_usuario($old_numero_usuario,$contraseña_usuario,$correo_usuario,$estado_usuario)
		{

			$sql = "UPDATE usuario SET  CONTRASEÑA = '$contraseña_usuario', CORREO_USUARIO ='$correo_usuario', ESTADO_USUARIO ='$estado_usuario'
				WHERE NUMERO_DOC = '$old_numero_usuario';";

			$this->pdo->query($sql);

			print "<script>alert(\"Usuario Actualizado exitosamente. \");window.location='formu_usuario.php';</script>";
		}

		public function Eliminar_usuario($id_usuarioo)
		{

			$sql = "DELETE FROM usuario WHERE NUMERO_DOC = '$id_usuarioo'";

			$this->pdo->query($sql);

			print "<script>alert(\"Usuario Eliminado exitosamente. \");window.location='formu_usuario.php';</script>";
		}
		
	}
?>