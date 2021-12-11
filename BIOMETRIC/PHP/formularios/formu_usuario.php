<?php  
require_once '../crud_bio/model_usuario.php';
require_once '../conexion.php';
    $db = conexion::conectar();    
    ?>
<?php
// INICIO DE VALIDACION Y SELECCION DE CASOS A REALIZAR INSERT - UPDATE - DELETE - SELECT
if(isset($_REQUEST['action']))
{   switch ($_REQUEST['action']) 
    {   

// CASO PARA METODO REGISTRAR       
        case 'registrar':
        $insert=new Usuario();
        $insert->Ingresar_usuario($_POST["id_usuario"],$_POST["tdoc_usuario"],$_POST["contraseña_usuario"],$_POST["correo_usuario"],$_POST["estado_usuario"]);

         break;

// CASO PARA METODO ACTUALIZAR
        case 'actualizar':
        $update=new Usuario();
        $update->Actualizar_usuario($_POST["old_numero_usuario"],$_POST["contraseña_usuario"],$_POST["correo_usuario"],$_POST['estado_usuario']);

            break;

// CASO PARA METODO ELIMINAR
        case 'eliminar':
        $delete=new Usuario();
        $delete->Eliminar_usuario($_GET["NUMERO_DOC"]);

           break;

// CASO PARA METODO EDITAR
         case'editar':
        $capt = $_GET["NUMERO_DOC"];
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
					<a href="formu_cliente.php"><span class="las la-chart-line"></span><span>Registro Cliente</span></a>
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
					<a href="formu_eps.php" class="active"><span class="las la-hospital"></span><span>Registro EPS</span></a>
				</li>
					<li>
					<a href="formu_contacto_e.php"><span class="las la-hospital"></span><span>Registro Contacto Emergencia</span></a>
				</li>			</ul>

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
					<h1>FORMULARIO USUARIOS</h1>
				</div>
			</div>
			<div><br><br><br>

<a href="?action=ver&m=1">Registro Usuario</a><br><br>

<!-- Validacion para mostrar formulario de nuevo registro -->
	<?php if( !empty($_GET['m']) and !empty($_GET['action'])  )

{?>

<div class="form">
                <form method="post" action="#">
				<h2>NUEVO REGISTRO</h2>
			     <hr>
                   <input type="number" name="id_usuario" placeholder="Numero de Identificacion">
                   <select name="tdoc_usuario">
                   <?php
                    foreach ($db->query('SELECT ID_TIPO_DOC, DES_TD FROM tipo_documento') as $row)
                    {
                        echo '<option value="'.$row['ID_TIPO_DOC'].'">'.$row['DES_TD'].'</option>';
                    }
                   ?>
        	   	   <input type="text" name="contraseña_usuario" placeholder="Contraeña"><br>
        	   	   <input type="text" name="correo_usuario" placeholder="Correo"><br>
        	   	   &nbsp;&nbsp;&nbsp;<label>Estado:</label>&nbsp;&nbsp;&nbsp;
                   &nbsp;&nbsp;<label>Active </label><input type="radio" name="estado_usuario" value="1" checked>
                   &nbsp;&nbsp;&nbsp;<label>Inactive</label> <input type="radio" name="estado_usuario" value="0">
                   <hr>
        	   	   <input type="submit" value="Registrar" onclick="this.form.action = '?action=registrar';"/>	
        	   	</form>
</div>
<?php } ?> <!-- FIN - Formulario nuevo registro -->


<!-- Validacion para mostrar formulario de Actualizar registro -->
<?php if( !empty($_GET['NUMERO_DOC']) && !empty($_GET['action']) ){ ?>

<div class="form">	
<form action="#" method="post">

<?php $sql1= "SELECT * FROM `usuario`
				WHERE NUMERO_DOC = '$capt'";
$query = $db->query($sql1);?>

		<h2>ACTUALIZAR DATOS</h2>
		<select name="tdoc" disabled="disabled">
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
			<input type="text" name="old_numero_usuario" value="<?php echo $row["NUMERO_DOC"]; ?>" readonly = 'readonly'>		
			<input type="text" name="contraseña_usuario" value="<?php echo $row["CONTRASEÑA"]; ?>" placeholder="Contraseña">
			<input type="text" name="correo_usuario" value="<?php echo $row["CORREO_USUARIO"]; ?>" placeholder="Correo Electronico">
			<label>Estado: </label><br><br>
        	<label>Active</label><input type="radio" name="estado_usuario" value="1"<?php echo $row['ESTADO_USUARIO'] === '1' ? 'checked' : ''?>  >
            <label>Inactive</label><input type="radio" name="estado_usuario" value="0"<?php echo $row['ESTADO_USUARIO'] === '0' ? 'checked' : ''?>  >
			<p><input class="submit-button" type="submit" value= "Actualizar" onclick= "this.form.action = '?action=actualizar';"/>

</form>
</div>
<?php  }} // Fin Validacion para mostrar formulario de Actualizar registro
$sql1= "SELECT * FROM usuario";
$query = $db->query($sql1);

if($query->rowCount()>0):?>
<br><h1>Consulta de Usuarios</h1><br>
<table class="table">
	<thead>
		<tr>
			<th class="th">Id Usuario</th>
			<th>Tipo Documento</th>
			<th>Contraseña</th>
			<th>Correo</th>
			<th>Estado</th>
			<th style='display: none'>Recuperar </th>
			<th style='display: none'>Cambio</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
		</tr>
	</thead>


<?php while ($row=$query->fetch(PDO::FETCH_ASSOC)): ?>
<tr class="tr">
	<td class="td"><?php echo $row['NUMERO_DOC']; ?></td>
	<td class="td"><?php echo $row['TD_USUARIO']; ?></td>
	<td class="td"><?php echo $row['CONTRASEÑA']; ?></td>
	<td class="td"><?php echo $row['CORREO_USUARIO']; ?></td>
	<td class="td"><?php echo $row['ESTADO_USUARIO']; ?></td>
	<td class="td">
	<a href="?action=editar&NUMERO_DOC=<?php echo $row["NUMERO_DOC"];?>">Actualizar</a>
</td> 
	<td class="td"> 
	 <a href="?action=eliminar&NUMERO_DOC=<?php echo $row["NUMERO_DOC"];?>" onclick="return confirm('¿Esta seguro de eliminar este Usuario?')">Eliminar</a>
</td>
	<td class="td" style='display: none'><?php echo $row['RECUPERAR_CONTRASEÑA']; ?></td>
	<td class="td" style='display: none'><?php echo $row['CAMBIO_CONTRASEÑA']; ?></td>


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