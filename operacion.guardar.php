<?php
include ('conexion.php');
																
						
						
						$codigo= $_POST['codigo'];
						$descripcion = $_POST['descripcion'];
						$stock = $_POST['stock'];
						$proveedor = $_POST['proveedor'];
						$fecha_ingreso = $_POST['fecha'];
																	
					 				  
					  $query= "INSERT INTO productos (cod_producto, descripcion, stock, proveedor, fecha_ingreso)
					  VALUES('$codigo','$descripcion','$stock','$proveedor','$fecha_ingreso')";
					  
					 $resultado = mysql_query($query, $conexion);
					  
					  if ($resultado) { 
					  
					  header("Location:agregar_producto.php?agregar=si");
					
	
						}
						else{
							header("Location:agregar_producto.php?agregar=no");
	
						}
					  
?>   