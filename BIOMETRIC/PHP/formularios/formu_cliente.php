<?php 
require_once '../crud_bio/model_cliente.php';
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
        $update=new  Cliente();
        $update->Actualizar_cliente($_POST["old_idd"], $_POST["new_idd"], $_POST["td_cl"],$_POST["direccion_cl"],$_POST["estado_cl"],$_POST["numero_doc_ce"],$_POST["td_contacto"],$_POST["fk_ciudad"],$_POST["fk_eps"]);

            break;

// CASO PARA METODO REGISTRAR       
        case 'registrar':
        $insert=new Cliente();
        $insert->Ingresar_cliente($_POST["uuser"], $_POST["ttdoc"], $_POST["direccion"], $_POST["fk_ciudad"], $_POST["epss"], $_POST["estado_cl"], $_POST["ttdocc"], $_POST["id_contacto_e"]);

         break;

// CASO PARA METODO ELIMINAR
         case 'eliminar':
        $delete=new Cliente();
        $delete->Eliminar_cliente($_GET["ID_CLIENTE"]);

           break;

// CASO PARA METODO EDITAR
         case'editar':
        $capt = $_GET["ID_CLIENTE"];
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
					<a href="formu_cliente.php" class="active"><span class="las la-chart-line""></span><span>Registro Cliente</span></a>
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
					<h1>Formulario Clientes</h1>
				</div>
			</div>
			<div><br><br><br>

 <a href="?action=ver&m=1">Registro cliente</a><br><br>

<!-- Validacion para mostrar formulario de nuevo registro -->
	<?php if( !empty($_GET['m']) )

{?>

<div class="form">
<form class="form" method="post" action="#">

				<h2>NUEVO REGISTRO CLIENTE</h2>
                   <select name="ttdoc">
                   <?php
                    foreach ($db->query('SELECT ID_TIPO_DOC, DES_TD FROM tipo_documento') as $row )
                    {
                        echo '<option value="'.$row['ID_TIPO_DOC'].'">'.$row['DES_TD'].'</option>';
                    }
                   ?>
                   </select><br>
                   <input type="number" name="uuser" placeholder="Ingrese numero de cedula">
        	   	   <input type="text" name="direccion" placeholder="Direccion">
        	   	   
        	   	   <select name="fk_ciudad">
                   <?php
                    foreach ($db->query('SELECT ID_CIUDAD, DES_CIUDAD FROM ciudad') as $row)
                    {
                        echo '<option value="'.$row['ID_CIUDAD'].'">'.$row['DES_CIUDAD'].'</option>';
                    }
                   ?>
                   </select><br>
                   <select name="epss">
                   <?php
                    foreach ($db->query('SELECT ID_EPS, DES_EPS FROM eps') as $row)
                    {
                        echo '<option value="'.$row['ID_EPS'].'">'.$row['DES_EPS'].'</option>';
                    }
                   ?><br>
                   </select><br>

                   &nbsp; &nbsp; <label>Estado: </label> &nbsp;&nbsp;&nbsp;
                   <label>Active </label> <input type="radio" name="estado_cl" value="1" checked> &nbsp;&nbsp;
                   <label>Inactive</label> <input type="radio" name="estado_cl" value="0"><br>
                   <hr>
                   <h2>DATOS CONTACTO EMERGENCIA</h2>
        	   	   <select name="ttdocc">
                   <?php
                    foreach ($db->query('SELECT ID_TIPO_DOC, DES_TD FROM tipo_documento') as $row)
                    {
                        echo '<option value="'.$row['ID_TIPO_DOC'].'">'.$row['DES_TD'].'</option>';
                    }
                   ?>
                   </select><br>
                   <input type="text" name="id_contacto_e" placeholder="numero identificacion">
        	   	   <input type="submit" value="Registrar" onclick="this.form.action = '?action=registrar';"/>
        	   		
        	   		
        	   	</form>
</div>
<?php } ?> <!-- FIN - Formulario nuevo registro -->


<!-- Validacion para mostrar formulario de Actualizar registro -->
<?php if( !empty($_GET['ID_CLIENTE']) && !empty($_GET['action']) ){ ?>

<div class="form">	
<form action="#" method="post">

<?php $sql1= "SELECT * FROM `cliente`
				WHERE ID_CLIENTE = '$capt' ";
$query = $db->query($sql1);?>
<?php  while ($row=$query->fetch(PDO::FETCH_ASSOC))
{
    ?>
		<h2>ACTUALIZAR DATOS</h2>
		<input type="text" name="old_idd" value="<?php echo $row["ID_CLIENTE"]; ?>" style='display: none'>
		<input type="text" name="new_idd" value="<?php echo $row["ID_CLIENTE"]; ?>" placeholder="Numero de ID" required>
        <select name="td_cl">
            <?php
             foreach($db->query('SELECT ID_TIPO_DOC, DES_TD FROM tipo_documento')as$row)
                {
                  echo '<option value="'.$row['ID_TIPO_DOC'].'">'.$row['DES_TD'].'</option>';
                }
            ?>
            <input type="text" name="direccion_cll" value="<?php echo $row["DIRECCION"]; ?>">

		<input type="text" name="direccion_cl" value="<?php echo $row["DIRECCION"]; ?>" placeholder="Direccion" required>

        <label>Estado: </label><br><br>
        <label>Active</label><input type="radio" name="estado_cl" value="1"<?php echo $row['ESTADO_CLIENTE'] === '1' ? 'checked' : ''?>  >
            <label>Inactive</label><input type="radio" name="estado_cl" value="0"<?php echo $row['ESTADO_CLIENTE'] === '0' ? 'checked' : ''?>  >
            <input type="text" name="numero_doc_ce" value="<?php echo $row["NUMERO_DOC_CONTACTO_E"]; ?>" placeholder="Numero Identificacion Contacto">
            <select name="tdoc_contacto">
                   <?php
                    foreach ($db->query('SELECT ID_TIPO_DOC, DES_TD FROM tipo_documento') as $row)
                    {
                        echo '<option value="'.$row['ID_TIPO_DOC'].'">'.$row['DES_TD'].'</option>';
                    }
                   ?>
            <select name="fk_ciudad">
                   <?php
                    foreach ($db->query('SELECT ID_CIUDAD, DES_CIUDAD FROM ciudad') as $row)
                    {
                        echo '<option value="'.$row['ID_CIUDAD'].'">'.$row['DES_CIUDAD'].'</option>';
                    }
                   ?>
                   </select><br>
                   <select name="epss">
                   <?php
                    foreach ($db->query('SELECT ID_EPS, DES_EPS FROM eps') as $row)
                    {
                        echo '<option value="'.$row['ID_EPS'].'">'.$row['DES_EPS'].'</option>';
                    }
                   ?>
                   </select><br>
			<p><input class="submit-button" type="submit" value= "Actualizar" onclick= "this.form.action = '?action=actualizar';"/>
</form>
</div>
<?php  }} // Fin Validacion para mostrar formulario de Actualizar registro
$sql1= "SELECT * FROM cliente";
$query = $db->query($sql1);

if($query->rowCount()>0):?>
<br><h1>Consulta de Clientes</h1><br>
<table class="table">
	<thead>
		<tr>
			<th class="th">Id Cliente</th>
			<th>Tipo Docuemnto</th>
			<th>Direccion</th>
			<th>Estado</th>
			<th>Id contacto Emergencia</th>
			<th>Tipo Documento contacto</th>
			<th>Ciudad</th>
			<th>Eps</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
		</tr>
	</thead>


<?php while ($row=$query->fetch(PDO::FETCH_ASSOC)): ?>
<tr class="tr">
	<td class="td"><?php echo $row['ID_CLIENTE']; ?></td>
	<td class="td"><?php echo $row['TD_CLIENTE']; ?></td>
	<td class="td"><?php echo $row['DIRECCION']; ?></td>
	<td class="td"><?php echo $row['ESTADO_CLIENTE']; ?></td>
	<td class="td"><?php echo $row['NUMERO_DOC_CONTACTO_E']; ?></td>
	<td class="td"><?php echo $row['TD_CONTACTO_E']; ?></td>
	<td class="td"><?php echo $row['FK_CIUDAD']; ?></td>
	<td class="td"><?php echo $row['FK_EPS']; ?></td>
<td class="td">
	<a href="?action=editar&ID_CLIENTE=<?php echo $row["ID_CLIENTE"];?>">Actualizar</a>
</td> 
	<td class="td"> 
	 <a href="?action=eliminar&ID_CLIENTE=<?php echo $row["ID_CLIENTE"];?>" onclick="return confirm('¿Esta seguro de eliminar este Usuario?')">Eliminar</a>
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