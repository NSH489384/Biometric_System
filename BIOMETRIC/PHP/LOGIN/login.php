<!DOCTYPE html>
<html lang="">
<head>
	    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">

	<title>Inicio login</title>
</head>
<body>
	<header class="mt-0 pt-0">
        <div class="bg-cover clearfix pt-3">
            <h2 class="logo">BIOMETRIC-SYSTEM</h2>
            <nav class="nav nav-fill mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="https://facebook.com/fh5co" target="_blank"><i
                            class="fab fa-facebook-f"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://twitter.com/fh5co" target="_blank"><i
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
            <input type="text" id="nav-search" class="nav-search mx-auto" name="" class="form-control">
            <div class="ml-0 mr-0 pb-1">
                <nav class="navbar navbar-expand-md">

                    <button class="navbar-toggler ml-auto" data-target="#my-nav" data-toggle="collapse"
                        aria-controls="my-nav" aria-expanded="false" onclick="myFunction(this)"
                        aria-label="Toggle navigation">
                        <span class="bar1"></span> <span class="bar2"></span> <span class="bar3"></span>
                    </button>
                    <div id="my-nav" class="collapse navbar-collapse">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="article.html">NUEVO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="article.html">HISTORIA</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">CULTURA</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">CONTACTANOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">OPINION</a>
                            </li>
                            <li class="nav-item">
                                <form action="" method="POST">
                                    <div class="input-group mt-0 mx-auto" style="width:16px;">

                                        <div class="">
                                            <img src="../assets/images/search-icon.png" id="toggle-search"
                                                class="ml-2 toggle-search" alt="search icon">
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
<div><br><br><br>

	<h1 style="color: white">LOGIN</h1>

	<form method="post" action="validacion.php">
        <label style="color: white" >Tipo documento</label><br>
        <select name="tdoc">
            <option value="CC">cedula ciudadania</option> 
            <option value="TI" >Tarjeta de identidad</option>
            <option value="CE">Cedula de extrangeria</option>
        </select><br>		
        <label style="color: white">NUMERO DOCUMENTO</label>
		<p><input type="number" placeholder="Numero documento" name="user" required></p>
		<label style="color: white">Contraseña</label><br>
		<input type="password" placeholder="Contraseña" name="pass" required><br>
		<br><input type="submit" value="ingresar">
		<input type="submit" value="registrase">
		<p><a href="recu_pass.php">Olvide mi Contraseña</a></p>

	</form><br><br><br><br>





</div>

</body>
</html>