
<!-- incluir archivos requeridos.
	Verificar la confirmación de la contraseña.
		Recuperar las variables con los datos ingresados en el formulario. 
		Validar que el rut ingresado no se encuantre en la base de datos.
			Si ya existe un registro vinculado al rut ingresado:
				Redirigir a login y entregar mensaje.

			Si no existe:
			Insertar datos en tabla correspondiente.
			Redirigir a login y mostrar mensaje.

	Si las contraseñas no existen redirigir a login y mostrar mensaje. -->  


<?php
include ('conexion.php');
																

					
				$rut= $_POST['rut'];
				$nombre= $_POST['nombre'];
				$apellido= $_POST['apellido'];									 				  
				$cargo= $_POST['cargo'];
				$contrasena1= $_POST['contrasena1'];
				$contrasena2= $_POST['contrasena2'];
				$resultado= $_POST['contrasena1'] == $_POST['contrasena2'];
				$contrasena = $_POST['contrasena'];
				//$contra= hash ("md5",$contrasena);
				
			if	( $resultado == true ) {
				
				$consulta = "SELECT * FROM personal WHERE rut = '$rut'";
				$ejecutar = mysql_query($consulta, $conexion);
				$resul = mysql_num_rows($ejecutar);
		
								
				if ($resul > 0 ) {	
			
				header("Location:crear_personal.php?per=no");
						
				}else {
					$sql="INSERT INTO personal (rut, nombre, apellido, cargo, contraseña)
					VALUES('$rut','$nombre','$apellido','$cargo', md5 ('$contrasena2'))";
					$mysql = mysql_query($sql, $conexion);
				
				
				header("Location:crear_personal.php?per=si");

					}
	}else{
	
	header("Location:crear_personal.php?per=igual");
	
	}
	 		
			 					  
?>   