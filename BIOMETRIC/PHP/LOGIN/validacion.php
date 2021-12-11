<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>validacion_login</title>
</head>
<body>
<?php

class login
{
	public function Login_user($user, $pass, $tdoc)

{
	session_start();

	require_once '../conexion.php';
	$db = conexion::conectar();

	$cont=0;

	$sql2="SELECT * FROM usuario 
    WHERE (NUMERO_DOC = '$user') and CONTRASEÑA = '$pass' and TD_USUARIO = '$tdoc'";
	$result2 = $db->query($sql2);

	while ($row2=$result2->fetch(PDO::FETCH_ASSOC))
	{
		$uusername=stripslashes($row2["NUMERO_DOC"]);
		$ppassword=stripslashes($row2["CONTRASEÑA"]);
		$tdoc=stripslashes($row2["TD_USUARIO"]);
		$us_correo=stripslashes($row2["CORREO_USUARIO"]);
		//$nombre=stripslashes($row2["PRIMER_NOMBRE"]);
		//$apellido=stripslashes($row2["PRIMER_APELLIDO"]);
		$cont=$cont+1;
	}


	if ($cont==0)
	{
		print"<script>alert(\"usuario y/o contraseña incorrectas.\");window.location='login.php';</script>";
	}
	if ($cont!=0)
	{
		$_SESSION["NUMERO_DOC"]=$uusername;
		$_SESSION["DESC_ROL"]=$rol;

		$sql1= "SELECT ROL_ID_ROL FROM rol_usuario 
                JOIN usuario ON ID_USUARIO = ROL_ID_ROL
                WHERE USUARIO_NUMERO_DOC='$uusername'";
		$result1 = $db->query($sql1);

		while ($row1=$result1->fetch(PDO::FETCH_ASSOC)) 
		{
		    $role=stripslashes($row1["ROL_ID_ROL"]);
		}
		if ($role===null) 
		{
			print "<script>alert(\"el usuario no tiene asignado rol.\");window.location='login.php'</script>";
		}
		if ($role==='2')
		{
			$_SESSION['cliente']=1;
			header("location: modulo_cliente.php");
		}
		if ($role==='1')
		{
			$_SESSION['admin']=1;
			header("location: modulo_admin.php");
		}
	}
}
}
$nuevo=new login();
$nuevo->Login_user($_POST['user'],$_POST['pass'],$_POST['tdoc']);
?>



</body>
</html>