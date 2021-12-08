<!DOCTYPE html>
<html>
<head>
	<title>validacion_password</title>
</head>
<body>
<?php
class recu_pass
{
	public function recuperar($tdoc, $iduser)
	{
		session_start();
		require_once '../conexion.php';
		$db = conexion::conectar();

		$sql2="SELECT * FROM usuario WHERE NUMERO_DOC='$iduser" AND 
	}
}
</body>
</html>