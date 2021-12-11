<!DOCTYPE html>
<html>
<head>
	<title>Recuperar Contraseña</title>
</head>
<body>
<?php
class recu_pass
{
	public function recuperar($tdoc, $user, $email)
	{
		session_start();
		require_once '../conexion.php';
		$db = conexion::conectar();
		$cont=0;

		$sql2="SELECT * FROM usuario 
		WHERE (NUMERO_DOC = '$user') and CORREO_USUARIO = '$email' and TD_USUARIO = '$tdoc'";
		$result2 = $db->query($sql2);

		while ($row2=$result2->fetch(PDO::FETCH_ASSOC))
	{
		$uuser=stripslashes($row2["NUMERO_DOC"]);
		$cont=$cont+1;
	}
		if ($cont==0) { 
			print"<script>alert(\"Datos incorrectos.\");window.location='index_recup.php';</script>";
		}
		if ($cont!=0) 
	{
	$password='temp123';
	$sql1="UPDATE usuario SET CONTRASEÑA = '$password' WHERE NUMERO_DOC = '$user' AND TD_USUARIO = '$tdoc'";
	$db->query($sql1);
	$mensaje= "su contraseña nueva es la siguente: ". $password;
	$asunto= "CAMBIO DE CONTRASEÑA";
	$header ="From: biometric-system@outlook.com" . "\r\n";
	$header.="Reply-To: noreplay@outlook.com" . "\r\n";
	$header.="X-Mailer: PHP/" . phpversion();
	$mail=mail($email,$asunto,$mensaje,$header);
	if ($mail) {
		print"<script>alert(\"email enviado exitosamente!.\");window.location='index.php';</script>";
}
		}
	}
}
$nuevo=new recu_pass ();
$nuevo->recuperar($_POST['tdoc'],$_POST['user'],$_POST['email']);
?>
</body>
</html>