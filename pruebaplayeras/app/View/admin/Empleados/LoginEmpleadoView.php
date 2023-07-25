<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="app/View/login.css">
    <link rel="stylesheet" 
    href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.9/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
        <div class="color"></div>
        <div class="color"></div>
        <div class="color"></div>
        <div class="box">
            <div class="square" style="--i:0;"></div>
            <div class="square" style="--i:1;"></div>
            <div class="square" style="--i:2;"></div>
            <div class="square" style="--i:3;"></div>
            <div class="square" style="--i:4;"></div>
            <div class="container">
                <div class="form">
                    <h2>Iniciar</h2>
                    <form action="http://localhost/pruebaplayeras/?C=EmpleadoController&M=Login" method="post">
                        <div class="inputBox">
                            <input type="text" name="user" id="user" placeholder="Usuario">
                        </div>
                        <div class="inputBox">
                            <input type="password" name="password" id="password" placeholder="contraseña">
                        </div>
                        <div class="inputBox">
                            <input type="submit" value="Iniciar">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
</body>
</html>