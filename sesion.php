

<!-- Evaluar que la sesión continue, verificando la variable de sesión creada para este propósito.
	Si la variable cambió su valor inicial se enviará la variable error=si al archivo salir.php -->

<?php
session_start();

/* Evaluo que la sesión continue, verificando una de  las 
variables creadas en control.php, cuando esta ya no coincida 
con su valor inicial se redirije al archivo de salir.php
*/
if (!$_SESSION["activo"]) { 
	header("Location:salir.php?sal=si");
	
}
?>
