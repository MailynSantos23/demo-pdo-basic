<?php
	include ("conectar.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Guardar</title>
	<meta charset="utf-8">
</head>
<body>
	<section>
		<article>
			<h3>Consulta de datos</h3>
			<form action="<?PHP echo $_SERVER['PHP_SELF'];?>" method="POST">
				<input type="text" name="buscar" id="" value="">
				<input type="submit" name="Enviar" id="" value="Enviar consulta">
			</form>
		</article>
	</section>
</body>
</html>
<?php
	if(isset($_POST["buscar"])){
		try{
			$dato = $_POST["buscar"];
			$sql = $conn->query("select * from estudiantes where id like '%$dato%'");
			$row_count = $sql->rowCount();
			echo '<div id="caja1"><table border="1">';
			echo '<th colspan="2" align="center">Opciones</th>';
			echo '<th>Codigo</th>';
			echo '<th>nombres</th>';
			echo '<th>Apellidos</th>';
			echo $row_count." fileas seleccionadas";
			while($row = $sql->fetch(PDO::FETCH_ASSOC))
			{
				echo '<tr>';
				echo '<td onClick="Eliminar">
						<a href="pgModificar.php?id='.$row['id'].'"><img src="../img/modificar.png" width="20"></a></td>';
				echo '<td onClick="Modificar">
						<a href="pgEliminar.php?id='.$row['id'].'"><img src="../img/eliminar.png" width="20"></a></td>';
				echo '<td>'.$row['id'].'</td>';
				echo '<td>'.$row['nombres'].'</td>';
				echo '<td>'.$row['apellidos'].'</td>';	
			}	
			echo "</table>";
		}
		catch(PDOException $e)
		{
			echo "Error ".$e->getMessage();	
		}
	}
?>



