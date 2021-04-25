<?php
	include ("conectar.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Guardar</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/consulta.css" >


</head>
<body style="background-color:#000000 ;">
	<section>
		<article>

		<div class="container">
    <div class="row">   
        <div class="col-md-11 azul">
		<h1 align="center">REGISTRO ACADEMICO</h1>
		</div>
    </div>  
<div class="row">
    <div class="col-md-11 rojo">
	<h3 align="center">Consulta de datos</h3>
	</div>
</div>
<div class="row">
    <div class="col-md-4 rojo2"align="center">
	<form action="" method="POST">
				<input type="text" name="buscar" id="" value="">
				<input type="submit" name="Enviar" id="" value="Enviar consulta"></div>
    <div class="col-md-3 rojo2"align="center">
	<input  type="button" name="Enviar" id="" value="Registro nuevo" onClick="location.replace('pgGuardar.php')"></div>
    <div class="col-md-4 rojo2"align="center">
	<p align="center"> <a href="inicio.php">Volver al menu principal</a> </p></div>
</div>

</div>
</div>
				
			</form>
		</article>
	</section>
	<script src="../js/jquery-3.4.1.slim.min.js" ></script>
    <script src="../js/popper.min.js" ></script>
    <script src="../js/bootstrap.min.js" ></script>
</body>
</html>
<?php
	if(isset($_POST["buscar"])){
		try{
			$dato = $_POST["buscar"];
			$sql = $conn->query("select * from estudiantes where id like '%$dato%'");
			$row_count = $sql->rowCount();

			//class="table table-striped table-dark" border="5">'
			echo '<div id="caja1"> 	<table  class="table table-striped table-dark" border="5">';
			echo '<th colspan="2" align="center">Opciones</th>';
			echo '  <th scope="col">Codigo</th>';
			echo '<th>Nombres</th>';
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
				echo '<td>'.$row['apellidos'].'</td>';	
			}	
			echo "</table>";
		}
		catch(PDOException $e)
		{
			echo "Error ".$e->getMessage();	
		}
		$conn = null;
	}
	
?>

