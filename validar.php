<!-- incluir archivos requeridos.
	Obtener variables con los datos ingresados en login, la contraseña debe estar dentro de una función hash.
	Verificar que exista el registro en la base de datos.
		Si el registro existe entonces:
			Iniciar sesión.
			Crear variables de sesión a ocupar.
			Asignar los permisos según el cargo. 

		Si no existe el registro enviar una variable para mostra mensaje en pagina de login. 


<?php
include('conexion.php');

$usuario = $_POST['usuario'];
$pass = MD5 ($_POST['pass']);
$nombre =$_GET['nombre'];
$apellido =$_GET['apellido'];
//$fullnombre =$_GET['fullnombre'];
$cargo =$_GET['cargo'];

$consulta = "SELECT * FROM personal WHERE rut = '$usuario' AND contraseña = '$pass'";
$ejecutar = mysql_query($consulta, $conexion);

$result = mysql_query("SELECT * FROM personal WHERE rut = '$usuario' "); 
$rut= mysql_result($result, 0, "rut"); 
$nombre= mysql_result($result, 0, "nombre"); 
$apellido= mysql_result($result, 0, "apellido"); 
$cargo= mysql_result($result, 0, "cargo"); 


$resul = mysql_num_rows($ejecutar);


if ($resul > 0) {
		session_start();

		$_SESSION['activo'] = true;
		$_SESSION['usuario'] = $usuario;
		$_SESSION['nombre'] = $nombre;
		$_SESSION['apellido'] = $apellido;
		$_SESSION['cargo'] = $cargo;
	
		
	

		if ($usuario == $rut AND $cargo == 'Admin' ) {
			header("Location:principalAdmin.php");
			$_SESSION['usuario'] = $nombre;

		}else if ($usuario == $rut AND $cargo == 'Bodega' ) {
			header("Location:principalBodega.php");
		}

}else{
	
	header("Location:login.php?error=si");
	
}

?>

