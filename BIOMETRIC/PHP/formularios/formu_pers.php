<?php 
require_once '../crud_bio/model_pers.php';
require_once '../conexion.php';
    $db = conexion::conectar();
    ?>
<?php
// INICIO DE VALIDACION Y SELECCION DE CASOS A REALIZAR INSERT - UPDATE - DELETE - SELECT
if(isset($_REQUEST['action']))
{ 	switch ($_REQUEST['action']) 
	{ 	

// CASO PARA METODO ACTUALIZAR
		case 'actualizar':
		$update=new Persona();
        $update->Actualizar_persona($_POST["old_user"], $_POST["new_user"] ,$_POST["ttdoc"], $_POST["nnombre"], $_POST["nnombree"], $_POST["aapel"], $_POST["aapell"], $_POST["ttel"]);

            break;

// CASO PARA METODO REGISTRAR		
		case 'registrar':
		$insert=new Persona();
        $insert->Nueva_persona($_POST["ttdoc"],$_POST["uuser"], $_POST["nnombre"], $_POST["nnombree"], $_POST["aapel"], $_POST["aapell"], $_POST["ttel"]);

         break;

// CASO PARA METODO ELIMINAR
         case 'eliminar':
        $delete=new Persona();
        $delete->Eliminar_persona($_GET["ID_PERSONA"]);

           break;

// CASO PARA METODO EDITAR
         case'editar':
        $capt = $_GET["ID_PERSONA"];
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
					<a href="formu_Persona.php" class="active"><span class="las la-user"></span><span>Registro Persona</span></a>
				</li>
				<li>
					<a href="formu_Usuario.php"><span class="las la-car"></span><span>Registro Usuario</span></a>
				</li>
				<li>
					<a href="formu_cliente.php"><span class="las la-igloo"></span><span>Registro Cliente</span></a>
				</li>
				<li>
					<a href="formu_ciudad.php"><span class="las la-igloo"></span><span>Registro Ciudad</span></a>
				</li>
				<li>
					<a href="formu_Vehiculo.php"><span class="las la-igloo"></span><span>registro Vehiculo</span></a>
				</li>
				<li>
					<a href="formu_modelo_veh.php"><span class="las la-car"></span><span>registro modelo de vehiculo</span></a>
				</li>
				<li>
					<a href="formu_EPS.php"><span class="las la-igloo"></span><span>registro EPS</span></a>
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
					<h1>REGRISTO PERSONA</h1>
				</div>
			</div>

<div><br><br><br>

<a href="?action=ver&m=1">Registro persona</a><br><br>

<!-- Validacion para mostrar formulario de nuevo registro -->
	<?php if( !empty($_GET['m']) and !empty($_GET['action'])  )

{?>

<div class="container-fluid pt-5">
                <form class="form" method="post" action="#">
				<h2>NUEVO REGISTRO</h2>
                   <select name="ttdoc">
                   <?php
                    foreach ($db->query('SELECT ID_TIPO_DOC, DES_TD FROM tipo_documento') as $row)
                    {
                        echo '<option value="'.$row['ID_TIPO_DOC'].'">'.$row['DES_TD'].'</option>';
                    }
                   ?>
                   </select><br>
                   <input type="number" name="uuser" placeholder="Ingrese numero de cedula">
        	   	   <input type="text" name="nnombre" placeholder="Primer nombre">
        	   	   <input type="text" name="nnombree" placeholder="Segungo nombre">
        	   	   <input type="text" name="aapel" placeholder="Primer apellido">
        	   	   <input type="text" name="aapell" placeholder="Segungo apellido">
        	   	   <input type="number" name="ttel" placeholder="ingrese numero de telefono">
        	   	   <input type="submit" value="Registrar" onclick="this.form.action = '?action=registrar';"/>
        	   	   <a class="a" href="../crud_bio/consul_pers.php">Consultar registros</a>
        	   		
        	   		
        	   	</form>
</div>
<?php } ?> <!-- FIN - Formulario nuevo registro -->


<!-- Validacion para mostrar formulario de Actualizar registro -->
<?php if( !empty($_GET['ID_PERSONA']) && !empty($_GET['action']) ){ ?>

<div>	
<form class="form" action="#" method="post"> 

<?php $sql1= "SELECT * FROM `persona`
				WHERE ID_PERSONA = '$capt'";
$query = $db->query($sql1);?>
		<h2>ACTUALIZAR DATOS</h2>
            <select name="ttdoc">
			       <?php
			        foreach ($db->query('SELECT ID_TIPO_DOC, DES_TD FROM tipo_documento') as $row)
			        {
			            echo '<option value="'.$row['ID_TIPO_DOC'].'">'.$row['DES_TD'].'</option>';
			        }
			       ?>
			</select>
<?php  while ($row=$query->fetch(PDO::FETCH_ASSOC)) 
{
    ?>

			<input type="text" name="old_user" value="<?php echo $row["ID_PERSONA"]; ?>" style='display: none'>
			<input type="text" name="new_user" value="<?php echo $row["ID_PERSONA"]; ?>" placeholder="Numero de documento" required>
			<input type="text" name="nnombre" value="<?php echo $row["PRIMER_NOMBRE"]; ?>" placeholder="Primer nombre">
			<input type="text" name="nnombree" value="<?php echo $row["SEGUNDO_NOMBRE"]; ?>" placeholder="Segungo nombre">
			<input type="text" name="aapel" value="<?php echo $row["PRIMER_APELLIDO"]; ?>" placeholder="Primer apellido">
			<input type="text" name="aapell" value="<?php echo $row["SEGUNDO_APELLIDO"]; ?>" placeholder="Segungo apellido">
			<input type="number" name="ttel" value="<?php echo $row["TELEFONO"]; ?>" placeholder="ingrese numero de telefono">
			<p><input class="submit-button" type="submit" value= "Actualizar" onclick= "this.form.action = '?action=actualizar';"/>


</form>
</div>
<?php  } } // Fin Validacion para mostrar formulario de Actualizar registro

$sql1= "SELECT DES_TD, ID_PERSONA,PRIMER_NOMBRE, SEGUNDO_NOMBRE, PRIMER_APELLIDO, SEGUNDO_APELLIDO, TELEFONO FROM persona
    JOIN tipo_documento ON ID_TIPO_DOC=TD_PERSONA";
$query = $db->query($sql1);

if($query->rowCount()>0):?>
<br><h1>Consulta de las personas registradas</h1><br>
<table class="table">
	<thead>
		<tr>
			<th class="th">Tipo documento</th>
			<th>Numero documento</th>
			<th>Primer nombre</th>
			<th>Segundo nombre</th>
			<th>Primer apellido</th>
			<th>Segundo apellido</th>
			<th>Telefono</th>
			<th>Actualizar</th>
            <th>Eliminar</th>
		</tr>
	</thead>


<?php while ($row=$query->fetch(PDO::FETCH_ASSOC)): ?>
<tr class="tr">
	<td class="td"><?php echo $row['DES_TD']; ?></td>
	<td class="td"><?php echo $row['ID_PERSONA']; ?></td>
	<td class="td"><?php echo $row['PRIMER_NOMBRE']; ?></td>
	<td class="td"><?php echo $row['SEGUNDO_NOMBRE']; ?></td>
	<td class="td"><?php echo $row['PRIMER_APELLIDO']; ?></td>
	<td class="td"><?php echo $row['SEGUNDO_APELLIDO']; ?></td>
	<td class="td"><?php echo $row['TELEFONO']; ?></td>
<td class="td">
	<a href="?action=editar&ID_PERSONA=<?php echo $row["ID_PERSONA"];?>">Actualizar</a>
</td> 
	<td class="td"> 
	 <a href="?action=eliminar&ID_PERSONA=<?php echo $row["ID_PERSONA"];?>" onclick="return confirm('¿Esta seguro de eliminar este Usuario?')">Eliminar</a>
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
