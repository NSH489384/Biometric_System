<?php
session_start();

$_SESSION["admin"]='0';

header('location: login.php');

?>
<?php
session_start();

$active_session=$_SESSION["admin"];

if ($active_session!='1') 
{
	header('location: login.php');
}
?>