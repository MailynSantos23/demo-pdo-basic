<?php 
include ("conectar.php");
include "cabecera.php";
include "menu.php";
?>

<!doctype html>
<html lang="en">
<head>
<!--Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--Bootstrap CSS -->
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/estilos.css">
<title>Diseño con Bootstrap</title>
<script>
function verificar(){
    pw1 = document.f1.passw.value;
    pw2 = document.f1.passw2.value;
    // alert(pw1+" --"+pw2);
    if(pw1 != pw2){
        alert("Las contraseñas son diferentes");
        document.f1.passw.value = "";
        document.f1.passw2.value = "";

     }
  }

 </script>

</head>
<body>
<ul class="nav justify-content-center">
<div class="row mt-3">
<div class="col col-md-12">
<h3>Mantenimiento de Usuarios y Contraseña</h3>
<form action="" method="post">
<div class="form-group">
<input type="text" class="form-control" name="usuario" maxlength="60" size="60" placeholder="Ingrese su Usuario" required>
</div>
<div class="form-group">
<input type="password" class="form-control" name="passw" maxlength="60" size="60" placeholder="Ingrese su Contraseña" required>
</div>
<div class="form-group">
<input type="password" class="form-control" name="passw2" maxlength="60" size="60" placeholder="Ingrese de nuevo su Contraseña" required>
</div>            
<div class="form-group">
<input type="text" class="form-control" name="nombre_usuario" maxlength="100" size="100" placeholder="Ingrese su Nombre de usuario" required>
</div>
<div class="form-group">
<input type="text" class="form-control" name="nivel"  maxlength="1" size="1" placeholder="Ingrese el Nivel de acceso" required>
</div>       
<div class="form-group">
 <!--class="fa fa-angle-right" -->
 <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Enviar</button>
 </button>
<hr>
<input type="button"class="bt btn-success"onclick="location.href='inicio.php'"name="Volver"value="Volver a Inicio">
 </div>
 </form>
 </div>
 </ul>
 </div>

 <?php
 if(isset($_POST['usuario']))
 {
     try
     {
       # ocultar la contraseña 
       $oculto = md5($_POST["passw"]);
       echo "Texto oculto: " . $oculto;  

        $stmt = $conn->prepare("INSERT INTO usuarios(usuario,passw,nombre_usuario,nivel)VALUES(:us1,:us2,:us3,:us4)");
        $stmt->bindParam(':us1',$usuario);
        $stmt->bindParam(':us2',$oculto);
        $stmt->bindParam(':us3',$nombre_usuario);
        $stmt->bindParam(':us4',$nivel);

        $usuario = $_POST['usuario'];
        $passw = $_POST['passw'];
        $nombre_usuario = $_POST['nombre_usuario'];
        $nivel =$_POST['nivel'];
        $stmt->execute();

        echo '<script> alert("Registro almacenado satisfactoriamente") </script>';
    }
    catch (PDOException $e)
    {
        $stmt->execute();
        echo "Error: ".$e->getMessage();

    
    }
    
}

    ?>
    <!--Pie de página -->
    <?php include "piedepagina.php"; ?>
    
    <!--Optional JavaScript -->
    <!--jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.4.1.slim.min.js">
    </script><script src="../js/popper.min.js">
    </script><script src="../js/bootstrap.min.js">
    </script>
    </body>
    </html>

