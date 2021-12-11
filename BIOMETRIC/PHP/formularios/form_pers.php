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
        $update->Actualizar_persona($_POST["ttdoc"],	$_POST["old_user"], $_POST["new_user"],$_POST["nnombre"], $_POST["nnombree"], $_POST["aapel"], $_POST["aapell"], $_POST["ttel"]);

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
<!DOCTYPE html>
<html lang="">
<head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style_forms.css">

    <title>Registro persona</title>
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

<a href="?action=ver&m=1">Registro persona</a><br><br>

<!-- Validacion para mostrar formulario de nuevo registro -->
	<?php if( !empty($_GET['m']) and !empty($_GET['action'])  )

{?>

<div class="container-fluid pt-5">
    <h1 style="color: white">Registro persona </h1>
                <form class="form" method="post" action="#">
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
<br><h1 style="color: white">Consulta de las personas registradas</h1><br>
<table class="blueTable">
	<thead>
		<tr>
			<th class="th">Tipo documento</th>
			<th>Numero documento</th>
			<th>Primer nombre</th>
			<th>Segundo nombre</th>
			<th>Primer apellido</th>
			<th>Segundo apellido</th>
			<th>Telefono</th>
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
    <footer class="container-fluid pt-5">
        <div class="container">
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
                by <a href="https://freehtml5.co/shahala" target="_blank" class="text-white">biometric-system.co</a>.</p>
        </div>
    </footer>

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/jquery-1.12.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.yu2fvl.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>