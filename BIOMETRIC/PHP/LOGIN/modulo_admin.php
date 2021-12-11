<?php
session_start();

$active_session_admin=$_SESSION["admin"];

if ($active_session_admin!='1') 
{
	header('location: login.php');
}
?>
<!DOCTYPE HTML PUBLIC "">
<html>
<head>
<meta>
<title>Modulo admin</title>
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
					<a href="../formularios/formu_pers.php"><span class="las la-user"></span><span>Registro Persona</span></a>
				</li>
				<li>
					<a href="../formularios/formu_usuario.php"><span class="las la-book"></span><span>Registro Usuario</span></a>
				</li>
				<li>
					<a href="../formularios/formu_cliente.php"><span class="las la-chart-line"></span><span>Registro Cliente</span></a>
				</li>
				<li>
					<a href="../formularios/formu_ciudad.php"><span class="las la-map"></span><span>Registro Ciudad</span></a>
				</li>
				<li>
					<a href="../formularios/formu_vehiculo.php"><span class="las la-car"></span><span>Registro Vehiculo</span></a>
				</li>
				<li>
					<a href="../formularios/formu_tipo_vehiculo.php"><span class="las la-car"></span><span>Registro Tipo Vehiculo</span></a>
				</li>
				<li>
					<a href="../formularios/formu_modelo_veh.php"><span class="las la-car"></span><span>Registro Modelo Vehiculo</span></a>
				</li>
				<li>
					<a href="../formularios/formu_eps.php"><span class="las la-hospital"></span><span>Registro EPS</span></a>
				</li>
				<li>
					<a href="../formularios/formu_contacto_e.php"><span class="las la-hospital"></span><span>Registro Contacto Emergencia</span></a>
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
				<img src="../assets/images/liseth.jpg" width="40px" height="40px" alt="" >
				<div>
					<h4>Liseth Rojas</h4>
					<small>Administrador</small>
				</div>
			</div>
		</header>
		<main>
			<div class="manual">
				<div>
					<h1 class="bien">BIENVENIDO</h1>
				</div>
				<div>
					<h3>Descarga de manuales</h3><br>
					<a href="../Manual_tecnico.pdf">Manual tecnico</a>
					<a href="../Manual_de_Operacion.pdf">Manual de Operaciones</a>
				</div>
			</div>
		</main>
	</div>
</body>
</html>