<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/view/index.css">
</head>
<body>
<div>
  <h2>Catalogo de prendas y sus características</h2>
    <div class="header-section section flex">
        <!-- header navigation  -->
        <div class="header-nav flex" id="header-nav">
            <ul class="nav flex">
                <li><a href="http://localhost/pruebaplayeras/?C=CorteController&M=index">Cortes/Estilos</a></li>
                <li><a href="#">        </a></li>
                <li><a href="http://localhost/pruebaplayeras/?C=MaterialController&M=index">Materiales</a></li>
                <li><a href="http://localhost/pruebaplayeras/?C=TallaController&M=index">Tallas</a></li>
                <li><a href="http://localhost/pruebaplayeras/?C=ColorController&M=index">Colores</a></li>
            </ul>
        </div>
    </div>
  <div>
    <table >
        <thead>
            <td>Modelo</td>
            <td>Genero</td>
            <td>Precio</td>
            <td>Talla</td>
            <td>Corte</td>
            <td>Color</td>
            <td>Material</td>
            <td>Porcentaje</td>
        </thead>
        <tbody>
            <?php
              foreach($prendas as $prenda){
                echo "<tr>";
                echo "<td>". $prenda['Modelo'] ."</td>";
                echo "<td>". $prenda['Genero'] ."</td>";
                echo "<td>". $prenda['Precio_venta'] ."</td>";
                echo "<td>". $prenda['talla'] ."</td>";
                echo "<td>". $prenda['Corte'] ."</td>";
                echo "<td>". $prenda['nomColor'] ."</td>";
                echo "<td>". $prenda['Material'] ."</td>";
                echo "<td><button onclick='editar(".$prenda['id_prenda'].")'>Editar</button><br>
                <button onclick='eliminar(".$prenda['id_prenda'].")'>Eliminar</button> </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
<script>
  //creamos la funcion para llmar al formulario de editar un usuario
  function editar(id){
    window.location.href = "http://localhost/pruebaplayeras/?C=PrendaController&M=CFEdit&id="+id
  }
  //creamos la funcion para eliminar un usuario por medio de su id despues de confirmar con un confirm
  function eliminar(id){
    if(confirm("¿Desea eliminar el estado?")){
      window.location.href = "http://localhost/pruebaplayeras/?C=PrendaController&M=Delete&id="+id
    }
  }
</script>

</body>
</html>