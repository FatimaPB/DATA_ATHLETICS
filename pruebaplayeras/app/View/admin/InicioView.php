<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/view/index.css">
</head>
<body>
    <!-- hero section  -->
    <div class="hero-section section flex">
        <!-- hero content  -->
        <div class="hero-content flex">
            <h1 class="content-header">
                Escaneando el estilo y la salud
            </h1>
            <p class="content-body">
            ¡El hogar de las playeras deportivas más modernas! Diseñadas con estilo y comodidad en mente,
            para que puedas lucir y sentirte en tu mejor forma mientras practicas deporte.
            </p>
        </div>
        <!-- hero image  -->
        <div class="hero-image flex">
            <img src="app/src/img/index/prendainicio.png" class="main-img" alt="">
            <img src="app/src/img/index/bg-2.svg" class="bg-img" alt="">
        </div>
    </div>
    <div id="vid">
        <video  width="890px" height="500px" controls>
            <source src="app/src/video/DataAt.mp4" type="video/mp4">
            Su navegador no soporta html5
        </video>
    </div>

    <!-- product section  -->
    <div class="product-section flex">
        <!-- card -1  -->
        <div class="card card-1 flex">
            <div class="card-img flex">
                <img src="app/src/img/index/prendacard.png" alt="">
            </div>
            <div class="card-body flex">
                <h1 class="product-name">
                    Lorem ipsum dolor sit amet.
                </h1>
                <button class="btn more-detail-btn">
                    More Details
                </button>
            </div>
        </div>

        <!-- card-2  -->
        <div class="card card-2 flex">
            <div class="card-img flex">
                <img src="app/src/img/index/prendacard.png" alt="">
            </div>
            <div class="card-body flex">
                <h1 class="product-name">
                    Lorem ipsum dolor sit amet.
                </h1>
                <button class="btn more-detail-btn">
                    More Details
                </button>
            </div>
        </div>
    </div>

    <!-- custom js file  -->
    <script src="app/vscode/index.js"></script>
</body>
</html>