
<?php
include ("conectar.php");
include "cabecera.php";
include "menu.php";
?>
<!DOCTYPE html>
<html>
<body>
<div class="row mt-5">
 <div class="col">
           <form action="" method="POST">
				<input type="text" name="buscar" id="" value="">
				<input type="submit" name="Enviar" id="" value="Enviar consulta">
				<input type="button" name="Enviar" id="" value="Registro nuevo" onClick="location.replace('pgGuardar.php')">
				<a href="inicio.php">Volver al menu principal</a>
			</form>
 </div>
</div>
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
			echo $row_count." filas seleccionadas";
			while($row = $sql->fetch(PDO::FETCH_ASSOC))
			{
				echo '<tr>';
				echo '<td>
						<a href="pgModificar.php?id='.$row['id'].'"><img src="../img/modificar.png" width="20"></a></td>';
				echo '<td>
						<a href="pgEliminar.php?id='.$row['id'].'"><img src="../img/eliminar.png" width="20"></a></td>';
				echo '<td>'.$row['id'].'</td>';
				echo '<td>'.$row['nombres'].'</td>';
				echo '<td>'.$row['apellido'].'</td>';	
			}	
			echo "</table>";
		}
		catch(PDOException $e)
		{
			echo "Error ".$e->getMessage();	
		}
		$conn = null;
	}
//include("newQuery.php");
?>
<?PHP include "PieDePagina.php"; ?>



