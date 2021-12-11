<?php
session_start();

$active_session_admin=$_SESSION["admin"];

if ($active_session_admin!='1') 
{
	header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
	<title>modulo_admin</title>
</head>
<body>
	<footer class="container-fluid pt-5">
	<div class="container-fluid pt-3">
        <nav class="navbar navbar-dark bg-dark">
        	<a class="navbar-brand" href="#" >
            <img src="../assets/images/logo12.jpg" width="50" height="50" class="d-inline-block align-top" alt="">   
            𝑩𝒊𝒐𝒎𝒆𝒕𝒓𝒊𝒄-𝒔𝒚𝒔𝒕𝒆𝒎~𝑩𝒊𝒆𝒏𝒗𝒆𝒏𝒊𝒅𝒐 𝒂𝒅𝒎𝒊𝒏𝒊𝒔𝒕𝒓𝒂𝒅𝒐𝒓 
            <STRONG><?php echo "Nombres: " , $_SESSION["PRIMER_NOMBRE"];?></STRONG> 
            <STRONG><?php echo $_SESSION["PRIMER_APELLIDO"];?></STRONG>
            <STRONG><?php echo "correo: " , $_SESSION["CORREO_USUARIO"];?></STRONG>
            </a>
            <span class="glyphicon glyphicon-align-left"></span>
            <div>
            	<a href="saliradmin.php" class="btn btn-success ml-2">CIERRE SESSION</a>
            </div>
        </nav>
    </div>
        <div class="container">
        	<p><a class="btn btn-warning" href="../formularios/form_pers.php" target="mainframe"><h4>Registro persona</h4></a></p><br><br>
        	<a class="btn btn-primary btn-xs" href="../formularios/form_pers.php"><h4>Registro cliente</h4></a><br><br>
        	<a class="btn btn-primary btn-xs" href="../formularios/form_ciudad.php"><h4>Registro usuario</h4></a><br><br>
        	<a class="btn btn-primary btn-xs" href="../formularios/form_pers.php"><h4>Registro vehiculo</h4></a><br><br>
        	<a class="btn btn-primary btn-xs" href="../formularios/form_ciudad.php"><h4>Registro ciudad</h4></a><br><br>
        	<a class="btn btn-primary btn-xs" href="../formularios/form_pers.php"><h4>Registro biometrico</h4></a><br><br>
        	<a class="btn btn-primary btn-xs" href="../formularios/form_eps.php"><h4>Registro EPS</h4></a>
        	   </div>
            <h2 class="logo text-center">BIOMETRIC-SYSTEM</h2>
            <nav class="nav nav-fill mx-auto mt-5">
                <li class="nav-item">
                    <a class="nav-link" href="https://facebook.com/fh5co" target="_blank"><i
                            class="fab fa-facebook-f"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://facebook.com/fh5co" target="_blank"><i
                            class="fab fa-twitter"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fab fa-instagram"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fab fa-google-plus-g"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-rss"></i></a>
                </li>
            </nav>

        </div>

        <div class="copyright mt-4">
            <p class="text-center">&copy; 2020 <a href="#" class="text-white">BIOMETRIC-SYSTEM</a>. Todos los derechos reservados. Diseñado
                por <a href="https://freehtml5.co/shahala" target="_blank" class="text-white">biometric-system.co</a>.</p>
        </div>

</footer>
</body>
</html>