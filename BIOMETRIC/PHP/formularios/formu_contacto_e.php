<?php 
require_once '../crud_bio/model_contacto_e.php';
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
        $update=new Contacto_emergencia();
        $update->Actualizar_contacto_e($_POST["new_idd"],$_POST["old_idd"], $_POST["old_tdoc"],$_POST["estado_ce"],$_POST["parentesco_ce"]);
            break;

// CASO PARA METODO REGISTRAR       
        case 'registrar':
        $insert=new Contacto_emergencia();
        $insert->Ingresar_contacto_e($_POST["id_contacto_e"],$_POST["tdoc_contacto"], $_POST["estado_ce"],$_POST["parentesco_ce"]);

         break;

// CASO PARA METODO ELIMINAR
        case 'eliminar':
        $delete=new Contacto_emergencia();
        $delete->Eliminar_contacto_e($_GET["ID_CONTACTO"]);

           break;

// CASO PARA METODO EDITAR
         case'editar':
        $capt = $_GET["ID_CONTACTO"];
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
					<a href="formu_Vehiculo.php"><span class="las la-car"></span><span>Registro Vehiculo</span></a>
				</li>
				<li>
					<a href="formu_modelo_veh.php"><span class="las la-car"></span><span>Registro Modelo de Vehiculo</span></a>
				</li>
				<li>
					<a href="formu_eps.php"><span class="las la-hospital"></span><span>Registro EPS</span></a>
				</li>
					<li>
					<a href="formu_contacto_e.php" class="active"><span class="las la-hospital"></span><span>Registro Contacto Emergencia</span></a>
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
					<h1>REGRISTO CONTACTO EMERGENCIA</h1>
				</div>
			</div>
			<div><br><br><br>

<a href="?action=ver&m=1">Registro Contacto Emergencia</a><br><br>

<!-- Validacion para mostrar formulario de nuevo registro -->
	<?php if( !empty($_GET['m']) and !empty($_GET['action'])  )

{?>

<div class="form">
                <form method="post" action="#">
				<h2>NUEVO REGISTRO</h2>
				<select name="tdoc_contacto">
                   <?php
                    foreach ($db->query('SELECT ID_TIPO_DOC, DES_TD FROM tipo_documento') as $row)
                    {
                        echo '<option value="'.$row['ID_TIPO_DOC'].'">'.$row['DES_TD'].'</option>';
                    }
                   ?>
                   </select><br>
                   <input type="number" name="id_contacto_e" placeholder="Ingrese numero de id">
                   <label>Estado: </label><br><br>
           		   <label>Active</label><input type="radio" name="estado_ce" value="1"<?php echo $row['ESTADO_CONTACTO'] === '1' ? 'checked' : ''?>  >
            	  <label>Inactive</label><input type="radio" name="estado_ce" value="0"<?php echo $row['ESTADO_CONTACTO'] === '0' ? 'checked' : ''?>  >
                   <select name="parentesco_ce">
                   <?php
                    foreach ($db->query('SELECT ID_PARENTESCO, DES_PARENTESCO FROM parentesco') as $row)
                    {
                        echo '<option value="'.$row['ID_PARENTESCO'].'">'.$row['DES_PARENTESCO'].'</option>';
                    }
                   ?>
                   </select><br>
        	   	   <input type="submit" value="Registrar" onclick="this.form.action = '?action=registrar';"/>	
        	   	</form>
</div>
<?php } ?> <!-- FIN - Formulario nuevo registro -->


<!-- Validacion para mostrar formulario de Actualizar registro -->
<?php if( !empty($_GET['ID_CONTACTO']) && !empty($_GET['action']) ){ ?>

<div class="form">	
<form action="#" method="post">

<?php $sql1= "SELECT * FROM `contacto_emergencia`
				WHERE ID_CONTACTO = '$capt'";
$query = $db->query($sql1);?>
<?php  while ($row=$query->fetch(PDO::FETCH_ASSOC))
{
    ?>
		<h2>ACTUALIZAR DATOS</h2>
        <input type="text" name="old_idd" value="<?php echo $row["ID_CONTACTO"]; ?>" style='display: none'>
		<input type="text" name="new_idd" value="<?php echo $row["ID_CONTACTO"]; ?>" placeholder="Numero de ID" required>
		<select name="old_tdoc">
                   <?php
                    foreach ($db->query('SELECT ID_TIPO_DOC, DES_TD FROM tipo_documento') as $row)
                    {
                        echo '<option value="'.$row['ID_TIPO_DOC'].'">'.$row['DES_TD'].'</option>';
                    }
                   ?>	
        </select><br>
            <label>Estado: </label><br>
                   Active <input type="radio" name="estado_ce" value="1" checked>
                   Inactive <input type="radio" name="estado_ce" value="0"><br>

            <select name="parentesco_ce">
                   <?php
                    foreach ($db->query('SELECT ID_PARENTESCO, DES_PARENTESCO FROM parentesco') as $row)
                    {
                        echo '<option value="'.$row['ID_PARENTESCO'].'">'.$row['DES_PARENTESCO'].'</option>';
                    }
                   ?>
                   </select><br>
			<p><input class="submit-button" type="submit" value= "Actualizar" onclick= "this.form.action = '?action=actualizar';"/>
</form>
</div>
<?php  }} // Fin Validacion para mostrar formulario de Actualizar registro
$sql1= "SELECT * FROM contacto_emergencia";
$query = $db->query($sql1);

if($query->rowCount()>0):?>
<br><h1>Consulta de Contacto Emergencia</h1><br>
<table class="table">
	<thead>
		<tr>
			<th class="th">Id Contacto</th>
			<th>Tipo Documento</th>
			<th>Estado</th>
			<th>Parentesco</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
		</tr>
	</thead>


<?php while ($row=$query->fetch(PDO::FETCH_ASSOC)): ?>
<tr class="tr">
	<td class="td"><?php echo $row['ID_CONTACTO']; ?></td>
	<td class="td"><?php echo $row['TD_CONTACTO']; ?></td>
	<td class="td"><?php echo $row['ESTADO_CONTACTO']; ?></td>
	<td class="td"><?php echo $row['ID_PARENTESCO_C']; ?></td>
<td class="td">
	<a href="?action=editar&ID_CONTACTO=<?php echo $row["ID_CONTACTO"];?>">Actualizar</a>
</td> 
	<td class="td"> 
	 <a href="?action=eliminar&ID_CONTACTO=<?php echo $row["ID_CONTACTO"];?>" onclick="return confirm('¿Esta seguro de eliminar este Contacto de Emergencia?')">Eliminar</a>
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