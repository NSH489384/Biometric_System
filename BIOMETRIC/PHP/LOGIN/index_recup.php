<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
	<title>recuperacion de password</title>
</head>
<body>
	<?php
	require_once '../conexion.php';
	$db = conexion::conectar();
	?>
<footer class="container-fluid pt-5">
	<form method="post" action="recuperar.php">
		<h1>Recuperacion password </h1>
		<select name="tdoc">
		<?php
		foreach ($db->query("SELECT ID_TIPO_DOC, DES_TD, ESTADO_TD FROM tipo_documento WHERE ESTADO_TD=1") as $row)
		{
			echo '<option value="' , $row["ID_TIPO_DOC"] , '">' , $row["DES_TD"] , '</option>';
		}
		?>
	    </select>
		

	</form>

        <div class="container">
        	   <br><br><br><br><br> <br><br><br><br>
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