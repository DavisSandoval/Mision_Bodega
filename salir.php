
<!-- Verificar que la variable sal sea igual a si.
Cerrar la sesión. 
Redirigir el flujo a la pagina del login --> 

<?php
if ($_GET['sal']=='si') {
	session_start(); 
	session_destroy(); // Cerrar sesión
	header("Location:login.php");
	
}
?>