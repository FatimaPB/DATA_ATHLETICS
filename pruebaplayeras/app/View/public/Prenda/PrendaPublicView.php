<!DOCTYPE html>
<html>
<head>
  <title>Tienda en línea</title>
  <link rel="stylesheet" href="app/View/prenda.css">
</head>
<body>
  <header>
    <h1>Playeras para deportistas</h1>
  </header>
<div class='container'>
<h2>Catálogo de productos</h2>
<div class="product-grid">
      <?php
      foreach($prendas as $prenda){
      echo "<div class='product'>";
      echo "<img src='app/src/img/products/". $prenda['Foto'] ."' alt='Producto 1'>";
      echo "<fieldset id='co'>";
      echo "<div class='product-name'>". $prenda['Modelo'] ."</div>";
      echo "<div class='product-price'>"."$". $prenda['Precio_venta'] ."</div>";
      echo "<button class='buy-now' onclick='editar(".$prenda['id_prenda'].")'>Comprar</button";
      echo "</fieldset>";
      echo " </div>";
      }
     ?>
</div>
</div>
<script>
  //creamos la funcion para llmar al formulario de editar un usuario
  function editar(idd){
    window.location.href = "http://localhost/pruebaplayeras/?C=VentasController&M=index&id="+idd
  }
</script>
</body>
</html>