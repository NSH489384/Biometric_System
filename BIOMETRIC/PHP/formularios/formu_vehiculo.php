<?php
require_once '../crud_bio/model_vehiculo.php';
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
        $update=new Vehiculo();
        $update->Actualizar_vehiculo($_POST["old_placa"], $_POST["new_placa"], $_POST["colorr"],$_POST["estado_veh"], $_POST["fk_tipo_veh"], $_POST["fk_modelo"], $_POST["fk_biometrico"]);

            break;

// CASO PARA METODO REGISTRAR       
        case 'registrar':
        $insert=new Vehiculo();
        $insert->Ingresar_vehiculo($_POST["placaa"], $_POST["colorr"], $_POST["estado_veh"],$_POST["fk_tipo_veh"], $_POST["fk_modelo"], $_POST["fk_biometrico"]);

         break;

// CASO PARA METODO ELIMINAR
         case 'eliminar':
        $delete=new Vehiculo();
        $delete->Eliminar_vehiculo($_GET["PLACA"]);

           break;

// CASO PARA METODO EDITAR
         case'editar':
        $capt = $_GET["PLACA"];
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
					<a href="formu_ciudad.php"><span class="las la-map"></span><span>Registro Ciudad</span></a>
				</li>
				<li>
					<a href="formu_Vehiculo.php" class="active"><span class="las la-car"></span><span>Registro Vehiculo</span></a>
				</li>
				
				<li>
					<a href="formu_modelo_veh.php"><span class="las la-car"></span><span>Registro Modelo de Vehiculo</span></a>
				</li>
				<li>
					<a href="formu_eps.php"><span class="las la-hospital"></span><span>Registro EPS</span></a>
				</li>
					<li>
					<a href="formu_contacto_e.php"><span class="las la-hospital"></span><span>Registro Contacto Emergencia</span></a>
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
					<h1>REGRISTO VEHICULO</h1>
				</div>
			</div>
			<div><br><br><br>

<a href="?action=ver&m=1">Registro Vehiculo</a><br><br>

<!-- Validacion para mostrar formulario de nuevo registro -->
	<?php if( !empty($_GET['m']) )

{?>

<div class="form">
<form class="form" method="post" action="#">
				<h2>NUEVO REGISTRO</h2>
                 <input type="text" name="placaa" placeholder="Ingrese numero de placa">
        	   	   <input type="text" name="colorr" placeholder="Color">
        	   	   
        	   	   <select name="fk_tipo_veh">
                   <?php
                    foreach ($db->query('SELECT ID_TIPO_VEH, DESC_TV FROM tipo_vehiculo') as $row)
                    {
                        echo '<option value="'.$row['ID_TIPO_VEH'].'">'.$row['DESC_TV'].'</option>';
                    }
                   ?>
                   </select><br>
        	   	   <select name="fk_modelo">
                   <?php
                    foreach ($db->query('SELECT ID_MODELO, DES_MODELO FROM modelo_vehiculo') as $row)
                    {
                        echo '<option value="'.$row['ID_MODELO'].'">'.$row['DES_MODELO'].'</option>';
                    }
                   ?>
                   </select><br>
                   <select name="fk_biometrico">
                   <?php
                    foreach ($db->query('SELECT ID_BIOMETRICO FROM biometrico') as $row)
                    {
                        echo '<option value="'.$row['ID_BIOMETRICO'].'">'.$row['ID_BIOMETRICO'].'</option>';
                    }
                   ?>
                   </select><br>
                   <h4>Estado: &nbsp Active <input type="radio" name="estado_veh" value="1" checked>
                   Inactive <input type="radio" name="estado_veh" value="0"><br></h4>
        	   	   <input type="submit" value="Registrar" onclick="this.form.action = '?action=registrar';"/>
        	   	</form>
</div>
<?php } ?> <!-- FIN - Formulario nuevo registro -->


<!-- Validacion para mostrar formulario de Actualizar registro -->
<?php if( !empty($_GET['PLACA']) && !empty($_GET['action']) ){ ?>

<div class="form">	
<form action="#" method="post">

<?php $sql1= "SELECT * FROM `vehiculo`
				WHERE PLACA = '$capt' ";
$query = $db->query($sql1);?>
<?php  while ($row=$query->fetch(PDO::FETCH_ASSOC))
{
    ?>
		<h2>ACTUALIZAR DATOS</h2>
			<input type="text" name="old_placa" value="<?php echo $row["PLACA"]; ?>" style='display: none'>
			<input type="text" name="new_placa" value="<?php echo $row["PLACA"]; ?>" placeholder="Numero Placa" required>
			<input type="text" name="colorr" value="<?php echo $row["COLOR"]; ?>" placeholder="Numero Placa" required>
                 
                 <select name="fk_tipo_veh">
                   <?php
                    foreach ($db->query('SELECT ID_TIPO_VEH, DESC_TV FROM tipo_vehiculo') as $row)
                    {
                        echo '<option value="'.$row['ID_TIPO_VEH'].'">'.$row['DESC_TV'].'</option>';
                    }
                   ?>
                   </select><br>
                 <select name="fk_modelo">
                   <?php
                    foreach ($db->query('SELECT ID_MODELO, DES_MODELO FROM modelo_vehiculo') as $row)
                    {
                        echo '<option value="'.$row['ID_MODELO'].'">'.$row['DES_MODELO'].'</option>';
                    }
                   ?>
                   </select><br>
                   <select name="fk_biometrico">
                   <?php
                    foreach ($db->query('SELECT ID_BIOMETRICO FROM biometrico') as $row)
                    {
                        echo '<option value="'.$row['ID_BIOMETRICO'].'">'.$row['ID_BIOMETRICO'].'</option>';
                    }
                   ?>
                   </select><br>
                   <h4>Estado: &nbsp Active <input type="radio" name="estado_veh" value="1" checked>
                   Inactive <input type="radio" name="estado_veh" value="0"><br></h4>
			<p><input class="submit-button" type="submit" value= "Actualizar" onclick= "this.form.action = '?action=actualizar';"/>
</form>
</div>
<?php  }} // Fin Validacion para mostrar formulario de Actualizar registro
$sql1= "SELECT PLACA,COLOR,ESTADO_VEHI,FK_TIPO_VEHICULO,FK_MODELO,FK_BIOMETRICO,DESC_TV,DES_MODELO FROM vehiculo
        JOIN tipo_vehiculo ON ID_TIPO_VEH = FK_TIPO_VEHICULO
        JOIN modelo_vehiculo ON ID_MODELO = FK_MODELO";
$query = $db->query($sql1);

if($query->rowCount()>0):?>
<br><h1>Consulta de Vehiculos</h1><br>
<table class="table">
	<thead>
		<tr>
			<th class="th">Placa</th>
			<th>Color</th>
			<th>Estado</th>
			<th>Tipo Vehiculo</th>
			<th>Modelo</th>
			<th>Biometrico</th>
      <th>Actualizar</th>
      <th>Eliminar</th>
		</tr>
	</thead>


<?php while ($row=$query->fetch(PDO::FETCH_ASSOC)): ?>
<tr class="tr">
	<td class="td"><?php echo $row['PLACA']; ?></td>
	<td class="td"><?php echo $row['COLOR']; ?></td>
	<td class="estado" class="td"><?php echo $row['ESTADO_VEHI']; ?></td>
	<td class="td"><?php echo $row['DESC_TV']; ?></td>
	<td class="td"><?php echo $row['DES_MODELO']; ?></td>
	<td class="td"><?php echo $row['FK_BIOMETRICO']; ?></td>
<td class="td">
	<a href="?action=editar&PLACA=<?php echo $row["PLACA"];?>">Actualizar</a>
</td> 
	<td class="td"> 
	 <a href="?action=eliminar&PLACA=<?php echo $row["PLACA"];?>" onclick="return confirm('¿Esta seguro de eliminar este Vehiculo?')">Eliminar</a>
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