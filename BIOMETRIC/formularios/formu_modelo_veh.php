<?php 
require_once '../crud_bio/model_modelo_veh.php';
require_once '../conexion.php';
    $db = conexion::conectar();   
    ?>
<?php
// INICIO DE VALIDACION Y SELECCION DE CASOS A REALIZAR INSERT - UPDATE - DELETE - SELECT
if(isset($_REQUEST['action']))
{   switch ($_REQUEST['action']) 
    {   

// CASO PARA METODO ACTUALIZAR
        case 'actualizar':
        $update=new Modelo_Vehiculo();
        $update->Actualizar_modelo($_POST["old_idd"], $_POST["new_idd"], $_POST["nom_modelo"],$_POST["estado_modelo"]);

            break;

// CASO PARA METODO REGISTRAR       
        case 'registrar':
        $insert=new Modelo_Vehiculo();
        $insert->Ingresar_modelo($_POST["id_modelo"],$_POST["nom_modelo"], $_POST["estado_modelo"]);

         break;

// CASO PARA METODO ELIMINAR
        case 'eliminar':
        $delete=new Modelo_Vehiculo();
        $delete->Eliminar_modelo($_GET["ID_MODELO"]);

           break;

// CASO PARA METODO EDITAR
         case'editar':
        $capt = $_GET["ID_MODELO"];
         break;
     }
}
// FIN SECCION DE CASOS

?>

<!DOCTYPE HTML PUBLIC "">
<html>
<head>
<meta>
<title>Modulo admin</title>
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
<link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="sidebar">
	    <div class="sidebar-brand">
		  <h3><span class="lab la-accusoft"></span> BIOMETRIC-SYSTEM</h3>
		</div>
		<div class="sidebar-menu">
			<ul>
				<li>
					<a href="../LOGIN/modulo_admin.php"><span class="las la-igloo"></span><span>Inicio</span></a>
				</li>
				<li>
					<a href="formu_Pers.php"><span class="las la-user"></span><span>Registro Persona</span></a>
				</li>
				<li>
					<a href="formu_Usuario.php"><span class="las la-book"></span><span>Registro Usuario</span></a>
				</li>
				<li>
					<a href="formu_cliente.php"><span class="las la-chart-line""></span><span>Registro Cliente</span></a>
				</li>
				<li>
					<a href="formu_ciudad.php" class="active"><span class="las la-map"></span><span>Registro Ciudad</span></a>
				</li>
				<li>
					<a href="formu_Vehiculo.php"><span class="las la-car"></span><span>registro Vehiculo</span></a>
				</li>
				<li>
					<a href="formu_modelo_veh.php"><span class="las la-car"></span><span>registro modelo de vehiculo</span></a>
				</li>
				<li>
					<a href="formu_EPS.php"><span class="las la-hospital"></span><span>registro EPS</span></a>
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
			<div class="cards">
				<div class="card-single">
					<h1>REGRISTO MODELO VEHICULO</h1>
				</div>
			</div>
			<div><br><br><br>

<a href="?action=ver&m=1">Registro Modelo Vehiculo</a><br><br>

<!-- Validacion para mostrar formulario de nuevo registro -->
	<?php if( !empty($_GET['m']) and !empty($_GET['action'])  )

{?>

<div class="form">
                <form method="post" action="#">
				<h2>NUEVO REGISTRO</h2>
                   <input type="number" name="id_modelo" placeholder="Ingrese numero de id">
        	   	   <input type="text" name="nom_modelo" placeholder="Eps"><br>
        	   	   <label>Estado: </label><br>
                   Active <input type="radio" name="estado_modelo" value="1" checked>
                   Inactive <input type="radio" name="estado_modelo" value="0"><br>
        	   	   <input type="submit" value="Registrar" onclick="this.form.action = '?action=registrar';"/>	
        	   	</form>
</div>
<?php } ?> <!-- FIN - Formulario nuevo registro -->


<!-- Validacion para mostrar formulario de Actualizar registro -->
<?php if( !empty($_GET['ID_MODELO']) && !empty($_GET['action']) ){ ?>

<div class="form">	
<form action="#" method="post">

<?php $sql1= "SELECT * FROM `modelo_vehiculo`
				WHERE ID_MODELO = '$capt'";
$query = $db->query($sql1);?>
<?php  while ($row=$query->fetch(PDO::FETCH_ASSOC))
{
    ?>
		<h2>ACTUALIZAR DATOS</h2>
			<input type="text" name="old_idd" value="<?php echo $row["ID_MODELO"]; ?>" style='display: none'>
			<input type="text" name="new_idd" value="<?php echo $row["ID_MODELO"]; ?>" placeholder="Numero de ID" required>
			<input type="text" name="nom_modelo" value="<?php echo $row["DES_MODELO"]; ?>"placeholder="Modelo Vehiculo">
            <label>Estado: </label><br><br>
            <label>Active</label><input type="radio" name="estado_modelo" value="1"<?php echo $row['ESTADO_MODELO'] === '1' ? 'checked' : ''?>  >
            <label>Inactive</label><input type="radio" name="estado_modelo" value="0"<?php echo $row['ESTADO_MODELO'] === '0' ? 'checked' : ''?>  >
			<p><input class="submit-button" type="submit" value= "Actualizar" onclick= "this.form.action = '?action=actualizar';"/>


</form>
</div>
<?php  }} // Fin Validacion para mostrar formulario de Actualizar registro
$sql1= "SELECT * FROM modelo_vehiculo";
$query = $db->query($sql1);

if($query->rowCount()>0):?>
<br><h1>Consulta de Modelo Vehiculo</h1><br>
<table class="table">
	<thead>
		<tr>
			<th class="th">Id Modelo Vehiculo</th>
			<th>Modelo Vehiculo</th>
			<th>Estado</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
		</tr>
	</thead>


<?php while ($row=$query->fetch(PDO::FETCH_ASSOC)): ?>
<tr class="tr">
	<td class="td"><?php echo $row['ID_MODELO']; ?></td>
	<td class="td"><?php echo $row['DES_MODELO']; ?></td>
	<td class="td"><?php echo $row['ESTADO_MODELO']; ?></td>
<td class="td">
	<a href="?action=editar&ID_MODELO=<?php echo $row["ID_MODELO"];?>">Actualizar</a>
</td> 
	<td class="td"> 
	 <a href="?action=eliminar&ID_MODELO=<?php echo $row["ID_MODELO"];?>" onclick="return confirm('¿Esta seguro de eliminar este Modelo Vehiculo?')">Eliminar</a>
</td>

</tr>
<?php endwhile;?>

</table>

<?php else:?>
	<h4 class="alert alert-danger">Señor usuario no hay registros encontrados</h4>
<?php endif;?>
</div>
		</main>
	</div>
</body>
</html>