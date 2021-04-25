<?php
	include ("conectar.php");
	if(isset($_GET['id']))
	{
		try
		{
			$dato = $_GET['id'];
			$sql = $conn->query("select * from estudiantes where id like '%$dato%'");
			$row_count = $sql->rowCount();
			if($row_count)
			{
				$row = $sql->fetch(PDO::FETCH_ASSOC);
				echo "<br>".$row['id'].' '.$row['nombres'].' '.$row['apellidos'];
			}	
		}
		catch(PDOException $e)
		{
			echo "Error: ".$e->getMessage();
		}
		$conn = null;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Modificar</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/modificar.css" >

</head>
<body style="background-color:#000000 ;">


		<div class="container" align="center">
    <div class="row">  
		
	



        <div class="col-md-11 caja2">
		<h4 style="color:#ffffff"  align="center">REGISTRO ACADEMICO</h4>
		</div>
		</div>

	   
        <div class="col-md-11 caja1">
		<h4 style="color:#ffffff" align="center">Modificar datos</h4>
		</div>




	<form action="<?PHP echo $_SERVER['PHP_SELF'];?>" method="post">
		<fieldset>
			<table class="table table-striped table-dark"  border="3"align="center">
			



			   
        <div class="col-md-11 caja1">
		<h4 style="color:#ffffff" align="center">Modificar </h4>
		

				<tr>
					<td><label>Codigo</label></td>
					<td> <input type="text" name="id" value="<?php echo (isset($row['id']))?$row['id']:''; ?>"> </td>
				</tr>
				<tr>
					<td><label>Nombres</label></td>
					<td> <input type="text" name="nombres" value="<?php echo (isset($row['nombres']))?$row['nombres']:''; ?>"> </td>
				</tr>
				<tr>
					<td><label>Apellidos</label></td>
					<td> <input type="text" name="apellidos" value="<?php echo (isset($row['apellidos']))?$row['apellidos']:''; ?>"> </td>
				</tr>
			</table>
			<input type="submit" name="Guardar" value="Guardar">
			<input type="button" onclick="location.href='pgconsultar.php'" name="Volver" value="Volver a la consulta de datos">
			<a href="inicio.php">Volver al menu principal</a>


			</div>
			</div>
</body>
</html>
<!-- Guardar los datos -->
<?php
	if($_POST)
	{
		try
		{
			if(isset($_POST['id']))
			{
				$sql = $conn->exec("UPDATE estudiantes SET nombres='".$_POST['nombres']."',apellidos='".$_POST['apellidos']."' WHERE id='".$_POST['id']." ' ");
				echo "El nuevo registro se creo exitosamente";
			}	
		}
		catch(PDOException $e)
		{
			echo "Error: ".$e->getMessage();
		}
	}