<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/View/empleados.css">
    <title>Document</title>
</head>
<body>
<div class="empleado">
<h1>Administracion de empleados</h1>
<p><a class="pi" href="http://localhost/pruebaplayeras/?C=EmpleadoController&M=CFAdd">Agregar Nuevo Empleado</a></p>
</div>
<div class="conte">
    <?php
      foreach($empleados as $empleado){
     
      echo "<div class='container empleado'>";
      echo "<img src='app/src/img/empleados/". $empleado['foto'] ."' alt='user' class='round'>";
      echo "<h4>". $empleado['Nombre'] ." ". $empleado['APaterno'] ."</h4>";
      echo "<h5>". $empleado['Email']."</h5>";
      echo "<p>". $empleado['Cargo'] ."</p>";
      echo "<div class='buttons'>";
      echo '<button id="mibot" class="main-btn"  onclick="editar('."'$empleado[RFC]'".')">';
      echo " Editar";
      echo "</button>";
      echo '<button class="main-btn secondary" onclick="eliminar('."'$empleado[RFC]'".')">';
      echo "Eliminar";
      echo "</button>";
      echo "</div>";
      echo "</div>";
      
     }
     ?>
</div>
<script>
  //creamos la funcion para llmar al formulario de editar un usuario
  function editar(id){
    
    alert(id);
    window.location.href ="http://localhost/pruebaplayeras/?C=EmpleadoController&M=CFEdit&id="+id
  }
  //creamos la funcion para eliminar un usuario por medio de su id despues de confirmar con un confirm
  function eliminar(id){
    if(confirm("¿Desea eliminar el estado?")){
      window.location.href = "http://localhost/pruebaplayeras/?C=EmpleadoController&M=Delete&id="+id
    }
  }
</script>