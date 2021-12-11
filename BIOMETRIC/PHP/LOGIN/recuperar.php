<!DOCTYPE html>
<html>
<head>
	<title>Recuperar Contraseña</title>
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
		$cont=0;

		$sql2="SELECT * FROM usuario 
		WHERE (NUMERO_DOC = '$user') and CORREO_USUARIO = '$email' and TD_USUARIO = '$tdoc'";
		while ($row2=$result2->fetch(PDO::FETCH_ASSOC))
	{
		$uusername=stripslashes($row2["NUMERO_DOC"]);
		$email=stripslashes($row2["CORREO_USUARIO"]);
		$tdoc=stripslashes($row2["TD_USUARIO"]);
		$cont=$cont+1;
	}
		if ($cont==0)
	    {
			print"<script>alert(\"Datos incorrectos.\");window.location='recuperar.php';</script>";
		}

		if ($cont!=0)
		{
		   if (isset($_POST['enviar']))
		    {
	         if (!empty($_POST['tdoc']) && !empty($_POST['user']) && !empty($_POST['email'])) 
	        {
				$tdocc=$_POST['tdoc'];
				$uuser=$_POST['user'];
				$email=$_POST['email'];
				$mensaje= "su contraseña nueva es la siguente: $password";
				$asunto= "CAMBIO DE CONTRASEÑA";
				$header ="From: biometric-system@outlook.com" . "\r\n";
				$header.="Reply-To: noreplay@outlook.com" . "\r\n";
				$header.="X-Mailer: PHP/" . phpversion();
				$mail=mail($email,$asunto,$mensaje,$header);
				 if ($mail)
				  {
					print"<script>alert(\"email enviado exitosamente!.\");window.location='index.php';</script>";
	              }
	} 
	  }
	  	}
   }	    
}
?>
</body>
</html>