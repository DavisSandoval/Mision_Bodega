<?php
include ('conexion.php');
																

					
				$codigo= $_POST['eliminar-producto'];
													 				  
					 
				$consulta = "SELECT * FROM productos WHERE cod_producto = '$codigo'";
				$ejecutar = mysql_query($consulta, $conexion);
				$resul = mysql_num_rows($ejecutar);
							
				if ($resul > 0) {	
				$sql="DELETE FROM productos WHERE cod_producto ='$codigo'";
				$mysql = mysql_query($sql, $conexion);
				header("Location:eliminar_producto.php?mod=si");
						
				}else{
					echo"no eliminado";
				header("Location:eliminar_producto.php?mod=no");

					}
							
			 					  
?>   