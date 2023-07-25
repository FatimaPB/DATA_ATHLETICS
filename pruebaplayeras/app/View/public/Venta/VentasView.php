<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="app/view/venta.css">
</head>
<body>
    <div class="hero-section section flex">
        <!-- hero image  -->
        <div class="hero-image flex">
            <p><?php $datos['Foto']?></p>
            <img src='app/src/img/products/<?= $datos['Foto']?>' class="main-img" alt="">
        </div>
        <!-- hero content  -->
        <div class="hero-content flex">
            <p class="content-body">
                Modelo: <?= $datos['Modelo'] ?>
            </p>
            <p class="content-body">
                Genero: <?= $datos['Genero'] ?>
            </p>
            <p class="content-body">
                Precio: <?= $datos['Precio_venta'] ?>
            </p>
            <p class="content-body">
                Talla: <?= $datos['talla'] ?>
            </p>
            <p class="content-body">
                Corte: <?= $datos['Corte'] ?>
            </p>
            <p class="content-body">
                Color: <?= $datos['nomColor'] ?>
            </p>
            <p class="content-body">
                Material: <?= $datos['Material'] ?> <?= $datos['Porcentaje'] ?> %
            </p>
            <p class="content-body">
            </p>
            <button class="btn content-btn" onclick="venderv(<?= $datos['id_prenda'] ?>)">
                Comprar ahora
            </button>
        </div>
        
    </div>
    <script>
        function venderv(id){
        window.location.href ="http://localhost/pruebaplayeras/?C=VentasController&M=CFVender&id="+id
        }
    </script>
</body>
</html>