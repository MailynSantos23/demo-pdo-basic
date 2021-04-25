<?php	
	include("conectar.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Modificar</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/consulta.css" >
</head>
<body>
<body style="background-color:#000000 ;">


<div class="container" align="center">
<div class="row">  




<div class="col-md-11 caja4">
<h4 style="color:#ffffff" align="center">Guardar datos</h4>
</div>

<ul class="nav justify-content-center">
	<form action="<?PHP echo $_SERVER['PHP_SELF'];?>" method="post">
		<fieldset>
		<ul class="nav justify-content-center">
			<table  class="table table-striped table-dark" border="5" align="center">
				
				<tr>
					<td><label>Codigo</label></td>
					<td> <input type="text" name="id" value=""> </td>
				</tr>
				<tr>
					<td><label>Nombres</label></td>
					<td> <input type="text" name="nombres" value=""> </td>
				</tr>
				<tr>
					<td><label>Apellidos</label></td>
					<td> <input type="text" name="apellidos" value=""> </td>
				</tr>
			</table>

		    
			<input type="submit" name="Guardar" value="Guardar datos">
			<a href="inicio.php" >Volver al menu principal</a>
           		
			
			<script src="../js/jquery-3.4.1.slim.min.js" ></script>
    <script src="../js/popper.min.js" ></script>
	<script src="../js/bootstrap.min.js" ></script>
</ul>
</body>
</html>
<!-- Guardar los datos -->
<?php

	if(isset($_POST['id']))
	{
		try
		{
			echo $_POST['id']."  ".$_POST['nombres']."  ".$_POST['apellidos'];
			$stmt = $conn->prepare("INSERT INTO estudiantes(id,nombres,apellidos)VALUES(:id,:nombres,:apellidos)");

			$stmt->bindParam(':id',$id);
			$stmt->bindParam(':nombres',$nombres);
			$stmt->bindParam(':apellidos',$apellidos);
					
			$id = $_POST['id'];
			$nombres = $_POST['nombres'];
			$apellidos = $_POST['apellidos'];
			$stmt->execute();

			echo "El nuevo registro se guardo exitosamente";
		}

		catch(PDOException $e)
 		{
			$stmt->execute();
			echo "Error: ".$e->getMessage();
		}

	}
?>