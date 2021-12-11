<?php
require_once '../crud_bio/model_ciudad.php';
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
        $update=new Ciudad();
        $update->Actualizar_ciudad($_POST["old_idd"], $_POST["new_idd"], $_POST["nnom_ciu"],$_POST["eestado"]);

            break;

// CASO PARA METODO REGISTRAR       
        case 'registrar':
        $insert=new Ciudad();
        $insert->Ingresar_ciudad($_POST["id_ciu"],$_POST["nom_ciud"], $_POST["estado"]);

         break;

// CASO PARA METODO ELIMINAR
         case 'eliminar':
        $delete=new Ciudad();
        $delete->Eliminar_ciudad($_GET["ID_CIUDAD"]);

           break;

// CASO PARA METODO EDITAR
         case'editar':
        $capt = $_GET["ID_CIUDAD"];
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

    <title>Registro Ciudad</title>
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

<a href="?action=ver&m=1">Registro ciudad</a><br><br>

<!-- Validacion para mostrar formulario de nuevo registro -->
    <?php if( !empty($_GET['m']) and !empty($_GET['action'])  )

{?>

<div class="container-fluid pt-5">
    <h1 style="color: white">Registro ciudad </h1>
                <form class="form" method="post" action="#">
                   <input type="number" name="id_ciu" placeholder="Ingrese numero de id">
                   <input type="text" name="nom_ciud" placeholder="ciudad">
                   <label>Estado: </label>
                   Active <input type="radio" name="estado" value="1" checked>
                   Inactive <input type="radio" name="estado" value="0">
                   <input type="submit" value="Registrar" onclick="this.form.action = '?action=registrar';"/>
                    
                    
                </form>
</div>
<?php } ?> <!-- FIN - Formulario nuevo registro -->


<!-- Validacion para mostrar formulario de Actualizar registro -->
<?php if( !empty($_GET['ID_CIUDAD']) && !empty($_GET['action']) ){ ?>

<div>   
<form class="form" action="#" method="post">

<?php $sql1= "SELECT * FROM `ciudad`
                WHERE ID_CIUDAD = '$capt'";
$query = $db->query($sql1);?>
<?php  while ($row=$query->fetch(PDO::FETCH_ASSOC))
{
    ?>
        <h2>ACTUALIZAR DATOS</h2>
            <input type="text" name="old_idd" value="<?php echo $row["ID_CIUDAD"]; ?>" style='display: none'>
            <input type="text" name="new_idd" value="<?php echo $row["ID_CIUDAD"]; ?>" placeholder="Numero de ID" required>
            <input type="text" name="nnom_ciu" value="<?php echo $row["DES_CIUDAD"]; ?>" placeholder="Ciudad">
            <label>Estado: </label>
              Active<input type="radio" name="estado" value="1"<?php echo $row['ESTADO_CIUDAD'] === '1' ? 'checked' : ''?>  >
              Inactive<input type="radio" name="estado" value="0"<?php echo $row['ESTADO_CIUDAD'] === '0' ? 'checked' : ''?>  >
            <p><input class="submit-button" type="submit" value= "Actualizar" onclick= "this.form.action = '?action=actualizar';"/>


</form>
</div>
<?php  }} // Fin Validacion para mostrar formulario de Actualizar registro
$sql1= "SELECT * FROM ciudad";
$query = $db->query($sql1);

if($query->rowCount()>0):?>
<br><h1 style="color: white">Consulta de Ciudades</h1><br>
<table class="blueTable">
    <thead>
        <tr>
            <th class="th">Id ciudad</th>
            <th>Ciudad</th>
            <th>Estado</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
        </tr>
    </thead>


<?php while ($row=$query->fetch(PDO::FETCH_ASSOC)): ?>
<tr class="tr">
    <td class="td"><?php echo $row['ID_CIUDAD']; ?></td>
    <td class="td"><?php echo $row['DES_CIUDAD']; ?></td>
    <td class="td"><?php echo $row['ESTADO_CIUDAD']; ?></td>
<td class="td">
    <a href="?action=editar&ID_CIUDAD=<?php echo $row["ID_CIUDAD"];?>">Actualizar</a>
</td> 
    <td class="td"> 
     <a href="?action=eliminar&ID_CIUDAD=<?php echo $row["ID_CIUDAD"];?>" onclick="return confirm('¿Esta seguro de eliminar esta Ciudad?')">Eliminar</a>
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