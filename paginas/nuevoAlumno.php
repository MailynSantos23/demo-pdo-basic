<!--Aquivaelformulario-->
</button>
<hr>
<input type="button"class="bt btn-success"onclick="location.href='inicio.php'"name="Volver"value="Volver a Inicio">

<!--Modal-->
<div class="modal fade"id="insertarModal"tabindex="-1"role="dialog"aria-labelledby="exampleModalLabel"aria-hidden="true">
<div class="modal-dialog"role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title"id="exampleModalLabel">Agregar Nuevo Registro</h5>
<button type="button"class="close"data-dismiss="modal"aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div lass="modal-body">
<form action=""method="post">
<div class="modal-body">
<form action=""method="post">
<div class="form-group">Código:<input type="text"class="form-control"name="id"value="<?php echo(isset($row['id']))?$row['id']:'';?>">
</div>
<div class="form-group">Nombre:<input type="text"class="form-control"name="nombres"value="<?php echo(isset($row['nombres']))?$row['nombres']:'';?>">
</div>
<div class="form-group">Apellido:<input type="text"class="form-control"name="apellidos"value="<?php echo(isset($row['apellidos']))?$row['apellidos']:'';?>">
</div>
<div class="form-group">
<!--class="fafa-angle-right"-->
<button type="submit"class="btn btn-primary">
<i class="fafa-save"></i>Enviar</button>
</div>
</form>
</div>
<div class="modal-footer">
<button type="button"class="btn btn-secondary"data-dismiss="modal">Cerrar</button>
</div>
</div>
</div>
</div>