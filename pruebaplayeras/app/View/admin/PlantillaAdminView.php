<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA ATHLETICS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="app/View/main.css">
</head>
<body>

    <div class="wrapper">
        <header class="header-mobile">
            <h1 class="logo">DATA ATHLETICS</h1>
            <button class="open-menu" id="open-menu">
                <i class="bi bi-list"></i>
            </button>
        </header>
        <aside>
            <button class="close-menu" id="close-menu">
                <i class="bi bi-x"></i>
            </button>
            <header>
                <h1 class="logo">DATA ATHLETICS</h1>
            </header>
            <nav>
                <ul class="menu">
                    <li>
                        <button id="todos" class="boton-menu boton-categoria active"><i class="bi bi-hand-index-thumb-fill"></i><a href="http://localhost/php3b/?C=ProductsController&M=index">Inicio</a></button>
                    </li>
                    <li>
                        <button id="abrigos" class="boton-menu boton-categoria"><i class="bi bi-hand-index-thumb"></i><a href="http://localhost/php3b/?C=ProductsController&M=index">Productos</a></button>
                    </li>
                    <li>
                        <button id="camisetas" class="boton-menu boton-categoria"><i class="bi bi-hand-index-thumb"></i><a href="http://localhost/php3b/?C=UserController&M=index">Inicio de sesión</a></button>
                    </li>
                    <li>
                        <button id="pantalones" class="boton-menu boton-categoria"><i class="bi bi-hand-index-thumb"></i><a href="http://localhost/php3b/?C=ProductsController&M=index">Carrito</a></button>
                    </li>
                    <li>
                        <button id="pantalones" class="boton-menu boton-categoria"><i class="bi bi-hand-index-thumb"></i><a href="http://localhost/php3b/?C=ProductsController&M=index">Acerca de</a></button>
                    </li>
                    <li>
                        <a class="boton-menu boton-carrito" href="./carrito.html">
                           Cerrar Sesion
                        </a>
                    </li>
                </ul>
            </nav>
            <footer>
                <p class="texto-footer">© 2023 DATA ATHLETICS COMPANY</p>
                <p class="texto-footer">Todos los derechos reservados</p>
            </footer>
        </aside>
        <main>
            
            
                <section class="content">
                    <!--en esta parte es lo que va a cambiar de nuestra plantilla -->
                    <?php include_once($vista) ?>
                </section>
            
        </main>
    </div>
    
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="app/vscode/main.js"></script>
    <script src="./js/menu.js"></script>
</body>
</html>