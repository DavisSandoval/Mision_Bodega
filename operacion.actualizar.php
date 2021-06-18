<?php
include ('conexion.php');
																
  if ($_GET["op"]=="op1") { 
					
				$codigo= $_POST['seleccionar'];
				$stock = $_POST['stock'];
										 				  
					 
				$consulta = "SELECT * FROM productos WHERE cod_producto = '$codigo'";
				$ejecutar = mysql_query($consulta, $conexion);
				//$result = mysql_query("SELECT * FROM productos WHERE cod_producto = '$codigo'"); 
				$resul = mysql_num_rows($ejecutar);
							
				if ($resul > 0) {	
				$sql="UPDATE productos SET stock= stock + '$stock' WHERE cod_producto ='$codigo'";
				$mysql = mysql_query($sql, $conexion);
				header("Location:mod_producto.php?mod=si");
						
				}else{

				header("Location:mod_producto.php?mod=no");

					}
  }
   if ($_GET["op"]=="op2"){
			
				$codigo= $_POST['seleccionar'];
				$descripcion = $_POST['descripcion'];
				$proveedor = $_POST['proveedor'];
				$fecha_ingreso = $_POST['fecha'];
										 				  
					 
				$consulta = "SELECT * FROM productos WHERE cod_producto = '$codigo'";
				$ejecutar = mysql_query($consulta, $conexion);
				$resul = mysql_num_rows($ejecutar);
							
				if ($resul > 0) {	
				$sql="UPDATE productos SET descripcion='$descripcion', proveedor= '$proveedor' , fecha_ingreso= '$fecha_ingreso' WHERE cod_producto ='$codigo'";
				$mysql = mysql_query($sql, $conexion);
				header("Location:mod_producto.php?mod=si");
						
				}else{

				header("Location:mod_producto.php?mod=no");

					}			
  }		 					  
?>   