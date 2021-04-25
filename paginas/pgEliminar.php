<?php 
	include("conectar.php");
	try
	{
		if($_GET)
		{
			$id = $_GET['id'];
			$stmt=$conn->prepare("delete from estudiantes where id=:id");
			$stmt->bindValue(':id',$id,PDO::PARAM_STR);
			$stmt->execute();
			$row_count = $stmt->rowCount();
			echo "<script>location.replace('consultar.php?id=".$id."')</script>";
		}
	}
	catch(PDOException $e)
	{
		echo "Error: ".$e->getMessage();
	}
	$conn = null;
 ?>