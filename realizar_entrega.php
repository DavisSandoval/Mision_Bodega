
<!-- Incluir archivos requeridos -->
<?php
include ('sesion.php');
?>

<!DOCTYPE html> 
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Entregas</title>
        <link type="text/css" href="estilo.css" rel="stylesheet">

    </head>

    <body>
        <div class="contenedor">
            <div class= "encabezado">
                <div class="izq">
                    <p>Bienvenido/a:<br><?php echo $_SESSION["nombre"]," ",$_SESSION["apellido"];?> </br></p>
                </div>

                <div class="centro">
                    <a href=principalBodega.php><img src='imagenes/home.png'><br>Home</a>
                </div>
                
                <div class="derecha">
                    <a href="salir.php?sal=si"><img src="imagenes/cerrar.png"><br>Salir</a>
                </div>
            </div>
                
            
            <br><h1 align='center'>PRODUCTOS EXISTENTES</h1><br>
            <?php
                include('conexion.php');

                $consulta="SELECT * FROM productos";
                $ejecutar=mysql_query($consulta,$conexion);
        
                echo "<table  width='80%' align='center'><tr>";               
                echo "<th width='10%'>CODIGO PRODUCTO</th>";
                echo "<th width='20%'>DESCRIPCIÓN</th>";
                echo "<th width='10%'>STOCK</th>";
                echo "<th width='20%'>PROVEEDOR</th>";
                echo "<th width='20%'>FECHA DE INGRESO</th>";
                echo  "</tr>"; 
            
                while($result=mysql_fetch_array($ejecutar)){    
                    
                  echo "<tr>";                
                  echo '<td width=10%>'.$result['cod_producto'].'</td>';
                  echo '<td width=20%>'.$result['descripcion'].'</td>';
                  echo '<td width=20%>'. $result['stock'].'</td>';
                  echo '<td width=20%>'.$result['proveedor'].'</td>';
                  echo '<td width=20%>'.$result['fecha_ingreso'].'</td>';
                  echo "</tr>";
                }
                 echo "</table></br>";
            ?>

            <form action="" method="post" align='center'>

                <div class="campo">
                    <label name="rut">Rut personal que retira:</label>
                    <input name='rut' type="text" required/>
                </div>

                <div class="campo">
                    <label name="cod">Código del producto:</label>
                    <input name='codigo' type="text" required/>
                </div>

                <div class="campo">
                    <label name="cantd">Cantidad:</label>
                    <input name='cantidad' type="text" required/>
                </div>

                <div class="campo">
                    <label name="cantd">Fecha entrega:</label>
                    <input name='fecha' type="date" required/>
                </div>
                
                <div class="botones">
                    <input name='agregar' type="submit" value="Agregar">
                </div>
                
            </form>

            <!-- Verificar que la variable del boton submit este creada.
                Recuperar las variables con los datos ingresados. 
                Descontar la cantidad ingresada al stock existente del producto a retirar.
                Insertar los datos ingresados en la tabla "entregas" de la base de datos. 
                Redirigir el flujo a esta misma página para visualizar la actualización del stock. -->
            <?php
					
				    
		if (isset($_POST['agregar'])) {

						// Las siguientes 2 líneas verifican que el registro que se desea modificar no corresponda al rut del Admin y se muestra alerta con mensaje. 
									
				$rut= $_POST['rut'];
				$codigo= $_POST['codigo'];									 				  
				$cantidad= $_POST['cantidad'];
				$fecha_entrega= $_POST['fecha'];
													 				  
					 
				$consulta = "SELECT * FROM personal WHERE rut = '$rut'";
				$ejecutar = mysql_query($consulta, $conexion);
				$rutpas = mysql_num_rows($ejecutar);
	
			if ($rutpas >0 ) {
			
			$consulta2 = "SELECT * FROM productos WHERE cod_producto = '$codigo'";
			$ejecutar2 = mysql_query($consulta2, $conexion);
			$resul = mysql_num_rows($ejecutar2);
			
							
				if ($resul > 0) {	
				
				
				
				$sql="UPDATE productos SET stock = stock -'$cantidad' WHERE cod_producto ='$codigo'";
				$mysql = mysql_query($sql, $conexion);
				
				$result3 = mysql_query("SELECT * FROM productos WHERE cod_producto = '$codigo' "); 
				$cantidadfinal= mysql_result($result3, 0, "stock"); 
				
				$sql2="INSERT INTO entregas (cantidad, cod_producto, fecha_entrega, rut)
				VALUES('$cantidadfinal','$codigo','$fecha_entrega', '$rut')";
				$mysql2 = mysql_query($sql2, $conexion);		
						
				
				
				echo "<script lenguaje='javascript'>alert('Productos Entregados');</script>";
				
				header("Location:realizar_entrega.php");
						
				
						
				}else{
				echo "<script lenguaje='javascript'>alert('Entrega no realizada, Producto no encontrado');</script>";
				
					}			
			}else{
				echo "<script lenguaje='javascript'>alert('Rut no encontrado');</script>";
			}								
							
												
					};
						 
				?>
                
        </div>
    </body>
</html> 