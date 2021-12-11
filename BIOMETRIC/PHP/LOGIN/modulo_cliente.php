<?php
session_start();

$active_session_cliente=$_SESSION["cliente"];

if ($active_session_cliente!='1') 
{
	header('location: login.php');
}
?>
<!DOCTYPE HTML PUBLIC "">
<html>
<head>
<meta>
<title>Modulo cliente</title>
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
<link rel="stylesheet" href="../formularios/style.css">
</head>

<body>
	<div class="sidebar">
	    <div class="sidebar-brand">
		  <h3><span class="lab la-accusoft"></span> BIOMETRIC-SYSTEM</h3>
		</div>
		<div class="sidebar-menu">
			<ul>
				<li>
					<a href="modulo_admin.php" class="active"><span class="las la-igloo"></span><span>Inicio</span></a>
				</li>
				<li>
					<a href="../formularios/formu_pers.php"><span class="las la-user"></span><span>Registro beneficiarios</span></a>
				</li>
				<li>
					<a href="../formularios/formu_usuario.php"><span class="las la-book"></span><span>Consulta beneficiarios</span></a>
				</li>
				<li>
					<a href="../formularios/formu_cliente.php"><span class="las la-chart-line"></span><span>Actualizar beneficiarios</span></a>
				</li>
				<li>
					<a href="../formularios/formu_ciudad.php"><span class="las la-map"></span><span>consulta de su perfil</span></a>
				</li>
				<li>
					<a href="../formularios/formu_vehiculo.php"><span class="las la-car"></span><span>consulta de Vehiculos asociados</span></a>
				</li>
			</ul>

		</div>

	</div>
	<div class="main-content">
		<header>
			<h2>
				<label for="">
					<span class="las la-bars"></span>
				</label>
				Panel
			</h2>
			<div class="search-wrapper">
				<span class="las la-search"></span>
				<input type="search" placeholder="Buscar aqui"/>
			</div>
			<div class="user-wrapper">
				<img src="../assets/images/jonathan.jpg" width="40px" height="40px" alt="" >
				<div>
					<h4>Jonathan Moreno</h4>
					<small>Cliente</small>
				</div>
			</div>
		</header>
		<main>
			<div class="cards">
				<div class="card-single">
					<h1>BIENVENIDO</h1>
				</div>
			</div>
		</main>
	</div>
</body>
</html>