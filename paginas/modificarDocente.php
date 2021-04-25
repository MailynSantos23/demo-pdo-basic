<?php
include("conectar.php");
if(isset($_GET['id']))
{
    try
    {
        $dato=$_GET['id'];$sql=$conn->query("select *from docentes where id like '%$dato%'");
        $row_count=$sql->rowCount();
        if($row_count)
        {
            $row=$sql->fetch(PDO::FETCH_ASSOC);
        }
    }
      catch(PDOException$e){echo"Error:".$e->getMessage();
    }
       $conn=null;
    }
    include "cabecera.php";
    include "menu.php";
?>

<!--Aquivaelformulario-->
<button class="btn btn-primarymt-5"data-toggle="modal"data-target="#Modificar">
Modificar Registro
</button>
<hr>
<input type="button"class="bt btn-success"onclick="location.href='datosDocente.php'"name="Volver"value="Volver a la consulta de Docentes">

<!--Aquiponemoslaventanamodal-->
<!--Modal-->
<div class="modal fade"id="Modificar"tabindex="-1"role="dialog"aria-labelledby="exampleModalLabel"aria-hidden="true">
<div class="modal-dialog"role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title"id="exampleModalLabel">Agregar Nuevo Registro</h5>
<button type="button"class="close"data-dismiss="modal"aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action=""method="post">
<div class="form-group">Código:<input type="text"class="form-control"name="id"value="<?php echo(isset($row['id']))?$row['id']:'';?>">
</div>
<div class="form-group">Nombre:<input type="text"class="form-control"name="nombres"value="<?php echo(isset($row['nombres']))?$row['nombres']:'';?>">
</div>
<div class="form-group">Apellido:<input type="text"class="form-control"name="apellidos"value="<?php echo(isset($row['apellidos']))?$row['apellidos']:'';?>">
</div>
<div class="form-group">
<button type="submit"class="btn btn-primary">Guardar El Registro</button>
</div>
</form>
</div>
<div class="modal-footer">
<button type="button"class="btn btn-secondary"data-dismiss="modal">Cerrar</button>
</div>
</div>
</div>
</div>
<!--finventanamodal-->
<!--Guardarlosdatos-->
<?php
  include"piedepagina.php";
  include("conectar.php");
  if($_POST)
 {
    try{
        if(isset($_POST['id'])){$sql=$conn->exec("UPDATE docentes SET nombres='".$_POST['nombres']."',apellidos='".$_POST['apellidos']."'WHERE id='".$_POST['id']."'");
            //echo"ElNuevoRegistroSecreoExitosamente";
        }
    }
    catch(PDOException$e)
    {
        echo"Error:".$e->getMessage();
        
    }
        
        
 }
?>